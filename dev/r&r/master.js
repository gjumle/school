$(document).ready(function() {
	$(#submit).on('click', function() {
		let distance = $(#distance).val();
		let str_time = $(#time).val();
		let username = $(#username).val();
		if (distance != '' && str_time != '' && username != '') {
			$.('#submit').attr('disabled', 'disabled');
			$.ajax({
				url: index.php,
				type: post,
				data: {
					distance: distance,
					str_time: str_time,
					username: username
				},
				cache: false,
				success: function(dataResult) {
					let dataResult = JSON.parse(dataResult);
					if (dataResult.statusCode=200) {
						$('#submit').removeAttr("disabled");
						$('#form').find('input:text').val('');
						$('#success').show();
						$('#success').html('Data insert successfull.');
					}
					else if (dataResult.statusCode==201) {
						alert("Error");
					}
				}
			});
		}
		else {
			alert ("Fill out all fields!")
		}
	})
})
