$(function() {

    $('.btn-add-size').click(function(event) {
        $modal = $('#modal-size-form');
        $modal.find('form').get(0).reset();
        $('#size-sku-static').text('').hide();
        $('#size-sku').val('').show();
        
        $modal.find('input[name=_method]').val('POST');
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route(
                'admin.collections.subcollections.models.items.sizes.store',
                {
                    collections: $(this).attr('data-collection-id'),
                    subcollections: $(this).attr('data-subcollection-id'),
                    models: $(this).attr('data-model-id'),
                    items: $(this).attr('data-item-id'),
                }
            )
        );
        $modal.modal('show');
    });

    $('.btn-edit-size').click(function(event) {
        var $modal = $('#modal-size-form')
        $('#size-name').val($(this).parents('td').find('.span-size-name').text().trim());
        $('#size-sku-static').text($(this).attr('data-size-sku')).show();
        $('#size-sku').hide();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route(
                'admin.collections.subcollections.models.items.sizes.update',
                {
                    collections: $(this).attr('data-collection-id'),
                    subcollections: $(this).attr('data-subcollection-id'),
                    models: $(this).attr('data-model-id'),
                    items: $(this).attr('data-item-id'),
                    sizes : $(this).attr('data-size-id')
                }
            )
        );
        $modal.find('input[name=_method]').val('PUT');
        $modal.modal('show');
    });

    $('#btn-size-form-submit').click(function(event) {
        $('#size-form').submit();
    });
});