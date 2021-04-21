<!DOCTYPE html>
<html>

<head>
	<title>Webclient MoolahGo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>

</head>

<?php
$apiUrl = 'http://localhost:8000/process';
?>

<body>

	<section class="container-fluid">
		<section class="row justify-content-center">
			<section class="col-12 col-sm-6 col-md-4">

				<div class="card-body">
					<form class="form-container" id="myform">
						<h3 class="text-center">Have a referral code?</h3>
						<div class="form-group">
							<input type="text" class="form-control" name="code" minlength="6" maxlength="6" id="code" onkeyup="this.value = this.value.toUpperCase();" placeholder="Your referral code">

						</div>

						<div class="form-group">
							<button class="btn btn-primary btn-apply" id="codeSubmit">Apply</button>
						</div>

					</form>
				</div>


			</section>
		</section>
	</section>

</body>
<script type="text/javascript">
	$(document).ready(function() {

		$.validator.addMethod("referralcode", function(value, element) {
			return this.optional(element) || /^[A-Z0-9]+$/i.test(value);
		}, "Referal Code must contain only alphanumeric");

		var validator = $('#myform').validate({
			rules: {
				code: {
					required: true,
					referralcode: true,
					min: 6,
					max: 6
				},
			},
			messages: {
				code: {
					required: "Please Enter your Referal Code"
				}
			},
			success: function(label) {
				$.ajax({
					url: '<?php echo $apiUrl; ?>',
					type: 'POST',
					dataType: 'json',
					data: {
						"code": $("#code").val()
					},
					success: function(res) {
						console.log(res);
					},
					error: function(res) {
						console.log(res.responseText);
					}
				});
			},
		});


		$("#codeSubmit").click(function(e) {
			e.preventDefault();
			$(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Loading');
			$("#codeSubmit").prop('disabled', true);
			$("#myform").valid();
			return false;
		});
	});
</script>

</html>