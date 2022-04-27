<?php
require_once 'php_action/db_connect_client.php';

$result_status = $mysqli->query("SELECT status FROM web_status") or header("location:" . $query_err_page);
$row_status = $result_status->fetch_array();

if ($row_status['status'] == 0) {
	header("location:/zonalMaintainance");
}

?>
<!-- New -->
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
<!-- Bootstrap Icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- SimpleLightbox plugin CSS-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" />
<!-- end new -->

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="/css/reset.min.css">
<link rel="stylesheet" type="text/css" href="/css/style.min.css">
<link rel="stylesheet" type="text/css" href="/css/ionicon.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!-- Data table JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>

<!-- CSS DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="/includes/headStyle/style.css">
<link rel="stylesheet" type="text/css" href="/includes/toastStyle/styles.css">
<link rel="stylesheet" type="text/css" href="/includes/homeStyle/style.css">

</head>

</head>

<body>
	<!-- Section: Header -->
	<header class="header" style="padding-top: 0; padding-bottom:0;">
		<div class="notranslate" style="text-align:right; background-color:#661414;padding-right:3%;color:#fff">
			<a onclick="window.location.assign('<?php echo $_SERVER['REQUEST_URI'];  ?>#googtrans(si|si)');window.location.reload();" data-lang="si" style="color:#fff">සිං&nbsp;</a>/
			<a onclick="window.location.assign('<?php echo $_SERVER['REQUEST_URI'];  ?>#googtrans(ta|ta)');window.location.reload();" data-lang="ta" style="color:#fff">தமி&nbsp;</a>/
			<a onclick="window.location.assign('<?php echo $_SERVER['REQUEST_URI'];  ?>#googtrans(en|en)');window.location.reload();" data-lang="en" style="color:#fff">En</a>

		</div>



		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

		<div class="container">

			<div class="wrapper">
				<div class="header-item-left">
					<h1><a href="/home" class="brand notranslate">Katu/Zonal</a></h1>
				</div>
				<!-- Section: Navbar Menu -->
				<div class="header-item-center">
					<div class="overlay"></div>
					<nav class="menu">
						<div class="menu-mobile-header">
							<button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
							<div class="menu-mobile-title"></div>
							<button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
						</div>
						<ul class="menu-section">
							<li><a href="/home">Home</a></li>
							<li><a href="/zonalEvents">Events</a></li>
							<li class="menu-item-has-children">
								<a href="#">Gallery <i class="ion ion-ios-arrow-down"></i></a>
								<div class="menu-subs menu-column-1">
									<ul>
										<li><a href="/imageGallery">Image Gallery</a></li>
										<li><a href="/videoGallery">Video Gallery</a></li>
									</ul>
								</div>
							</li>
							<!-- News -->
							<li class="menu-item-has-children">
								<a href="#">News <i class="ion ion-ios-arrow-down"></i></a>
								<div class="menu-subs menu-mega menu-column-4">
									<div class="list-item">
										<h4 class="title">Latest news</h4>
										<ul>
											<?php
											// Get Latest articles
											$result = $mysqli->query("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT 4") or header("location:" . $query_err_page);

											?>
											<!-- Links -->

											<?php while ($row = $result->fetch_assoc()) { ?>
												<li><a href="/news/<?= $row['article_id'] ?>"><?= substr($row['article_title'], 0, 17) . '...' ?></a></li>

											<?php } ?>
										</ul>

									</div>
									<div class="list-item">
										<h4 class="title">Latest news categories</h4>
										<ul>
											<?php
											// Get Latest articles

											$resultcat = $mysqli->query("SELECT *,COUNT(*) as article_count FROM `article` INNER JOIN category ON id_categorie=category_id GROUP BY id_categorie  LIMIT 4") or header("location:" . $query_err_page);

											while ($row = $resultcat->fetch_assoc()) { ?>
												<li><a href="/articleCategory/<?= $row['category_id'] ?>"><?= $row['category_name'] ?></a></li>

											<?php } ?>
										</ul>

									</div>
									<div class="list-item">
										<h4 class="title">Most Read</h4>
										<ul>
											<?php
											// Get Latest articles

											$result = $mysqli->query("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id order by RAND() LIMIT 4");

											?>
											<!-- Links -->

											<?php while ($row = $result->fetch_assoc()) { ?>
												<li><a href="/news/<?= $row['article_id'] ?>"><?= substr($row['article_title'], 0, 17) . '...' ?></a></li>

											<?php } ?>
										</ul>
									</div>
									<div class="list-item">
										<img src="/asset/newspaper.png" class="responsive" alt="Shop Product">
									</div>
								</div>
							</li>
							<!-- end news -->
							<li><a href="/zonalDownloads">Downloads</a></li>
							<li class="menu-item-has-children">
								<a href="#">About us <i class="ion ion-ios-arrow-down"></i></a>
								<div class="menu-subs menu-mega menu-column-4">
									<div class="list-item">
										<h4 class="title">Recruitments</h4>
										<ul>
											<li><a href="zonalVacancies">Job Vacancies</a></li>

										</ul>
										<h4 class="title">Our Staff</h4>
										<ul>
											<li><a href="/staffCategory/but_submit/academic">Academic Staff</a></li>
											<li><a href="/ourBranches">Non-acadamic Staff</a></li>
											<li><a href="/ourDivisions">Divisional Staff</a></li>

										</ul>
									</div>
									<div class="list-item">
										<h4 class="title">School Profiles</h4>
										<ul>
											<li><a href="/schoolList/Poojapitiya">Poojapitiya Division</a></li>
											<li><a href="/schoolList/Hatharaliyadda">Hatharaliyadda Division</a></li>
											<li><a href="/schoolList/Akurana">Akurana Division</a></li>
											<li><a href="/schoolList/Harispaththuwa">Harispaththuwa Division</a></li>
											<li><a href="/schoolList/Galagedara">Galagedara Division</a></li>
										</ul>

									</div>
									<div class="list-item">
										<h4 class="title">Evaluation</h4>
										<ul>
											<li><a href="/ourDivisions">Our divisions</a></li>

										</ul>
										<h4 class="title">Let you know!</h4>
										<ul>
											<li><a href="/zonalAnnouncements">Annoucements</a></li>
											<li><a href="/zonalEvents">Events</a></li>
											<li><a href="/zonalNotices">Notices</a></li>

										</ul>
									</div>
									<div class="list-item">
										<img src="/asset/business.png" class="responsive" alt="Shop Product">
									</div>
								</div>
							</li>
							<li><a href="/contact">Contact Us</a></li>
						</ul>
					</nav>
				</div>

				<div class="header-item-right">
					<div class="dropdown">
						<a class="dropbtn" style="margin-right: 90%;"><i class="icon ion-md-search" onclick="myFunction()"></i></a>
						<div id="myDropdown" class="dropdown-content">
							<input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()" autocomplete="off">
							<a id="n1" href="/home" style="display:none;">Home</a>
							<a href="/about" style="display:none;">About</a>
							<a href="/contact" style="display:none;">Contact Us</a>
							<a href="/Zonalfaq" style="display:none;">FAQs</a>
							<a href="/zonalNotices" style="display:none;">Notices</a>
							<a href="/zonalEvents" style="display:none;">Events</a>
							<a href="/zonalDownloads" style="display:none;">Downloads</a>
							<a href="/zonalAnnouncements" style="display:none;">Zonal Announcements</a>
							<a href="/zonalStaff" style="display:none;">Our Staff</a>
							<a href="/zonalVacancies" style="display:none;">Our Vacancies</a>
							<a href="/ourBranches" style="display:none;">Our Branches</a>
							<a href="/imageGallery" style="display:none;">Image Gallery</a>
							<a href="/videoGallery" style="display:none;">Video Gallery</a>
							<a href="/ourDivisions" style="display:none;">Our Divisions</a>
							<a href="/divisionalDetails" style="display:none;">Divisional Information</a>
							<a href="/articleCategory" style="display:none;">News Article Categories</a>
							<a href="/news/newsHome" style="display:none;">Zonal News</a>
							<a href="/schoolList" style="display:none;">Zonal Schools</a>
						</div>
					</div>

					<script>
						/* When the user clicks on the button,
						toggle between hiding and showing the dropdown content */
						function myFunction() {
							document.getElementById("myDropdown").classList.toggle("show");
						}

						function filterFunction() {

							var input, filter, ul, li, a, i;
							input = document.getElementById("myInput");
							filter = input.value.toUpperCase();
							div = document.getElementById("myDropdown");
							a = div.getElementsByTagName("a");
							for (i = 0; i < a.length; i++) {

								txtValue = a[i].textContent || a[i].innerText;
								if (txtValue.toUpperCase().indexOf(filter) > -1) {
									a[i].style.display = "";
								} else {
									a[i].style.display = "none";

								}
							}
						}
					</script>
					<a href="/zonalfaq" class="menu-icon"><i class="ion-md-help-circle"></i></a>
					<a href="/zonalLogin" class="menu-icon"><i class="ion-md-person"></i></a>


					<button type="button" class="menu-mobile-trigger">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</button>
				</div>

			</div>
		</div>
	</header>

	<!-- Section: Main -->
	<!-- <main class="main">
		<div class="container">

		</div>
	</main> -->
	<!-- Top button -->
	<a id="topBtn" title="To go up" class="float" onclick="topFunction()" style="display: none;">
		<i class="fas fa-chevron-up my-float"></i>
	</a>


	<script src="/js/script.js" defer></script>