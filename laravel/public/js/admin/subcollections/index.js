$(function(){
  $('#btn-add-subcollection').click(function(){
    var $modal = $('#modal-subcollection-form')
    $('#subcollection-sku-static').text('').hide();
    $('#subcollection-name').val('');
    $('#subcollection-sku').val('').show();
    $modal.find('form').get(0).setAttribute('action', laroute.route('admin.subcollections.store'));
    $modal.find('input[name=_method]').val('POST');
    $modal.modal('show');
  });

  $('.btn-edit-subcollection').click(function(){
    var $modal = $('#modal-subcollection-form')
    $('#subcollection-name').val($(this).parents('.panel-title').find('.span-subcollection-name').text().trim());
    $('#subcollection-sku-static').text($(this).attr('data-subcollection-sku')).show();
    $('#subcollection-sku').hide();
    $modal.find('form').get(0).setAttribute(
      'action',
      laroute.route('admin.subcollections.update', {
        subcollections : $(this).attr('data-subcollection-id')
      })
    );
    $modal.find('input[name=_method]').val('PUT');
    $modal.modal('show');
  });

  $('#btn-subcollection-form-submit').click(function(){
    $('#subcollection-form').submit();
  });
});