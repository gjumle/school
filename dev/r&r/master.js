$(document).ready(function() {
	$(#submit).on('click', function() {
		var distance = $(#distance).val();
		var str_time = $(#time).val();
		var username = $(#username).val();
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

function delete_check() {
	alert("Delete record?");
}
