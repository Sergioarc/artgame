(function($){

  $.widget('noir.hasManyForm', {
    options : {
      defaultForm : undefined,
      addButton : '.add-button',
      dismissButton : '.btn-remove',
      container : '.form-group',
      minLengthToShow : 1,
      names : {},
      defaults: {}
    },

    _create : function(){
      if(!this.options.defaultForm) throw 'Default form required';

      var mainContainer = this.element;
      mainContainer.hide();

      var settings = this.options;
      var object = this;
      $(this.options.addButton).on('click', function(){
        object.appendItem();
      });

      $(this.element).on('click', this.options.dismissButton, function(){
        console.log(mainContainer.find(settings.container + ':not(' + settings.defaultForm + ')'));
        $(this).parents(settings.container).hide(500, function(){
          if($(this).attr('id') == undefined)
            $(this).remove();
          if(mainContainer.find(settings.container + ':not(' + settings.defaultForm + ')').length < settings.minLengthToShow)
            mainContainer.hide(1000);

          });
        });
    },

    appendItem : function(object){
      // console.log('appending item to ', this);
      var mainContainer = this.element;
      var showMainContainer = false;
      if(!mainContainer.is(':visible')){
        showMainContainer = true;
        animateLength = 0;
      }else{
        animateLength = 300;
      }
      var subform = $(this.options.defaultForm).clone().removeAttr('id');
      $.each(this.options.names, function(key, value){
        subform.find(key).attr('name', value);
      });
      mainContainer.append(subform);
      if(showMainContainer){
        subform.show();
        mainContainer.show(600);
      }else{
        subform.show(animateLength);
      }
      if(object){
        $.each(this.options.names, function(key, value){
          var input = subform.find(key)
          input.val(object[value]);
          if(object.key == value){
            var parent = input.parent();
            parent.append($('<p>').text(input.val()).addClass('form-control-static'));
            input.attr('type', 'hidden');
          }
        });
      }
    }
  });

}(jQuery));
