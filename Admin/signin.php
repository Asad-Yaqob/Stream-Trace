<?php
include("query.php")
	?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Flat Able - Premium Admin Template by Phoenixcoded</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<div class="logo mb-3">

			<img src="assets/images/logo.png" alt="" height="50px">
		</div>
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Signin</h4>
						<hr>
						<form method="post" class="needs-validation">
							<div class="mb-4">
								<div class="input-group has-validation">
									<input type="text" class="form-control" id="validationCustomUsername"
										aria-describedby="inputGroupPrepend" name="name" placeholder="Username"
										>
									<div name="user-error" id="user_r" class="invalid-feedback text-left">
									</div>
								</div>
							</div>
							<div class="mb-4">
								<div class="input-group has-validation">
									<input type="text" class="form-control" id="validationCustomPassword"
										aria-describedby="inputGroupPrepend" name="pass" placeholder="Password"
										>
									<div name="user-error" id="pass_r" class="invalid-feedback text-left">
									</div>
								</div>
							</div>
							<!-- <div class="form-group mb-4">
								<input type="password" class="form-control" id="Password" placeholder="Password">
							</div> -->
							<button name="login" onclick="validated()" type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
						</form>
						<hr>
						<p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.php"
								class="f-w-400">Reset</a></p>
								<p class="mb-2 text-muted">Login As <a href="../techwiz-final/login.php"
								class="f-w-400">User</a></p>
						<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.php"
								class="f-w-400">Signup</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/validation.js"></script>
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
</body>

</html>