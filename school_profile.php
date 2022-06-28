<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once 'php_action/db_connect_client.php';

if (isset($_GET['censusno'])) {
$census_no = $mysqli->real_escape_string($_GET['censusno']);
$sql = "SELECT * FROM school WHERE census_no= $census_no;";
$result_sch = $mysqli->query($sql) or header("location:".$query_err_page);
$row_sch = $result_sch->fetch_array();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="Welcome to the School Profile of <?php echo $row_sch['sch_name']; ?>. The <?php echo $row_sch['sch_name']; ?> is the school that belongs to Katugastota Education Zone, Sri Lanka. And <?php echo $row_sch['sch_name']; ?> is supervising under the <?php echo $row_sch['sch_div']; ?> division, Sri Lanka.  The name of the current principal is <?php echo $row_sch['principal_title'] . ' ' . $row_sch['sch_principal']; ?>. Moreover, the <?php echo $row_sch['sch_name']; ?> is under the type of <?php echo $row_sch['sch_type']; ?>. Furthermore, <?php echo $row_sch['sch_name']; ?> has grades from <?php echo $row_sch['sch_grades']; ?>. Visit here to check more information about the <?php echo $row_sch['sch_name']; ?>.">
    <meta name="keywords" content="<?php echo $row_sch['sch_name']; ?>">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="Welcome to the School Profile of <?php echo $row_sch['sch_name']; ?>">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Welcome to the School Profile of <?php echo $row_sch['sch_name']; ?>. The <?php echo $row_sch['sch_name']; ?> is the school that belongs to Katugastota Education Zone, Sri Lanka. And <?php echo $row_sch['sch_name']; ?> is supervising under the <?php echo $row_sch['sch_div']; ?> division, Sri Lanka.  The name of the current principal is <?php echo $row_sch['principal_title'] . ' ' . $row_sch['sch_principal']; ?>. Moreover, the <?php echo $row_sch['sch_name']; ?> is under the type of <?php echo $row_sch['sch_type']; ?>. Furthermore, <?php echo $row_sch['sch_name']; ?> has grades from <?php echo $row_sch['sch_grades']; ?>. Visit here to check more information about the <?php echo $row_sch['sch_name']; ?>." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="School : <?php echo $row_sch['sch_name']; ?>" />
    <meta name="twitter:card" content="School Profile of <?php echo $row_sch['sch_name']; ?>" />
    <meta name="twitter:description" content="Welcome to the School Profile of <?php echo $row_sch['sch_name']; ?>. The <?php echo $row_sch['sch_name']; ?> is the school that belongs to Katugastota Education Zone, Sri Lanka. And <?php echo $row_sch['sch_name']; ?> is supervising under the <?php echo $row_sch['sch_div']; ?> division, Sri Lanka.  The name of the current principal is <?php echo $row_sch['principal_title'] . ' ' . $row_sch['sch_principal']; ?>. Moreover, the <?php echo $row_sch['sch_name']; ?> is under the type of <?php echo $row_sch['sch_type']; ?>. Furthermore, <?php echo $row_sch['sch_name']; ?> has grades from <?php echo $row_sch['sch_grades']; ?>. Visit here to check more information about the <?php echo $row_sch['sch_name']; ?>." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title><?php echo $row_sch['sch_name']; ?></title>

    <style>
        .gal:hover {
            border: 1em #fff solid;
            transition: .5s ease-out;
            opacity: 0.7;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        div.sticker {
            position: -webkit-sticky;
            position: sticky;
            top: 0;


        }
    </style>

    <?php require_once 'nav.php'; ?>
    <?php

   




        if ($row_sch['sch_name'] == "") {
            header("location:school_list.php?division=all");
        }
    ?>



        <!-- heading-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <br>
        <section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
            <nav aria-label="breadcrumb" style=" padding-left:2%; ">
                <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">

                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/divisionalDetails">Divisions</a></li>
                    <li class="breadcrumb-item"><a href="/schoolList/<?php echo $row_sch['sch_div']; ?>">School list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">School Profile</li>
                </ol>
            </nav>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0"><span style="color:#ffd400;">SCHOOL: </span> <?php echo $row_sch['sch_name']; ?></h2>
                        <hr class="divider divider-light" />
                    </div>
                </div>
            </div>
        </section>

        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-12 col-sm-12">
                        <a class="portfolio-box" href="<?php echo $row_sch['sch_img']; ?>" title="Image of <?php echo $row_sch['sch_name']; ?>">
                            <img class="img-fluid" style="width: 100vw; height:40vh;" src="<?php
                                                                    if ($row_sch['sch_img'] == "") {
                                                                        echo "/default/default_school.png";
                                                                    } else {
                                                                        echo $row_sch['sch_img'];
                                                                    }

                                                                    ?>" alt="Image of <?php echo $row_sch['sch_name']; ?>" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50"><?php echo $row_sch['census_no']; ?>: Cover Image</div>
                                <div class="project-name"><?php echo $row_sch['sch_name']; ?> (Click here to view)</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div id="portfolio">
            <div class="container">
                <div class="row d-flex justify-content">
                    <div class="col-md-4">
                        <div class="card p-5 py-4 bg-primary text-light sticker">
                            <h5 class="mt-2 mb-0">Principal - <?php echo $row_sch['principal_title'] . ' ' . $row_sch['sch_principal']; ?></h5> <i><?php echo $row_sch['sch_name']; ?>, Sri Lanka</i>
                            <br>
                            <div>
                                <p>
                                    <i class="fas fa-fingerprint"></i>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_sch['census_no']; ?><i>(Census no.)</i>
                                </p>
                                <p>
                                    <i class="fas fa-map-marker-alt"></i>
                                    &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_sch['sch_address']; ?>
                                </p>
                                <p>
                                    <i class="fas fa-school"></i>
                                    &nbsp;&nbsp;&nbsp;<?php echo $row_sch['sch_div']; ?> Division
                                </p>
                                <p>
                                    <i class="fas fa-user-friends"></i>

                                    &nbsp;&nbsp;&nbsp;<?php echo $row_sch['sch_grades']; ?><i>(Available grades)</i>
                                </p>

                                <p>
                                    <i class="fab fa-typo3"></i>

                                    &nbsp;&nbsp;&nbsp;<?php echo $row_sch['sch_type']; ?> <i>(School Type)</i>
                                </p>
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    <?php echo $row_sch['sch_email']; ?>
                                </p>

                                <p><i class="fas fa-phone me-3"></i> <?php echo $row_sch['sch_tel']; ?></p>
                            </div>

                            <div style="text-align:right;">
                                <a href="mailto:<?php echo $row_sch['sch_email']; ?>" class="btn btn-light btn-xl ">Message</a>

                            </div>

                        </div>
                    </div>


                    <div class="col-md-8">
                        <div class="card p-5 py-4 bg-primary text-light">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <div class="card text-dark" style="background-color: #ffd400;">
                                        <br>
                                        <span class="mb-2">Total No. of Teachers</span>
                                        <h1 class="mb-0"><?php echo $row_sch['sin_tea'] + $row_sch['tam_tea'] + $row_sch['eng_tea']; ?></h1>
                                        <br>
                                    </div>

                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4" style="text-align: center;">
                                    <div class="card text-dark bg-light">
                                        <br>
                                        <span class="mb-2">Total No. of Sinhala Medium Teachers</span>
                                        <h1 class="mb-0"><?php echo $row_sch['sin_tea']; ?></h1>
                                        <br>
                                    </div>

                                </div>

                                <div class="col-md-4" style="text-align: center;">
                                    <div class="card text-dark bg-light">
                                        <br>
                                        <span class="mb-2">Total No. of Tamil Medium Teachers</span>
                                        <h1 class="mb-0"><?php echo $row_sch['tam_tea']; ?></h1>
                                        <br>
                                    </div>
                                </div>

                                <div class="col-md-4" style="text-align: center;">
                                    <div class="card text-dark bg-light">
                                        <br>
                                        <span class="mb-2">Total No. of English Medium Teachers</span>
                                        <h1 class="mb-0"><?php echo $row_sch['eng_tea']; ?></h1>
                                        <br>
                                    </div>
                                </div>

                            </div>
                            <br><br>

                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <div class="card text-dark" style="background-color: #ffd400;">
                                        <br>
                                        <span class="mb-2">Total No. of Students</span>
                                        <h1 class="mb-0"><?php echo $row_sch['sin_st'] + $row_sch['tam_st'] + $row_sch['eng_st']; ?></h1>
                                        <br>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4" style="text-align: center;">
                                    <div class="card text-dark bg-light">
                                        <br>
                                        <span class="mb-2">Total No. of Sinhala Medium Students</span>
                                        <h1 class="mb-0"><?php echo $row_sch['sin_st']; ?></h1>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4" style="text-align: center;">
                                    <div class="card text-dark bg-light">
                                        <br>
                                        <span class="mb-2">Total No. of Tamil Medium Students</span>
                                        <h1 class="mb-0"><?php echo $row_sch['tam_st']; ?></h1>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-4" style="text-align: center;">
                                    <div class="card text-dark bg-light">
                                        <br>
                                        <span class="mb-2">Total No. of English Medium Teachers</span>
                                        <h1 class="mb-0"><?php echo $row_sch['eng_st']; ?></h1>
                                        <br>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <br>
                        <?php
                        $sql = "SELECT * FROM evaluation,school WHERE evaluation.sch_name = school.sch_name and school.census_no= $census_no;";
                        $result = $mysqli->query($sql) or header("location:".$query_err_page);
                        $row = $result->fetch_array();
                        include "graph_module_schprof.php";
                        ?>



                    </div>


                </div>
            </div>
        </div>

        <!-- Footer-->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
        <?php require_once 'main-footer.php'; ?>
        </body>

</html>
<?php } else {
        header("location:school_list.php?division=all");
    } ?>