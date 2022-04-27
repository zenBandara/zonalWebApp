<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="dashboard.php">Settings</a></li>
			<li class="active">Manage Moderators</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Moderator info.</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-admin btn-xl" data-toggle="modal" id="addUserModalBtn" data-target="#addUserModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add User </button>
				</div> <!-- /div-action -->

				<table class="table" id="manageUserTable">
					<thead>
						<tr>
							<th style="width:10%;">User Name</th>
							<th style="width:10%;">E-mail</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->





			</div> <!-- /panel-body -->
		</div> <!-- /panel -->

		<!-- new permission section -->
		<div class="panel panel-default" id="permission">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Change Moderator Permissions</div>
			</div>


		</div>
		
		<?php
		
    if (isset($_SESSION['msg'])) : ?>

        <div style="display:flex; top:30px;" class="alert alert-success ?> fade show" role="alert">


            <?php
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
		<div style="width: 10%; margin-left:10%;">
			<br>



			<?php

			$general = '';
			$institutes = '';
			$staff = '';
			$news = '';
			$resources = '';

			$resultU = $connect->query("SELECT * FROM permission WHERE id = 1") or die($mysqli->error);
			if (count(array($resultU)) == 1) {
				$row = $resultU->fetch_array();
				$general = $row['genaral'];
				$institutes = $row['institutes'];
				$staff = $row['staff'];
				$news = $row['news'];
				$resources = $row['resources'];
				//echo $img_title.'---image title---';
			}



			?>

				<script>
					function submitjs(){
						return confirm('Are you sure to change these permissions?');
	
					}

				</script>

			<div class="d-flex justify-content-center">
				<form action="process/permission_process.php" method="POST" enctype="multipart/form-data" onsubmit="return submitjs();">

					<input type="hidden" name="p_id" class="form-control" value="<?php echo $id; ?>" placeholder="ID" class="form-control" required>

					<div class="form-group">
						<label> Genaral</label><br>
						<select id="general" style="height:3%;" class="form-control" value="<?php echo $general; ?>" name="general" required>
							<option value="">SELECT</option>
							<option value="Yes" <?php if ($general == 'Yes') {
													echo 'selected';
												}  ?>>Yes </option>
							<option value="No" <?php if ($general == 'No') {
													echo 'selected';
												}  ?>>No </option>
						</select>
					</div>

					<div class="form-group">
						<label> Institutes</label><br>
						<select id="institutes" style="height:3%;" class="form-control" value="<?php echo $institutes; ?>" name="institutes" required>
							<option value="">SELECT</option>
							<option value="Yes" <?php if ($institutes == 'Yes') {
													echo 'selected';
												}  ?>>Yes</option>
							<option value="No" <?php if ($institutes == 'No') {
													echo 'selected';
												}  ?>>No</option>
						</select>
					</div>
					<div class="form-group">
						<label>Staff</label><br>
						<select id="staff" style="height:3%;" class="form-control" value="<?php echo $staff; ?>" name="staff" required>
							<option value="">SELECT</option>
							<option value="Yes" <?php if ($staff == 'Yes') {
													echo 'selected';
												}  ?>>Yes</option>
							<option value="No" <?php if ($staff == 'No') {
													echo 'selected';
												}  ?>>No</option>
						</select>
					</div>
					<div class="form-group">
						<label>News</label><br>
						<select id="news" style="height:3%;" class="form-control" value="<?php echo $news; ?>" name="news" required>
							<option value="">SELECT</option>
							<option value="Yes" <?php if ($news == 'Yes') {
													echo 'selected';
												}  ?>>Yes</option>
							<option value="No" <?php if ($news == 'No') {
													echo 'selected';
												}  ?>>No</option>
						</select>
					</div>
					<div class="form-group">
						<label>Resources</label><br>
						<select id="resources" style="height:3%;" class="form-control" value="<?php echo $resources; ?>" name="resources" required>
							<option value="">SELECT</option>
							<option value="Yes" <?php if ($resources == 'Yes') {
													echo 'selected';
												}  ?>>Yes</option>
							<option value="No" <?php if ($resources == 'No') {
													echo 'selected';
												}  ?>>No</option>
						</select>
					</div>
					<br>
					<button type="submit" class="btn btn-admin btn-xl" name="save" data-loading-text="Saving..."><i class="glyphicon glyphicon-ok-sign"></i>&nbsp;Save changes</button>
				</form>
			</div>
			<br>
		</div>
	</div>

