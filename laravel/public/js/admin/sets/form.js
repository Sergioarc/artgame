$(function(){
    $('#btn-add-file').click(function(){
        var input = $('<input>', {type : 'file', class : 'hide', accept : 'image/*', 'name' : 'photos[]'});
        input.change(function(e) {
                    
            var file = this.files[0];
            
            var col = $('<div>', {class : 'col-sm-4 col-xs-6'});
            var a = $('<a>', {class : 'thumbnail'});
            var removeBtn = $('<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            var img = $('<img>', {class : 'img-responsive'});
            var reader = new FileReader();
            reader.onloadend = function() {
                 img.attr('src', reader.result);
            }
            reader.readAsDataURL(file);
            a.append(removeBtn);
            a.append(img);
            col.append(a);
            $("#btn-add-file-container").before(col);
        
            $('#files-group').append(input);

            removeBtn.click(function(){
                input.remove();
                col.hide('400', function() {
                    col.remove();
                });
            });
            
        });
        input.click();

    });
});