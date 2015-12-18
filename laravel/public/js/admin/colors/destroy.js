$(function() {
    $('.btn-delete-color').click(function() {
        var $modal = $('#modal-color-destroy-form');
        $modal.find('.span-color-name').text($(this).parents('td').find('.span-color-name').text().trim());
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.subcollections.models.items.colors.destroy', {
                collections: $(this).attr('data-collection-id'),
                subcollections: $(this).attr('data-subcollection-id'),
                models: $(this).attr('data-model-id'),
                items: $(this).attr('data-item-id'),
                colors : $(this).attr('data-color-id')
            })
        );
        $modal.modal('show');
    });

    $('#btn-color-destroy-form-submit').click(function(){
        $('#modal-color-destroy-form form').submit();
    });
});