
$(function(){
    var last_select_change = undefined;
    var stock_table = undefined;
    $('.btn-add-to-cart').click(function(){
        $.get(laroute.route('api.model_items_by_set', {
            sets : $(this).attr('data-set-id')
        }), function(items){
            
            
            $('#model-items-container').empty();
            var confirm_div = $('#confirm-template').children().clone();
            
            var confirm_table = confirm_div.find('table');
            var stock_table = {};
            
            var selectChange = function(event) {
                var now = new Date().getTime();
                if(now - last_select_change < 400) {
                    return;
                }else {
                    last_select_change = now;
                }
                var container = $(this).parents('.owl-item'); 
                var color = container.find('select.product-colors').val();
                var size = container.find('select.product-sizes').val();

                var item = items[container.index()];
                var stock = stock_table[item.id];
                console.log(stock);
                stock = stock.stock_by_color;
                stock = stock[color][size];
                console.log(stock);
            };
            for(var i=0; i<items.length; i++){

                var item = items[i];
                var clone = $('#template').children().clone();
                clone.find('.product-name').text(item.name);
                clone.find('.product-description').text(item.description);
                clone.find('.btn-cart-continue').attr('data-item-id', item.id);
                var sizesSelect = clone.find('select.product-sizes');
                var colorsSelect = clone.find('select.product-colors');
                sizesSelect.empty();
                colorsSelect.empty();

                var confirm_tr = $('<tr>', { 'data-item-id' : item.id});
                confirm_tr.append($('<td>').text(item.name));

                stock_table[item.id] = {
                    'item' : item,
                    'stock_by_color' : {},
                    'stock_by_size' : {}
                };

                
                for(var j=0; j < item.stock.length; j++) {
                    var stock = item.stock[j];
                    var l = stock_table[item.id].stock_by_size[stock.size_id];
                    if(l == undefined) {
                        stock_table[item.id].stock_by_size[stock.size_id] = {};
                    } 

                    stock_table[item.id].stock_by_size[stock.size_id][stock.color_id] = stock.stock;

                    var l = stock_table[item.id].stock_by_color[stock.color_id];
                    if(l == undefined) {
                        stock_table[item.id].stock_by_color[stock.color_id] = {};
                    } 

                    stock_table[item.id].stock_by_color[stock.color_id][stock.size_id] = stock.stock;
                }

                var stock_by_size = stock_table[item.id].stock_by_size;
                var stock_by_color = stock_table[item.id].stock_by_color;

                if(Object.size(stock_by_size) + Object.size(stock_by_color)) {
                    clone.find('.form-horizontal').show();
                    clone.find('.not-available').hide();

                    confirm_tr.append(
                        $('<td>').attr('data-color', 'NaN').text('No seleccionado')
                    ).append(
                        $('<td>').attr('data-size', 'NaN').text('No seleccionada')
                    ).append(
                        $('<td>').attr('data-quantity', 'NaN').text('0')
                    ).append(
                        $('<td>').attr('data-unit-price', 'NaN').text('$ 0.00')
                    ).append(
                        $('<td>').attr('data-price', 'NaN').text('$ 0.00')
                    );

                    var edit_td = $('<td>');
                    var edit_btn = $('<button>', {class : 'btn btn-xs btn-default btn-cart-edit', 'data-item-idx' : i}).append(
                        $('<span>', {class : 'fa fa-fw fa-pencil'})
                    );
                    edit_btn.click(function() {
                        var owl = $('#model-items-container').data('owlCarousel');
                        
                        owl.goTo($(this).attr('data-item-idx'));
                        
                    });
                    edit_td.append(edit_btn);
                    confirm_tr.append(edit_td);
                    for(var j=0; j < item.sizes.length; j++) {
                        var size = item.sizes[j];
                        if(Object.size(stock_by_size[size.id]) > 0) {
                            sizesSelect.append($('<option>', {value : size.id}).text(size.name));
                        }
                    }

                    for(var j=0; j < item.colors.length; j++) {
                        var color = item.colors[j];
                        if(Object.size(stock_by_color[color.id]) > 0) {
                            colorsSelect.append($('<option>', {value : color.id}).text(color.name));
                        }
                    }

                    colorsSelect.change(selectChange);
                    sizesSelect.change(selectChange);
                    colorsSelect.change(function(event) {
                        var value = $(this).val();
                        var container = $(this).parents('.owl-item'); 
                        var idx = container.index();
                        var item = items[idx];
                        var color_array = $.grep(items[idx].colors, function(color){
                            return color.id == value;
                        });
                        if(color_array.length > 0) {
                            var color = color_array[0];
                            var photo = color.photo;
                        }

                        var img = container.find('.product-img');
                        
                        

                        if(photo) {
                            img.attr('src', photo.medium_url);
                        } else {
                            img.attr('data-src', 'holder.js/200x350?theme=noir&text=' + $(this).find('option:selected').text());
                            img = img.get(0);
                            Holder.run({
                                images : img
                            });
                        }
                        
                    });

                    

                    colorsSelect.change(selectChange);
                } else {

                    confirm_tr.append(
                        $('<td>', {colspan : '6', 'class' : 'text-center'}).text('AGOTADO')
                    );
                    clone.find('.form-horizontal').hide();
                    clone.find('.not-available').show();
                }
                

                $('#model-items-container').append(clone);
                confirm_table.append(confirm_tr);
                
            }

            $('#model-items-container').append(confirm_div);
            $('#modal-add-to-cart').modal('show');

            var owl = $('#model-items-container').data('owlCarousel');
            if(owl) {
                owl.destroy();
            }
            $("#model-items-container").owlCarousel({
                singleItem : true,
                navigation : false,
                pagination : false,
                mouseDrag  : false,
                touchDrag  : false,
            });

            $('#model-items-container select.product-colors').change();
        });
    });

    $(document).on('click', '.btn-cart-quantity-plus', function (event) {
        var opposite = $(this).parents('.form-group').find('.btn-cart-quantity-minus');
        var input = $(this).parents('.form-group').find('input');
        var current_val = input.val();
        current_val = parseInt(current_val);
        if(isNaN(current_val)){
            input.val(1);
            $(this).prop('disabled', false);
            opposite.prop('disabled', false);
            return;
        }
        current_val++;
        var max = parseInt(input.attr('max'));
        if(!isNaN(max) && current_val == max){
            $(this).prop('disabled', true);
        }
        opposite.prop('disabled', false);
        input.val(current_val);
    });

    $(document).on('click', '.btn-cart-quantity-minus', function (event) {
        var opposite = $(this).parents('.form-group').find('.btn-cart-quantity-plus');
        var input = $(this).parents('.form-group').find('input');
        var current_val = input.val();
        current_val = parseInt(current_val);
        if(isNaN(current_val)){
            input.val(1);
            $(this).prop('disabled', false);
            opposite.prop('disabled', false);
            return;
        }
        current_val--;
        var min = 0;
        if(!isNaN(min) && current_val == min){
            $(this).prop('disabled', true);
        }
        opposite.prop('disabled', false);
        input.val(current_val);     
    });

    $(document).on('click', '.btn-cart-continue', function(event) {
        var tr = $('#model-items-container .table tr[data-item-id=' 
            + $(this).attr('data-item-id') + ']');
        var edit_btn =  tr.find('.btn-cart-edit');

        var is_editing = edit_btn.prop('data-cart-added');
        var owl = $('#model-items-container').data('owlCarousel');
        
        if($(this).parents('.not-available').length == 0) {
            edit_btn.prop('data-cart-added', true);
            var form = $(this).parents('.item-form');
            var color = form.find('select[name=color]');
            var color_val = color.val();
            var color_text = color.find('option:selected').text();
            var size = form.find('select[name=size]');
            var size_val = size.val();
            var size_text = size.find('option:selected').text();
            tr.find('[data-color]').text(color_text).attr('data-color-id', color_val);
            tr.find('[data-size]').text(size_text).attr('data-size-id', size_val);

            var quantity = form.find('input[name=quantity]');
            tr.find('[data-quantity]').text(quantity.val()).attr('data-quantity', quantity.val());
        }
        if(owl) {
            if(is_editing) {
                owl.goTo(owl.maximumItem);
            }else{
                owl.next();    
            }
            
        }
    });

    $(document).on('click', '.btn-confirm', function(event) { 
        var trs = $('#model-items-container .table tbody tr[data-item-id]');

        var postData = {
            items : [],
            colors : [],
            sizes : [],
            quantities : [],
        };

        trs.each(function() {
            console.log($(this).find('[data-quantity]').attr('data-quantity'));
            var quantity = parseInt($(this).find('[data-quantity]').attr('data-quantity'));
            if(!isNaN(quantity)) {
                var item_id = $(this).attr('data-item-id');
                var color_id = $(this).find('[data-color-id]').attr('data-color-id');
                var size_id = $(this).find('[data-size-id]').attr('data-size-id');
                postData.items.push(item_id);
                postData.colors.push(color_id);
                postData.sizes.push(size_id);
                postData.quantities.push(quantity);
            }
        });

        var form = $('<form>', {
            method : 'POST'
        });

        form.get(0).setAttribute('action', laroute.action('CheckoutController@postAddToCart'));

        form.append($('<input>', {name : '_token'}).val($('meta[name="csrf-token"]').attr('content')));
        var total = 0;
        for(var i = 0; i < postData.items.length; i++) {
            var item_id = postData.items[i];
            var color_id = postData.colors[i];
            var size_id = postData.sizes[i];
            var quantity = postData.quantities[i];
            total += quantity;
            form.append($('<input>', {name : 'items[]'}).val(item_id));
            form.append($('<input>', {name : 'colors[]'}).val(color_id));
            form.append($('<input>', {name : 'sizes[]'}).val(size_id));
            form.append($('<input>', {name : 'quantities[]'}).val(quantity));
        }
        if(total == 0) {
            alert('Tu pedido no tiene ningún artículo');
        } else {
            form.submit();    
        }
        

    });
});