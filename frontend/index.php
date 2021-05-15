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

					<div id="result"></div>

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
					minlength: 6,
					maxlength: 6
				},
			},
			messages: {
				code: {
					required: "Please Enter your Referal Code"
				}
			},

		});


		function enableBtnSubmit() {
			setTimeout(function() {

				$("#codeSubmit").html('Apply');
				$("#codeSubmit").prop('disabled', false);

			}, 500);
		}


		$("#codeSubmit").click(function(e) {
			e.preventDefault();
			$(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Loading');
			$("#codeSubmit").prop('disabled', true);
			let validate = $("#myform").valid();

			if (validate === false) {

				enableBtnSubmit();

			} else {
				$.ajax({
					url: '<?php echo $apiUrl; ?>',
					type: 'POST',
					dataType: 'json',
					data: $("#myform").serialize(),
					success: function(res) {
						var table = [];



						if (res.status == 200) {
							let status = res.data.status == 1 ? 'Aktif' : 'Inactive';

							table.push("<table class='table table-responsive'><thead><tr><th>Owner</th><th>Referal Code</th><th>Status</th><th>Expired Date</th></tr></thead><tbody>");
							table.push("<tr><td>" + res.data.owner.name + "</td>");
							table.push("<td>" + res.data.code + "</td>");
							table.push("<td>" + status +"</td>");
							table.push("<td>" + res.data.expired_date + "</td></tr>");
							table.push("</tbody></table>");

							$('#result').html(table.join(""));
						} else if (res.status == 404) {
							$("#result").html('<div class="alert alert-info" role="alert">Referral Code not found</div>');
						} else if (res.status == 401) {
							$("#result").html('<div class="alert alert-danger" role="alert">Referral Code has been expired at ' + res.data.expired_date + '</div>');
							$('#result').append(table.join(""));
						}

						enableBtnSubmit();
					},
				});
			}
			return false;
		});
	});
</script>

</html>