$( document ).ready(function() {
    
	var request;
	
    $('#myLoginForm').submit(function(event){
        
		// Prevent default posting of form - put here to work in case of errors
		event.preventDefault();

		// Abort any pending request
		if (request) {
			request.abort();
		}

		var $form = $(this);

		grecaptcha.ready(function () {
			grecaptcha.execute('6LfxK6UZAAAAAK1OetSxFMhHatpdHHOg5OI4NPHA', {action: 'submit'}).then(function (token) {
				
				$('#g-recaptcha-response').val(token);

				var serializeDataArray = $form.serializeArray();
				// console.log(serializeDataArray);

				$.ajax({
					type: 'POST',
					url: 'post.php',
					data: serializeDataArray,
					dataType: 'json',
					beforeSend: function () {
						$("#feedback").css("opacity", 0.3);
						$('#loader').show();
					},
					success: function (data) {

						console.log(data);

						if (data['status']) {
							$('#response_notification').html('<div class="alert alert-success" style="display:none;"><a class="close" data-dismiss="alert" href="#">&times;</a>' + data['message'] + '</div>');
						} else {
							$('#response_notification').html('<div class="alert alert-danger" style="display:none;"><a class="close" data-dismiss="alert" href="#">&times;</a>' + data['message'] + '</div>');
						}
					},
					complete: function () {
						$('#loader').hide();
						$("#feedback").css("opacity", 1);
						$('.alert').fadeIn('slow');
					}
				});
			});
		});
    });
});