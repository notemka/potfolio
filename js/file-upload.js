(function(){
	$('#fileupload').fileupload({
		//url: './php/upload.php',
		dataType: 'json',
		success: function(data){
			$('#fileurl').val(data.name);
			console.log(data.name);
		}
	});
}());