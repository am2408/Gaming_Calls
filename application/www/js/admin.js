'use strict';

$('.userRole').on('change', function(){
  let id = $(this).data('id');
  console.log(id);
  let value = $(this).val();
  console.log(value);

  let role = {
    'id' : id,
    'valeur' : value
  };
  console.log(role);
  $.post(
    getRequestUrl() + '/users/admin/role',
    role,
    function (response) {
      console.log(response);
    }
  )
});
