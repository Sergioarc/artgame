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
    $('#modal-stock-create form').submit(function(e){
        var color_id = parseInt($('#color').val());
        var size_id = parseInt($('#size').val());
        if(isNaN(color_id)){
            $('#color').attr('name', '');
        }
        if(isNaN(size_id)){
            $('#size').attr('name', '');
        }
        
    });

    $('button[data-target-sku]').click(function(){
        $('#modal-stock-create').modal('show');
        $('#add-stock-form #sku').val($(this).attr('data-target-sku'));
        $('#no-sku-fieldset').hide();
    });

    $('#modal-stock-create').on('shown.bs.modal', function(){
        getOptionsAndPopulate(laroute.route('admin.api.collections'), 'select#collection');
        if($(this).find('#sku').val()){
            $('#no-sku-fieldset').hide();
        }else{
            $('#no-sku-fieldset').show(200);
        }
    });

    $('#modal-stock-create').on('hidden.bs.modal', function(){
        $(this).find('input.form-control').val(undefined);
    });

    $('select#collection').on('change', function(){
        $(this).find('option[value="NULL"]').remove();
        getOptionsAndPopulate(laroute.route('admin.api.subcollections', {collections : $(this).val()}), 'select#subcollection');
    });

    $('select#subcollection').on('change', function(){
        $(this).find('option[value="NULL"]').remove();
        getOptionsAndPopulate(laroute.route('admin.api.models', {subcollections : $(this).val()}), 'select#model');
    });

    $('select#model').on('change', function(){
        $(this).find('option[value="NULL"]').remove();
        getOptionsAndPopulate(laroute.route('admin.api.model_items', {models : $(this).val()}), 'select#model_item');
    });

    $('select#model_item').on('change', function(){
        $(this).find('option[value="NULL"]').remove();
        getOptionsAndPopulate(laroute.route('admin.api.colors', {items : $(this).val()}), 'select#color', 'Sin especificar');
        getOptionsAndPopulate(laroute.route('admin.api.sizes', {items : $(this).val()}), 'select#size', 'Sin especificar');
    });
});
