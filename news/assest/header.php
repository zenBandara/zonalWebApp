<!-- Section: Header -->
<header class="header" style="padding-top: 0; padding-bottom:0;">
	<div style="text-align:right; background-color:#661414;padding-right:3%;color:#fff">
		<a class="notranslate" onclick="window.location.assign('<?php echo $_SERVER['REQUEST_URI'];  ?>#googtrans(si|si)');window.location.reload();" data-lang="si" style="color:#fff">සිං&nbsp;</a>/
		<a class="notranslate" onclick="window.location.assign('<?php echo $_SERVER['REQUEST_URI'];  ?>#googtrans(ta|ta)');window.location.reload();" data-lang="ta" style="color:#fff">தமி&nbsp;</a>/
		<a class="notranslate" onclick="window.location.assign('<?php echo $_SERVER['REQUEST_URI'];  ?>#googtrans(en|en)');window.location.reload();" data-lang="en" style="color:#fff">En</a>

	</div>



	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	<div class="container">

		<div class="wrapper">
			<div class="header-item-left">
				<h1><a href="/home" class="brand">Katu/Zonal</a></h1>
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
					<ul class="menu-section" style="font-weight: 900;">
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

										$result_article = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT 4");
										$result_article->execute();
										$latest_articles = $result_article->fetchAll();



										?>
										<!-- Links -->

										<?php foreach ($latest_articles as $larticle) { ?>
											<li><a href="/news/<?= $larticle['article_id'] ?>"><?= substr($larticle['article_title'], 0, 17) . '...' ?></a></li>

										<?php } ?>
									</ul>

								</div>
								<div class="list-item">
									<h4 class="title">Latest news categories</h4>
									<ul>
										<?php

										// Get Latest articles

										$resultcat = $conn->prepare("SELECT *,COUNT(*) as article_count FROM `article` INNER JOIN category ON id_categorie=category_id GROUP BY id_categorie  LIMIT 4");
										$resultcat->execute();
										$latest_cat = $resultcat->fetchAll();
										foreach ($latest_cat as $cat) { ?>
											<li><a href="/articleCategory/<?= $cat['category_id'] ?>"><?= $cat['category_name'] ?></a></li>

										<?php }
										?>
									</ul>

								</div>
								<div class="list-item">
									<h4 class="title">Most Read</h4>
									<ul>
										<?php
										// Get Latest articles

										$result_most = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id order by RAND() LIMIT 4");
										$result_most->execute();
										$most_read = $result_most->fetchAll();
										?>
										<!-- Links -->

										<?php foreach ($most_read as $most_r) { ?>
											<li><a href="/news/<?= $most_r['article_id'] ?>"><?= substr($most_r['article_title'], 0, 17) . '...' ?></a></li>

										<?php }
										// $conn = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
										?>
									</ul>
								</div>
								<div class="list-item">
									<img src="/asset/newspaper.png" class="responsive" alt="news paper">
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
										<li><a href="/zonalVacancies">Job Vacancies</a></li>

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
									<img src="/asset/business.png" class="responsive" alt="people image">
								</div>
							</div>
						</li>
						<li><a href="/contact">Contact Us</a></li>
					</ul>
				</nav>
			</div>

			<div class="header-item-right">
				<div class="dropdown">
					<a class="dropbtn" style="margin-right: 90%;"><i class="icon ion-md-search" onclick="myFunction()" style="color:#fff"></i></a>
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

<!-- Top button -->
<a id="topBtn" title="To go up" class="float" onclick="topFunction()" style="display: none;">
	<i class="fas fa-chevron-up my-float"></i>
</a>