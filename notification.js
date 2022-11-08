$(document).ready(function(){

// updating the view with notifications using ajax
function load_unseen_notification(view = '') {
 $.ajax({
  url:"../update_chat.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success: function(data) {
   console.log(data);
   $('.msg_list').html(data.notification);
   if(data.unseen_notification > 0)
   {
    //$('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();

// submit form and get new records
$('#msgForm').on('submit', function(event){
 event.preventDefault();
 var form_data = $(this).serialize();
  $.ajax({
   url:"chat.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    //$('#msgForm')[0].reset();
    load_unseen_notification();
   }
  });
});

// load new notifications
// $(document).on('click', '.dropdown-toggle', function(){
//  $('.count').html('');
//  load_unseen_notification('yes');
// });
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});