$(function() {
    $('.btn-add-color').click(function(){

        $modal = $('#create-colors');
        $modal.find('form').get(0).reset();
        $('#color-sku-static').text('').hide();
        $('#color-sku').show();
        
        $('#img-photo-selected').hide();
        $('#img-no-photo-selected').show();
        $modal.find('input[name=_method]').val('POST');
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route(
                'admin.collections.subcollections.models.items.colors.store',
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

    $('.btn-edit-color').click(function(event) {
        $modal = $('#create-colors');
        $modal.find('form').get(0).reset();

        $modal.find('#color-name').val($(this).parents('td').find('.span-color-name').text().trim());
        $modal.find('#color-sku').val($(this).attr('data-color-sku'));
        $('#color-sku-static').text($(this).attr('data-color-sku')).show();
        $('#color-sku').hide();
        
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route(
                'admin.collections.subcollections.models.items.colors.update',
                {
                    collections: $(this).attr('data-collection-id'),
                    subcollections: $(this).attr('data-subcollection-id'),
                    models: $(this).attr('data-model-id'),
                    items: $(this).attr('data-item-id'),
                    colors : $(this).attr('data-color-id')
                }
            )
        );
        $modal.find('input[name=_method]').val('PUT');
        var img_src = $(this).attr('data-photo-src');
        
        if(img_src) {
            $('#img-photo-selected').show().attr('src', img_src);
            $('#img-no-photo-selected').hide();
        }else {
            $('#img-photo-selected').hide();
            $('#img-no-photo-selected').show();
        }
        $('#create-colors').modal('show');
    });

    $('#btn-add-file').click(function(event) {
        $('#input-photo').click();
    });

    $('#input-photo').change(function(event) {
        var file = this.files[0];
        var img = $('#img-photo-selected');
        var reader = new FileReader();
        reader.onloadend = function() {
             img.attr('src', reader.result);
             $('#img-no-photo-selected').hide('400');
             img.fadeIn(400);
        }
        reader.readAsDataURL(file);
        
    });
    $('#color-save').click(function()
    {
        $('#form-color').submit();

    });
});