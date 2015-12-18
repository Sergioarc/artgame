$(function(){
    $('#btn-add-model').click(function(){
        var $modal = $('#modal-model-form')
        $('#model-sku-static').text('').hide();
        $('#model-name').val('');
        $('#model-sku').val('').show();
        $modal.find('form').get(0).setAttribute('action', laroute.route('admin.models.store'));
        $modal.find('input[name=_method]').val('POST');
        $modal.modal('show');

    });

    $('.btn-edit-model').click(function(){
        var $modal = $('#modal-model-form')
        $('#model-name').val($(this).parents('.panel-title').find('.span-model-name').text().trim());
        $('#model-sku-static').text($(this).attr('data-model-sku')).show();
        $('#model-sku').hide();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.models.update', {
                models : $(this).attr('data-model-id')
            })
        );
        $modal.find('input[name=_method]').val('PUT');
        $modal.modal('show');
    });

    $('#btn-model-form-submit').click(function(){
        $('#model-form').submit();
    });


    $('.btn-delete-model').click(function(){
        var $modal = $('#modal-model-destroy-form');
        $modal.find('.span-model-name').text($(this).parents('.panel-title').find('.span-model-name').text().trim());
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.models.destroy', {
                models : $(this).attr('data-model-id'),
            })
        );
        $modal.modal('show');
    });

    $('#btn-model-destroy-form-submit').click(function(){
        $('#model-destroy-form').submit();
    });



    $('.item-add-modelItem').click(function(){
        var $modal = $('#modal-item-form')
        $('#item-sku-static').text('').hide();
        $('#item-name').val('');
        $('#item-sku').val('').show();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.models.items.store', {
                models : $(this).attr('data-model-id')
            })
        );
        $modal.find('input[name=_method]').val('POST');
        $modal.modal('show');
    });

    $('.btn-edit-modelItem').click(function(evt){
        evt.preventDefault();
        var $modal = $('#modal-modelItem-form')
        $('#modelItem-name').val($(this).parents('.list-group-item').find('.span-modelItem-name').text().trim());
        $('#modelItem-sku-static').text($(this).attr('data-modelItem-sku')).show();
        $('#modelItem-sku').hide();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.models.modelItems.update', {
                models : $(this).attr('data-model-id'),
                modelItems : $(this).attr('data-modelItem-id')
            })
        );
        $modal.find('input[name=_method]').val('PUT');
        $modal.modal('show');
    });

    $('#btn-modelItem-form-submit').click(function(){
        $('#modelItem-form').submit();
    });

    $('.btn-delete-modelItem').click(function(evt){
        evt.preventDefault();
        var $modal = $('#modal-modelItem-destroy-form');
        $modal.find('.span-modelItem-name').text($(this).parents('.list-group-item').find('.span-modelItem-name').text().trim());
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.models.modelItems.destroy', {
                models : $(this).attr('data-model-id'),
                modelItems : $(this).attr('data-modelItem-id')
            })
        );
        $modal.modal('show');
    });

    $('#btn-modelItem-destroy-form-submit').click(function(){
        $('#modelItem-destroy-form').submit();
    });

    
});