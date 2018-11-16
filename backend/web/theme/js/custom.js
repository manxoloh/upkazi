function printDiv(divName) {
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;
}
$("#main").click(function() {
	$("#mini-fab").toggleClass('hidden');
});

$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function() {
	$('#datatables').DataTable({
		"pagingType" : "full_numbers",
		"lengthMenu" : [ [ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ] ],
		responsive : true,
		language : {
			search : "_INPUT_",
			searchPlaceholder : "Search records",
		}

	});
});
$(document).ready(function() {
	$('#statement').DataTable({
		"pagingType" : "full_numbers",
		"lengthMenu" : [ [ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ] ],
		responsive : true,
		language : {
			search : "_INPUT_",
			searchPlaceholder : "Search records",
		}

	});
});
$(document).ready(function() {
	$('#payment').DataTable({
		"pagingType" : "full_numbers",
		"lengthMenu" : [ [ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ] ],
		responsive : true,
		language : {
			search : "_INPUT_",
			searchPlaceholder : "Search records",
		}

	});
});
yii.confirm = function(message, okCallback, cancelCallback) {
	swal({
		title : message,
		type : 'warning',
		showCancelButton : true,
		closeOnConfirm : true,
		allowOutsideClick : false,
	}, okCallback);
};
$(document).on('click', 'a.popup', function(e) {
	e.preventDefault();
	$('#Modal').modal('show').find('.modal-body').load($(this).attr('href'));

	$('#Modal').on('hidden.bs.modal', function() {
		$(this).removeData();
	});
});
$('#PostalCode').change(function() {
	var postalCode = $(this).val();
	$.get('index.php?r=settings/users/postal-codes', {
		postalCode : postalCode
	}, function(data) {
		var data = $.parseJSON(data);
		$('#addresses-city').attr('value', data.town);
	})
});
$(function() {
	$(".datepicker").datepicker({
		format : 'yyyy-mm-dd'
	});
});