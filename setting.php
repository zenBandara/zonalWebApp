<?php require_once 'includes/header.php'; ?>

<?php
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

//$connect->close();
?>

<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="dashboard.php">Settings</a></li>
			<li class="active">Admin Settings</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Manage Admin Info.</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">



				<form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<legend>Change Username</legend>

						<div class="changeUsenrameMessages"></div>

						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="username" name="username" placeholder="Usename" value="<?php echo $result['username']; ?>" />
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" />
								<button type="submit" class="btn btn-admin btn-xl" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
							</div>
						</div>




					</fieldset>
				</form>

				<form action="php_action/changeEmail.php" method="post" class="form-horizontal" id="changeEmailForm">
					<fieldset>

						<legend>Change Email</legend>

						<div class="changeEmailMessages"></div>

						<div class="form-group">
							<label for="uemail" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="uemail" name="uemail" placeholder="Email" value="<?php echo $result['email']; ?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" />
								<button type="submit" class="btn btn-admin btn-xl" data-loading-text="Loading..." id="changeEmailBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
							</div>
						</div>


					</fieldset>
				</form>


				<form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Change Password</legend>

						<div class="changePasswordMessages"></div>

						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">Current Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
							</div>
						</div>

						<div class="form-group">
							<label for="npassword" class="col-sm-2 control-label">New password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
							</div>
						</div>

						<div class="form-group">
							<label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" />
								<button type="submit" class="btn btn-admin btn-xl"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>

							</div>
						</div>


					</fieldset>
				</form>

			</div> <!-- /panel-body -->

		</div> <!-- /panel -->

		<!-- panel for web site status -->
		<div class="panel panel-danger">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Website Status</div>
			</div> <!-- /panel-heading -->

			<?php
			$status_sql = "SELECT * FROM web_status WHERE status_id = '1'";
			$status_query = $connect->query($status_sql);
			$status_result = $status_query->fetch_array();
			//$connect->close();
			?>

			<script>
				function submitjs(form) {

					let text = 'Are you sure to change status of the Client Side Web-Application?';
					if (confirm(text) == true) {
						
						return true;
					} else {
						
						return false;
						
					}
					
					
				}
			</script>

			<div class="panel-body">

				<form action="php_action/changeWebStatus.php" method="post" class="form-horizontal" id="changeStatusForm" onsubmit="return submitjs(this);">
					<fieldset>
						<legend>Change Client Side Website's Status</legend>
						<div class="changeStatusMessages"></div>

						<?php $webStatus = '1'; ?>
						<div class="form-group">
							<label for="webStatus" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<select style="width:10%;" class="form-control" value="<?php echo $status_result['status']; ?>" name="webStatus" id="webStatus" required>

									<option value="1" <?php if ($status_result['status'] == '1') {
															echo 'selected';
														}  ?>>Up</option>
									<option value="0" <?php if ($status_result['status'] == '0') {
															echo 'selected';
														}  ?>>Down</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" />
								<button type="submit" class="btn btn-admin btn-xl" data-loading-text="Loading..." id="changeWebStatusBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
							</div>
						</div>




					</fieldset>
				</form>

			</div>
		</div>



	</div> <!-- /col-md-12 -->
</div> <!-- /row-->


<script src="custom/js/setting.js"></script>
<?php require_once 'includes/footer.php'; ?>