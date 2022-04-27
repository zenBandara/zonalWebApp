<?php require_once 'includes/header.php'; ?>



<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
<div class="container">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
	<br>
	<div class="row" style="margin-bottom:2em;">
		<?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
			<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
						<?php
						$result_scl = $connect->query("SELECT count(*) as user_count from users") or die($mysqli->error);
						$row = $result_scl->fetch_array();

						?>

						<a style="text-decoration:none;color:black;">
							Total Users

							<?php ?>
							<span class="badge pull pull-right"><?php echo $row['user_count']; ?></span>
						</a>

					</div>
					<!--/panel-hdeaing-->
				</div>
				<!--/panel-->
			</div>
			<!--/col-md-4-->

			<div class="col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<a style="text-decoration:none;color:black;">
							Total Admins
							<span class="badge pull pull-right">1</span>
						</a>

					</div>
					<!--/panel-hdeaing-->
				</div>
				<!--/panel-->
			</div>
			<!--/col-md-4-->



			<div class="col-md-4">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<a style="color: black;">
							Total Modetators
							<span class="badge pull pull-right"><?php echo $row['user_count'] - 1; ?></span>
						</a>

					</div>
					<!--/panel-hdeaing-->
				</div>
				<!--/panel-->
			</div>
			<!--/col-md-4-->

		<?php } ?>

		<?php
		$result_div = $connect->query("SELECT count(*) as user_count from div_staff") or die($mysqli->error);
		$row = $result_div->fetch_array();

		?>
		<div class="col-md-4">
			<div class="card">
				<div class="cardHeader">
					<h1><?php echo $row['user_count'];?></h1>
				</div>

				<div class="cardContainer">
					<p>Added Total Divisional Staff Members </p>
				</div>
			</div>
			<br />
			<?php
		$result_ac = $connect->query("SELECT count(*) as user_count from staff") or die($mysqli->error);
		$row_ac = $result_ac->fetch_array();

		?>

			<div class="card">
				<div class="cardHeader" style="background-color:#245580;">
					<h1><?php echo $row_ac['user_count'];?></h1>
				</div>

				<div class="cardContainer">
					<p>Added Total Academic Staff Members</p>
				</div>
			</div>
			<br>
			<?php
		$result_non = $connect->query("SELECT count(*) as user_count from nonac_staff") or die($mysqli->error);
		$row_non = $result_non->fetch_array();

		?>
			<div class="card">
				<div class="cardHeader" style="background-color:#675454;">
					<h1><?php echo $row_non['user_count'];?></h1>
				</div>
				

				<div class="cardContainer">
					<p>Added Total Non-academic Staff Members</p>
				</div>
			</div>


		</div>



		<?php if (isset($_SESSION['userId'])) { ?>
			<div class="col-md-8">
				<div class="card">
					<div class="cardHeader" style="background-color:#675454; height:8em;">
						<h1 style="font-size: 5em;"><?php echo date('d'); ?></h1>

					</div>

					<div class="cardContainer" style=" height:10.3em;">
						<p style="font-size:2em; padding-top:1.5em;"><?php echo date('l') . ' ' . date('d') . ', ' . date('Y'); ?></p> <i>(Today)</i>

					</div>
				</div>
				<br>

			</div>
			<br>
		<?php  } ?>

	</div>
	<!--/row-->
</div>

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function() {
		// top bar active
		$('#navDashboard').addClass('active');

		//Date for the calendar events (dummy data)
		var date = new Date();
		var d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear();

		$('#calendar').fullCalendar({
			header: {
				left: '',
				center: 'title'
			},
			buttonText: {
				today: 'today',
				month: 'month'
			}
		});


	});
</script>

<?php require_once 'includes/footer.php'; ?>