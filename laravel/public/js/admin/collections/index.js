$(function(){
    $('#btn-add-collection').click(function(){
        var $modal = $('#modal-collection-form')
        $('#collection-sku-static').text('').hide();
        $('#collection-name').val('');
        $('#collection-sku').val('').show();
        $modal.find('form').get(0).setAttribute('action', laroute.route('admin.collections.store'));
        $modal.find('input[name=_method]').val('POST');
        $modal.modal('show');
    });

    $('.btn-edit-collection').click(function(){
        var $modal = $('#modal-collection-form')
        $('#collection-name').val($(this).parents('.panel-title').find('.span-collection-name').text().trim());
        $('#collection-sku-static').text($(this).attr('data-collection-sku')).show();
        $('#collection-sku').hide();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.update', {
                collections : $(this).attr('data-collection-id')
            })
        );
        $modal.find('input[name=_method]').val('PUT');
        $modal.modal('show');
    });

    $('#btn-collection-form-submit').click(function(){
        $('#collection-form').submit();
    });


    $('.btn-delete-collection').click(function(){
        var $modal = $('#modal-collection-destroy-form');
        $modal.find('.span-collection-name').text($(this).parents('.panel-title').find('.span-collection-name').text().trim());
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.destroy', {
                collections : $(this).attr('data-collection-id'),
            })
        );
        $modal.modal('show');
    });

    $('#btn-collection-destroy-form-submit').click(function(){
        $('#collection-destroy-form').submit();
    });



    $('.item-add-subcollection').click(function(){
        var $modal = $('#modal-subcollection-form')
        $('#subcollection-sku-static').text('').hide();
        $('#subcollection-name').val('');
        $('#subcollection-sku').val('').show();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.subcollections.store', {
                collections : $(this).attr('data-collection-id')
            })
        );
        $modal.find('input[name=_method]').val('POST');
        $modal.modal('show');
    });

    $('.btn-edit-subcollection').click(function(evt){
        evt.preventDefault();
        var $modal = $('#modal-subcollection-form')
        $('#subcollection-name').val($(this).parents('.list-group-item').find('.span-subcollection-name').text().trim());
        $('#subcollection-sku-static').text($(this).attr('data-subcollection-sku')).show();
        $('#subcollection-sku').hide();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.subcollections.update', {
                collections : $(this).attr('data-collection-id'),
                subcollections : $(this).attr('data-subcollection-id')
            })
        );
        $modal.find('input[name=_method]').val('PUT');
        $modal.modal('show');
    });

    $('#btn-subcollection-form-submit').click(function(){
        $('#subcollection-form').submit();
    });

    $('.btn-delete-subcollection').click(function(evt){
        evt.preventDefault();
        var $modal = $('#modal-subcollection-destroy-form');
        $modal.find('.span-subcollection-name').text($(this).parents('.list-group-item').find('.span-subcollection-name').text().trim());
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.subcollections.destroy', {
                collections : $(this).attr('data-collection-id'),
                subcollections : $(this).attr('data-subcollection-id')
            })
        );
        $modal.modal('show');
    });

    $('#btn-subcollection-destroy-form-submit').click(function(){
        $('#subcollection-destroy-form').submit();
    });

    
});