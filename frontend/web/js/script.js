$(document).ready(function() {
    $('#datatable').DataTable();
} );
$(document).on('click','a.details',function(e){
    e.preventDefault();
    $('#Modal').modal('show')
        .find('.modal-body')
        .load($(this).attr('href'));

    $('#Modal').on('hidden.bs.modal', function() {
        $(this).removeData();
    });
});
(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=420100561467434&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
