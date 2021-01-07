<html lang="en"><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MoolahGo Challenge</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-light">
	<div class="container">
		<div class="py-5 text-center">
			<img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
			<h2>Checkout form</h2>
			<p class="lead">There are currently 2 user that can be inserted into the referral <strong>ASD123</strong> and <strong>123ASD</strong>. If referral valid, the border will turn green. Submitting the form will create user.</p>
		</div>
		<form class="needs-validation" novalidate="" id="signupForm" method="POST">
			<div class="row">
				<div class="col-md-4 order-md-2 mb-4">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
						<span class="text-muted">Referral</span>
					</h4>
					<div class="card p-2">
						<div class="input-group validate">
							<input type="text" class="form-control referral" id="referral" name="referral" placeholder="Referral code" maxlength="6">
							<input type="hidden" id="referralcode" name="referralcode">
							<div class="input-group-append" id="redeemGroup">
								<button type="button" class="btn btn-secondary" id="redeem">Redeem</button>
								<button type="button" class="btn btn-secondary bg-success" id="applied">Applied</button>
								<button type="button" class="btn btn-secondary bg-danger" id="cancel">Remove</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 order-md-1">
					<h4 class="mb-3">Sign-Up</h4>
					<div class="row">
						<div class="col-md-6 mb-3 validate">
							<label for="firstname">First name</label>
							<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name">
						</div>
						<div class="col-md-6 mb-3 validate">
							<label for="lastname">Last name</label>
							<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name">
						</div>
					</div>

					<div class="mb-3 validate">
						<label for="username">Username</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">@</span>
							</div>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username">
							<div class="invalid-feedback" style="width: 100%;">
								Your username is required.
							</div>
						</div>
					</div>

					<div class="mb-3 validate">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
						<div class="invalid-feedback">
							Please enter a valid email address for shipping updates.
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3 validate">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="" value="" required="">
							<div class="invalid-feedback">
								Password is required.
							</div>
						</div>
						<div class="col-md-6 mb-3 validate">
							<label for="confirm_password">Re-Enter Password</label>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="" value="" required="">
							<div class="invalid-feedback">
								Password is not match
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 mb-3 validate">
							<div class="checkbox">
								<label>
									<input type="checkbox" id="agree" name="agree" value="agree">Please agree to our policy
								</label>
							</div>
						</div>
					</div>
					<button class="btn btn-primary btn-lg btn-block" id="submit" type="submit" disabled>Sign Up</button>
				</div>
			</div>
		</form>

		<footer class="my-5 pt-5 text-muted text-center text-small">
			<p class="mb-1">©2021 MoolahGO Challenge</p>
		</footer>
	</div>

	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="spinner-border" role="status">
					<span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade"></div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
	<script type="text/javascript" src="scripts/script.js"></script>
</body></html>