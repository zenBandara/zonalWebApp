<?php
require_once 'php_action/db_connect.php';

session_start();

if (isset($_SESSION['userId'])) {
	header('location:' . $store_url . 'dashboard.php');
}

$errors = array();
if (isset($_POST['g-recaptcha-response'])) {
	if ($_POST['g-recaptcha-response'] == "") {
		$errors[] = "reCAPTCHA is required";
	}
}


if (isset($_POST['submitbtn']) && $_POST['g-recaptcha-response'] != "") {

	$username = $connect->real_escape_string($_POST['username']);
	$password = $connect->real_escape_string($_POST['password']);
	$recaptcha =  $_POST['g-recaptcha-response'];


	if (empty($username) || empty($password) || empty($recaptcha)) {
		if ($username == "") {
			$errors[] = "Username is required";
		}

		if ($password == "") {
			$errors[] = "Password is required";
		}
	} else {


		$secret = $reCAPTCHA_secret_key;
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if ($responseData->success) {

			$sql = "SELECT * FROM users WHERE username = '$username'";
			$result = $connect->query($sql) or header("location:".$query_err_page);
			$value = $result->fetch_array();
			if ($connect->error){
				echo "Error Queary";
			}

			if ($result->num_rows == 1) {
				// $password = password_hash($password, PASSWORD_DEFAULT);
				// exists
				// $mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
				// $mainResult = $connect->query($mainSql) or die($connect->error);

				if (password_verify($password, $value['password'])==1) {
					// $value = $mainResult->fetch_assoc();
					$user_id = $value['user_id'];
					$user_role = $value['username']; //changed chathu
					// set session
					$_SESSION['userId'] = $user_id;
					$_SESSION['userRole'] = $user_role; //changed chathu
					header('location:' . $store_url . 'dashboard.php');
				} else {

					$errors[] = "Incorrect username/password combination";
				} // /else
			} else {
				$errors[] = "Username doesnot exists";
			} // /else

		}
	} // /else not empty username // password

}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap Icons-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
	<!-- SimpleLightbox plugin CSS-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="/css/styles.css" rel="stylesheet" />

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>





</head>

<body class="bg-primary">
	<div class="container">


		<div class="row gx-4 gx-lg-5 h-100 " style="margin-top: 4rem;">
			<div class="col-lg-8 col-md-offset-4">
				<div class="align-items-center justify-content-center text-center">
					<br>
					<img src="assets/img/Central_Province.png" style="width: 15rem;">
					<br><br>
					<h1 class="text-white font-weight-bold">ZONAL EDUCATION OFFICE</h1>
					<h1 class="font-weight-bold" style="color: #ffd400;">KATUGASTOTA,</h1>
					<h1 class="text-white font-weight-bold">SRI LANKA</h1><br>
					<a class="btn btn-light btn-xl" href="/home"> Go to Home Page </a>

				</div>



			</div>

			<div class="col-lg-4 ">
				<br>
				<div class="card text-dark bg-light mb-3">
					<div class="card-header">
						<h3 class="card-title text-center">PLEASE SIGN IN</h3>
					</div>
					<div class="card-body ">

						<div class="messages">
							<?php if ($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									' . $value . '</div>';
								}
							} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
								<div class="form-group">
									
									<div class="form-floating mb-3">
										<input class="form-control" id="username" name="username" type="text" autocomplete="on" required />
										<label for="email">User Name</label>
									</div>
								</div>
								
								<br>
								<div class="form-group">
								<div class="form-floating mb-3">
										<input class="form-control" id="password" name="password" type="password" autocomplete="on" required />
										<label for="password">Password</label>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div>
										<div class="g-recaptcha" data-sitekey="<?php echo $reCAPTCHA_site_key;?>"></div>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div>
										<button type="submit" name="submitbtn" class="btn btn-primary btn-xl"> Sign in</button>
									</div>
								</div>
								<a class="nav-link" href="/mail/lostMyPassword.php" style="text-align: right;">*Forgot password? (Only for Administrators)</a>

							</fieldset>

						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- SimpleLightbox plugin JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

	<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
	<!-- Core theme JS-->
	<script src="/js/scripts.js"></script>
</body>

</html>