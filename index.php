<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="Welcome to the Zonal Education Office, Katugastota, Sri Lanka. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation.">
    <meta name="keywords" content="ZonalEdu, Zonal Katugastota, Zonal, Katugastota, Katugastota Zone, Katugastota Zonal">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="Welcome to the Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Welcome to the Zonal Education Office, Katugastota, Sri Lanka. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Welcome to the Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="Welcome to the Zonal Education Office, Katugastota, Sri Lanka. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. " />
    <meta name="twitter:description" content="Welcome to the Zonal Education Office, Katugastota, Sri Lanka. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>Zonal Home - Katugastota</title>

    <?php require_once 'nav.php'; ?>
    

    <!-- Masthead-->
    <header class="masthead">


        <div class="container px-4 px-lg-5 h-100">



            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end" style="text-align: center;">



                    <img src="asset/zonal.png" style="width: 43rem;">
                    <hr class="divider" />
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <a class="btn btn-primary btn-xl" href="/zonalNotices" style="margin-bottom:2px; width: 16em;"><i class="ion-ios-paper-plane" style="margin-right: 15px;"></i> Check Notices</a>
                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-primary btn-xl" href="/ourDivisions" style="margin-bottom:2px;width: 16em;"><i class="ion-ios-map" style="margin-right: 15px;"></i>Our Divisions</a>
                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-primary btn-xl" href="/Zonalfaq" style="margin-bottom:2px;width: 16em;"><i class="ion-md-help-circle" style="margin-right: 15px;"></i>FAQs</a>
                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-primary btn-xl" href="/zonalStaff" style="margin-bottom:2px;width: 16em;"><i class="ion-ios-people" style="margin-right: 15px;"></i>Our Staff</a>
                    </div>

                </div>

            </div>
        </div>
    </header>


    <?php

    $resultU = $mysqli->query("SELECT * FROM zone_dir") or header("location:".$query_err_page);
    $row = $resultU->fetch_array();
    ?>
    <!-- About-->
    <section class="page-section-index bg-primary ">
        
        <div class="container px-4 px-lg-5">

            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10 text-center">
                    <h2 class="text-white mt-0">Zonal Director's Message</h2>
                    <hr class="divider divider-light" />
                    <br>
                    <div class="row">
                        <div class="col-lg-6 text-center">
                            <img src="<?php echo $row['img_path']; ?>" style="width: 200px; height:200px;" class="rounded-circle center">
                            <br>
                            <h5 class="text-white mt-2 mb-0"><?php echo $row['title'] . ' ' . $row['name']; ?></h5> <i class="text-white-75">Zonal Director - Katugastota, Sri Lanka</i><br>
                        </div>
                        <div class="col-lg-6 text-center">
                            <br>
                            <blockquote class="blockquote text-white-75 mb-4">
                                <p class="fonts">"<?php echo $row['dir_word']; ?>"</p>
                            </blockquote>
                            <br>
                            <a class="btn btn-light btn-xl" href="/about">See More...</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Toast message -->
    <div id="toast">
        <div id="desc" class="container">

            <div class="row">
                <div class="col-lg-4">
                    <b>Latest Announcement</b><br>


                    <?php
                    $result_latest_ann = $mysqli->query("SELECT * FROM `announcement` ORDER BY `id` DESC  LIMIT 2") or header("location:".$query_err_page);
                    $row_latest_ann = $result_latest_ann->fetch_array() ?>
                    <?php echo $row_latest_ann['a_title']; ?> <br> <i class="text-muted"><?php echo substr(strip_tags($row_latest_ann['a_body']), 0, 20) . "..."; ?> </i> <a href="/zonalAnnouncements#an<?php echo $row_latest_ann['id']; ?>">See More...</a><br>

                </div>

                <div class="col-lg-4">
                    <b>Latest Notice</b><br>
                    <?php
                    $result_latest_noti = $mysqli->query("SELECT * FROM `notices` ORDER BY `id` DESC  LIMIT 2") or header("location:".$query_err_page);
                    $row_latest_noti = $result_latest_noti->fetch_array() ?>
                    <?php echo $row_latest_noti['title']; ?> <br> <i class="text-muted"><?php echo substr(strip_tags($row_latest_noti['content']), 0, 20) . "..."; ?> </i> <a href="/noticeCategory/<?php echo $row_latest_noti['category']; ?>#col<?php echo $row_latest_noti['id']; ?>">See More...</a><br>


                </div>

                <div class="col-lg-4">
                    <b>Latest Event</b><br>
                        <?php
                        $result_latest_eve = $mysqli->query("SELECT * FROM `eventcal` ORDER BY `id` DESC  LIMIT 2") or header("location:".$query_err_page);
                        $row_latest_eve = $result_latest_eve->fetch_array() ?>
                        <?php echo $row_latest_eve['title']; ?> <br><a href="/zonalEvents">See More...</a><br>
                    

                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            launch_toast();
        });


        function launch_toast() {
            var x = document.getElementById("toast")
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 5000);
        }
    </script>
    <!-- end toast message -->

    <!-- Mission Vision -->
    <?php
    $result_vision = $mysqli->query("SELECT * FROM contacts WHERE name = 'vision'") or header("location:".$query_err_page);
    $row_vision = $result_vision->fetch_array();
    $vision = $row_vision['content'];

    $result_mission = $mysqli->query("SELECT * FROM contacts WHERE name = 'mission'") or header("location:".$query_err_page);
    $row_mission = $result_mission->fetch_array();
    $mission = $row_mission['content'];
    ?>
    <section class="page-section-index" id="services">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-6 text-center">
                    <i class="bi-gem fs-1"></i>
                    <h4 class=" mt-0">Vision</h4>
                    <hr class="divider" />
                    <p class="text-muted mb-4 lft_divider " style="border-left: 5px solid white; padding-left:10px; text-align:left"><?php echo $vision; ?></p>

                </div>
                <div class="col-lg-6 text-center">
                    <i class="bi-globe fs-1"></i>
                    <h4 class=" mt-0">Mission</h4>
                    <hr class="divider" />
                    <p class="text-muted mb-4" style="border-left: 5px solid white; padding-left:10px; text-align:left"><?php echo $mission; ?></p>
                </div>
            </div>
        </div>
    </section>



    <!-- Services-->
    <section class="page-section-index bg-primary" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center text-white mt-0">Let You Know</h2>
            <hr class="divider divider-light" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="text-white-75 mb-2"><i class="bi bi-megaphone fs-1 text-white-75"></i></div>
                        <h3 class="text-white h4 mb-2">Latest Announcements</h3>
                        <ul class="list-group center" style="width: 90%;">
                            <?php
                            $result_ann = $mysqli->query("SELECT * FROM `announcement` ORDER BY `id` DESC  LIMIT 2") or header("location:".$query_err_page);
                            while ($row_ann = $result_ann->fetch_assoc()) { ?>
                                <li style="text-align: left;" class="list-group-item bg-primary"><a href="/zonalAnnouncements#an<?php echo $row_ann['id']; ?>"><i class="fas fa-arrow-right"></i> &nbsp; <?php echo $row_ann['a_title']; ?></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                    <br>
                    <a class="btn btn-light btn-xl" href="/zonalAnnouncements">See More...</a>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-file-earmark-post fs-1 text-white-75"></i></div>
                        <h3 class="text-white h4 mb-2">Latest Notices</h3>
                        <ul class="list-group center" style="width: 90%;">
                            <?php
                            $result_ann = $mysqli->query("SELECT * FROM `notices` ORDER BY `id` DESC  LIMIT 2") or header("location:".$query_err_page);
                            while ($row_ann = $result_ann->fetch_assoc()) { ?>
                                <li style="text-align: left;" class="list-group-item bg-primary"><a href="noticeCategory/<?php echo $row_ann['category']; ?>#col<?php echo $row_ann['id']; ?>"><i class="fas fa-arrow-right"></i> &nbsp; <?php echo $row_ann['title']; ?></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                    <br>
                    <a class="btn btn-light btn-xl" href="/zonalNotices">See More...</a>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-calendar-event fs-1 text-white-75"></i></div>
                        <h3 class="text-white h4 mb-2">Latest Events</h3>
                        <ul class="list-group center" style="width: 90%;">
                            <?php
                            $result_ann = $mysqli->query("SELECT * FROM `eventcal` ORDER BY `id` DESC  LIMIT 2") or header("location:".$query_err_page);
                            while ($row_ann = $result_ann->fetch_assoc()) { ?>
                                <li style="text-align: left;" class="list-group-item bg-primary"><a href="/zonalEvents"><i class="fas fa-arrow-right"></i> &nbsp; <?php echo $row_ann['title']; ?></a></li>
                            <?php } ?>

                        </ul>

                    </div>
                    <br>
                    <a class="btn btn-light btn-xl" href="/zonalEvents">See More...</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Examination evaluation -->
    <section class="page-section-index" id="exameval">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Examination Evaluation</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-bar-chart-line fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Genaral Scholaship Examination</h3>
                        <br>
                        <ul class="list-group center" style="width: 70%;">

                            <li style="text-align: left;" class="list-group-item"><a href="/examEvalution/all#graph_gse"><i class="fas fa-arrow-right"></i> &nbsp; Full Evaluation</a></li>
                            <li style="text-align: left;" class="list-group-item text-muted"> &nbsp; Division wise Evaluation<br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Poojapitiya#graph_gse"><i class="fas fa-angle-double-right"></i> &nbsp; Poojapitiya</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Hatharaliyadda#graph_gse"><i class="fas fa-angle-double-right"></i> &nbsp; Hatharaliyadda</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Akurana#graph_gse"><i class="fas fa-angle-double-right"></i> &nbsp; Akurana</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Harispaththuwa#graph_gse"><i class="fas fa-angle-double-right"></i> &nbsp; Harispaththuwa</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Galagedara#graph_gse"><i class="fas fa-angle-double-right"></i> &nbsp; Galagedara</a>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-pie-chart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">G.C.E. Ordinary Level (O/L)</h3>
             
                        <br>
                        <ul class="list-group center" style="width: 70%;">

                            <li style="text-align: left;" class="list-group-item"><a href="/examEvalution/all#graph_ol"><i class="fas fa-arrow-right"></i> &nbsp; Full Evaluation</a></li>
                            <li style="text-align: left;" class="list-group-item text-muted"> &nbsp; Division wise Evaluation<br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Poojapitiya#graph_ol"><i class="fas fa-angle-double-right"></i> &nbsp; Poojapitiya</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Hatharaliyadda#graph_ol"><i class="fas fa-angle-double-right"></i> &nbsp; Hatharaliyadda</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Akurana#graph_ol"><i class="fas fa-angle-double-right"></i> &nbsp; Akurana</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Harispaththuwa#graph_ol"><i class="fas fa-angle-double-right"></i> &nbsp; Harispaththuwa</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Galagedara#graph_ol"><i class="fas fa-angle-double-right"></i> &nbsp; Galagedara</a>
                            </li>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-graph-up fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">G.C.E. Advanced Level (A/L)</h3>
                   
                        <br>
                        <ul class="list-group center" style="width: 70%;">

                            <li style="text-align: left;" class="list-group-item"><a href="/examEvalution/all#graph_al"><i class="fas fa-arrow-right"></i> &nbsp; Full Evaluation</a></li>
                            <li style="text-align: left;" class="list-group-item text-muted"> &nbsp; Division wise Evaluation<br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Poojapitiya#graph_al"><i class="fas fa-angle-double-right"></i> &nbsp; Poojapitiya</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Hatharaliyadda#graph_al"><i class="fas fa-angle-double-right"></i> &nbsp; Hatharaliyadda</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Akurana#graph_al"><i class="fas fa-angle-double-right"></i> &nbsp; Akurana</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Harispaththuwa#graph_al"><i class="fas fa-angle-double-right"></i> &nbsp; Harispaththuwa</a><br>
                                &nbsp;&nbsp;&nbsp;<a href="/examEvalution/Galagedara#graph_al"><i class="fas fa-angle-double-right"></i> &nbsp; Galagedara</a>
                            </li>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action-->
    <section class="page-section-index bg-primary text-white">
        <div class="container px-4 px-lg-5 text-center">
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="text-white-75 mb-2">
                            <p>Total Number of Divisions</p>
                        </div>
                        <h1 style="font-size: 4.5rem;" class="text-white h1 mb-2">5</h1>


                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <?php
                    $result_scl = $mysqli->query("SELECT count(*) as scl_count from school") or header("location:".$query_err_page);
                    $row_scl = $result_scl->fetch_array();
                    $count_scl = $row_scl['scl_count'];
                    ?>
                    <div class="mt-5">
                        <div class="text-white-75 mb-2">
                            <p>Total Number of Schools</p>
                        </div>
                        <h1 style="font-size: 4.5rem;" class="text-white h1 mb-2"><?php echo $count_scl; ?></h1>


                    </div>
                </div>
                <?php
                $result_ts = $mysqli->query("SELECT sum(tam_tea + eng_tea + sin_tea) as tea_count, sum(tam_st + eng_st + sin_st) as st_count from school") or header("location:".$query_err_page);

                $row_ts = $result_ts->fetch_array();
                $count_tea = $row_ts['tea_count'];
                $count_st = $row_ts['st_count'];

                ?>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="text-white-75 mb-2">
                            <p>Total Number of Teachers</p>
                        </div>
                        <h1 style="font-size: 4.5rem;" class="text-white h1 mb-2"><?php echo $count_tea; ?></h1>


                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="text-white-75 mb-2">
                            <p>Total Number of Students</p>
                        </div>
                        <h1 style="font-size: 4.5rem;" class="text-white h1 mb-2"><?php echo $count_st; ?></h1>


                    </div>
                </div>

                <div class="text-center">
                    <br><br>
                    <a class="btn btn-light btn-xl" href="/divisionalDetails">See More...</a>
                </div>

            </div>

    </section>

    <!-- gallery-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">

                <?php
                $result = $mysqli->query("SELECT * from img_gallery WHERE category = 'Home page images' order by RAND() LIMIT 6") or header("location:".$query_err_page);
                ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?php echo $row['img_path']; ?>" title="<?php echo $row['img_title']; ?>">
                            <img class="img-fluid" style="height: 16rem;" src="<?php echo $row['img_path']; ?>" alt="<?php echo $row['img_title']; ?>" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50"><?php echo $row['category']; ?></div>
                                <div class="project-name"><?php echo $row['img_title']; ?></div>
                            </div>
                        </a>
                    </div>

                <?php } ?>


            </div>
        </div>
    </div>

    <!-- Related websites -->
    <section class="page-section-index bg-primary text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="text-center text-white mt-0">Related Websites</h2>
            <hr class="divider divider-light" />
            <div class="row gx-4 gx-lg-5">
                <?php
                $result_rweb = $mysqli->query("SELECT * FROM `relatedweb`") or header("location:".$query_err_page);
                while ($row_rweb = $result_rweb->fetch_assoc()) { ?>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <a href="<?php echo $row_rweb['url']; ?>">
                                <img src="<?php echo $row_rweb['image']; ?>" style="width: 100px; height:100px;" class="rounded-circle center">
                                <br>
                                <div class="text-white-75 mb-2">
                                    <h6><?php echo $row_rweb['title']; ?></h6>
                                </div>

                            </a>

                        </div>
                    </div>

                <?php } ?>

            </div>

    </section>


    <!-- Latest news -->
    <section class="page-section-index" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Latest News</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">

                <?php
                // Get Latest articles
                $stmt = $mysqli->query("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT 4") or header("location:".$query_err_page);


                while ($article = $stmt->fetch_assoc()) { ?>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">

                            <!-- post -->

                            <div class="post card notranslate" style="padding:10px;">
                                <a class="post-img" href="/news/<?= $article['article_id'] ?>">
                                    <img src="/news/img/article/<?= str_replace('../news/img/article/', '', $article['article_image']) ?>" alt="">
                                </a>
                                <di class="post-body">

                                    <div class="post-meta">
                                        <a class="card cat-1 text-white"  href="/articleCategory/<?= $article['category_id'] ?>" style="background-color:<?= $article['category_color'] ?>;"><b style="text-transform: uppercase;"><?= $article['category_name'] ?></b></a>
                                        <span class="post-date">
                                            <?= date_format(date_create($article['article_created_time']), "F d, Y ") ?>
                                        </span>
                                    </div>

                                    <h3 class="post-title"><a href="/news/<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a></h3>

                                </di>
                            </div>

                            <!-- /post -->

                        </div>
                    </div>

                <?php } ?>

                <div class="text-center">
                    <a class="btn btn-primary btn-xl" href="/news/newsHome">SEE MORE...</a>

                </div>
            </div>


        </div>

    </section>
    <?php require_once 'main-footer.php'; ?>

    <!-- Footer-->


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="/js/scripts.js"></script>
    </body>

</html>