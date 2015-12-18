$(function(){
    $('#btn-add-model').click(function(){
        var $modal = $('#modal-model-form')
        $('#model-sku-static').text('').hide();
        $('#model-name').val('');
        $('#model-sku').val('').show();
        $('#btn-model-show').hide();
        $modal.find('form').get(0).setAttribute(
                'action',
                laroute.route('admin.collections.subcollections.models.store', {
                        collections : $(this).attr('data-collection-id'),
                        subcollections : $(this).attr('data-subcollection-id'),
                })
        );
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
            laroute.route('admin.collections.subcollections.models.update', {
                collections : $(this).attr('data-collection-id'),
                subcollections : $(this).attr('data-subcollection-id'),
                models : $(this).attr('data-model-id')
            })
        );
        $modal.find('input[name=_method]').val('PUT');
        $('#btn-model-show').attr(
            'href',
            laroute.route(
                'admin.collections.subcollections.models.show', {
                    collections : $(this).attr('data-collection-id'),
                    subcollections : $(this).attr('data-subcollection-id'),
                    models : $(this).attr('data-model-id')
                }
            )
        ).show();
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
            laroute.route('admin.collections.subcollections.models.destroy', {
                collections : $(this).attr('data-collection-id'),
                subcollections : $(this).attr('data-subcollection-id'),
                models : $(this).attr('data-model-id'),
            })
        );
        $modal.modal('show');
    });

    $('#btn-model-destroy-form-submit').click(function(){
        $('#model-destroy-form').submit();
    });



    $('.item-add-item').click(function(){
        var $modal = $('#modal-item-form')
        $('#item-sku-static').text('').hide();
        $('#item-name').val('');
        $('#item-sku').val('').show();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.subcollections.models.items.store', {
                collections : $(this).attr('data-collection-id'),
                subcollections : $(this).attr('data-subcollection-id'),
                models : $(this).attr('data-model-id'),
            })
        );
        $modal.find('input[name=_method]').val('POST');
        $modal.modal('show');
    });

    $('.btn-edit-item').click(function(){
        var $modal = $('#modal-item-form');
        $('#item-name').val($(this).parents('.list-group-item').find('.span-item-name').text().trim());
        $('#item-sku-static').text($(this).attr('data-item-sku')).show();
        $('#item-sku').hide();
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.subcollections.models.items.update', {
                collections : $(this).attr('data-collection-id'),
                subcollections : $(this).attr('data-subcollection-id'),
                models : $(this).attr('data-model-id'),
                items : $(this).attr('data-item-id'),
            })
        );
        $modal.find('input[name=_method]').val('PUT');
        $modal.attr('data-item-id', $(this).attr('data-item-id'));
        $modal.modal('show');

        $modal.on('shown.bs.modal', function(){
            $(this).unbind('shown.bs.modal');
            $.get(laroute.route('admin.api.model_item_options', {
                items : $(this).attr('data-item-id')
            }) , function(response){
                if(response.status == 200){
                    var item = response.item;
                    console.log(item);
                    $.each(item.colors, function(){
                        $('#colors').hasManyForm('appendItem', {
                            'color_names[]' : this.name,
                            'color_skus[]' : this.sku,
                            'key' : 'color_skus[]',
                        });
                    });

                    $.each(item.sizes, function(){
                        $('#sizes').hasManyForm('appendItem', {
                            'size_names[]' : this.name,
                            'size_skus[]' : this.sku,
                            'key' : 'size_skus[]',
                        });
                    });
                }else {

                }
            });
        });
    });

    $('#btn-item-form-submit').click(function(){
        $('#item-form').submit();
    });

    $('.btn-delete-item').click(function(){
        var $modal = $('#modal-item-destroy-form');
        $modal.find('.span-item-name').text($(this).parents('.list-group-item').find('.span-item-name').text().trim());
        $modal.find('form').get(0).setAttribute(
            'action',
            laroute.route('admin.collections.subcollections.models.items.destroy', {
                collections : $(this).attr('data-collection-id'),
                subcollections : $(this).attr('data-subcollection-id'),
                models : $(this).attr('data-model-id'),
                items : $(this).attr('data-item-id'),
            })
        );
        $modal.modal('show');
    });

    $('#btn-item-destroy-form-submit').click(function(){
        $('#item-destroy-form').submit();
    });


    $('#colors').hasManyForm({
        defaultForm : '#color-form-cloneable',
        names : {
            'input[type="text"]:last' : 'color_names[]',
            'input[type="number"]:first' : 'color_skus[]',
        },
        addButton : '#add-color-btn',
        dismissButton : '.btn-item-remove',
    });

    $('#sizes').hasManyForm({
        defaultForm : '#size-form-cloneable',
        names : {
            'input[type="text"]:last' : 'size_names[]',
            'input[type="number"]:first' : 'size_skus[]',
        },
        addButton : '#add-size-btn',
        dismissButton : '.btn-item-remove',
    });

    $('#modal-item-form').on('hidden.bs.modal', function(){
        $('#colors .form-group .btn-item-remove').click();
        $('#sizes .form-group .btn-item-remove').click();
    });
    
});