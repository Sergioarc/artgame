function nullOption(defaultValue){
    return $('<option>').attr({value: 'NULL'}).html(defaultValue ? defaultValue : 'Seleccione');
}

function newOption(value, content){
    return $('<option>').attr({value: value}).html(content);
}

function disableNextSelects(selector){
    var selectors = $('.select-dependant');
    var idx = selectors.index($(selector));
    if(idx >= 0){
        for(var i= idx+1; i<selectors.length; i++){

            var s = selectors.eq(i);
            s.empty();
            s.append(nullOption());
            s.prop('disabled', true);
        }
    }
}

function populateSelect(selector, content, defaultValue){
    var jqueryItem = $(selector);
    jqueryItem.empty();
    jqueryItem.append(nullOption(defaultValue));
    for(var i=0; i< content.length; i++){
        var item = content[i];
        jqueryItem.append(newOption(item.id, item.name));
    }
    jqueryItem.prop('disabled', false);
    disableNextSelects(selector);
}

function getOptionsAndPopulate(url, selector, defaultValue){
    $.get(url, function(data){
        populateSelect(selector, data, defaultValue);
    });
}

$(function(){
    
    var collection_id = $('input[name=collection]').val();
    var subcollection_id = $('input[name=subcollection]').val();
    
    $('#modal-add-item').on('shown.bs.modal', function(){
        getOptionsAndPopulate(laroute.route('admin.api.models', {
            subcollections : subcollection_id
        }), 'select#model');
        $('#modal-add-item').find('.btn-submit').prop('disabled', true);
    });

    $('#modal-add-item .btn-submit').click(function(){
        var container = $('#btn-add-item-container');
        var col = $('<div>', {class : 'col-sm-4 col-xs-6 set-item-container'});
        var a = $('<div>', {class : 'thumbnail'});
        var removeBtn = $('<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
        var p = $('<p>').text($('select#model_item').text());
        var input = $('<input>', { type : 'hidden', 'name' : 'model_items[]'}).val($('select#model_item').val());
        col.append(removeBtn);
        col.append(a);
        col.append(input);
        a.append(p);
        removeBtn.click(function(event) {
            col.hide('400', function() {
                col.remove();
            });
        });
        $('#modal-add-item').modal('hide');
        $('#btn-add-item-container').before(col);
    });

    $('select#model').on('change', function(){
        $(this).find('option[value="NULL"]').remove();
        getOptionsAndPopulate(laroute.route('admin.api.model_items', {models : $(this).val()}), 'select#model_item');
    });

    $('select#model_item').on('change', function(){
        $(this).find('option[value="NULL"]').remove();
        $('#modal-add-item').find('.btn-submit').prop('disabled', false);
    });
});