</div> <!-- /col-md-12 -->

</div> <!-- /row -->




<!-- add user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<form class="form-horizontal" id="submitUserForm" action="php_action/createUser.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
				</div>

				<div class="modal-body" style="max-height:450px; overflow:auto;">

					<div id="add-user-messages"></div>



					<div class="form-group">
						<label for="userName" class="col-sm-3 control-label">User Name: </label>

						<div class="col-sm-8">
							<input type="text" class="form-control" id="userName" placeholder="User Name" name="userName" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

					<div class="form-group">
						<label for="upassword" class="col-sm-3 control-label">Password: </label>

						<div class="col-sm-8">
							<input type="password" class="form-control" id="upassword" placeholder="Password" name="upassword" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

					<div class="form-group">
						<label for="uemail" class="col-sm-3 control-label">Email: </label>

						<div class="col-sm-8">
							<input type="email" class="form-control" id="uemail" placeholder="Email" name="uemail" autocomplete="off">
						</div>
					</div> <!-- /form-group-->

				</div> <!-- /modal-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-admin btn-xl" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

					<button type="submit" class="btn btn-admin btn-xl" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				</div> <!-- /modal-footer -->
			</form> <!-- /.form -->
		</div> <!-- /modal-content -->
	</div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Edit User</h4>
			</div>
			<div class="modal-body" style="max-height:450px; overflow:auto;">

				<div class="div-loading">
					<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					<span class="sr-only">Loading...</span>
				</div>

				<div class="div-result">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#userInfo" aria-controls="profile" role="tab" data-toggle="tab">User Info</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">



						<!-- product image -->
						<div role="tabpanel" class="tab-pane active" id="userInfo">
							<form class="form-horizontal" id="editUserForm" action="php_action/editUser.php" method="POST">
								<br />

								<div id="edit-user-messages"></div>

								<div class="form-group">
									<label for="edituserName" class="col-sm-3 control-label">User Name: </label>

									<div class="col-sm-8">
										<input type="text" class="form-control" id="edituserName" placeholder="User Name" name="edituserName" autocomplete="off">
									</div>
								</div> <!-- /form-group-->

								<div class="form-group">
									<label for="editPassword" class="col-sm-3 control-label">Password: </label>

									<div class="col-sm-8">
										<input type="password" class="form-control" id="editPassword" placeholder="Password" name="editPassword" autocomplete="off">
									</div>
								</div> <!-- /form-group-->

								<div class="form-group">
									<label for="editEmail" class="col-sm-3 control-label">Email: </label>

									<div class="col-sm-8">
										<input type="email" class="form-control" id="editEmail" placeholder="Email" name="editEmail" autocomplete="off">
									</div>
								</div> <!-- /form-group-->




								<div class="modal-footer editUserFooter">
									<button type="button" class="btn btn-admin btn-xl" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

									<button type="submit" class="btn btn-admin btn-xl" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
								</div> <!-- /modal-footer -->
							</form> <!-- /.form -->
						</div>
						<!-- /product info -->
					</div>

				</div>

			</div> <!-- /modal-body -->


		</div>
		<!-- /modal-content -->
	</div>
	<!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove User</h4>
			</div>
			<div class="modal-body">

				<div class="removeUserMessages"></div>

				<p>Do you really want to remove ?</p>
			</div>
			<div class="modal-footer removeProductFooter">
				<button type="button" class="btn btn-admin btn-xl" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				<button type="button" class="btn btn-admin btn-xl" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>