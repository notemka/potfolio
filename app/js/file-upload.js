$(function (){
	$('#fileupload').fileupload({
		dataType: 'json',
		success: function (data) {
			$('#fileurl').val(data.name);
			console.log(data.name);
		}
	});
});