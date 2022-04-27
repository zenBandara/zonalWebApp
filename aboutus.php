<?php 
include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation.">
    <meta name="keywords" content="About Zonal,About Zonal Education Office Katugastota, Aboutus, about katugastota, about katu zone, about sri lankan zones">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="About-us : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="About-us : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. " />
    <meta name="twitter:description" content="The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>About-Us</title>

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
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php require_once 'nav.php'; ?>

    <!-- heading-->

    <section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
        <nav aria-label="breadcrumb" style=" padding-left:2%; ">
            <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0"><span style="color:#ffd400;">ABOUT</span> US</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services-->
    <?php
    $resultU = $mysqli->query("SELECT * FROM zone_dir") or header("location:".$query_err_page);
    $row = $resultU->fetch_array();
    ?>
    <br>
    <div id="portfolio">
        <div class="container">
            <div class="row d-flex justify-content">
                <div class="col-md-5">
                    <div class="card p-3 py-4 bg-primary text-light">
                        <div class="center"> <img src="<?php echo $row['img_path']; ?>" style="width: 200px; height:200px;" class="rounded-circle"> </div>
                        <div class="text-center mt-3">
                            <?php
                            if ($row['ava'] == 'Available') : ?>
                                <span class="bg-success p-1 px-4 rounded text-white"><?php echo $row['ava']; ?></span>
                            <?php elseif ($row['ava'] == 'Not Available') : ?>
                                <span class="bg-danger p-1 px-4 rounded text-white"><?php echo $row['ava']; ?></span>
                            <?php elseif ($row['ava'] == 'On Study Leave') : ?>
                                <span class="bg-warning p-1 px-4 rounded text-white"><?php echo $row['ava']; ?></span>
                            <?php elseif ($row['ava'] == 'On Maternity Leave') : ?>
                                <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $row['ava']; ?></span>
                            <?php elseif ($row['ava'] == 'On Personal Leave') : ?>
                                <span class="bg-default p-1 px-4 rounded text-white"><?php echo $row['ava']; ?></span>

                            <?php endif; ?>
                            <h5 class="mt-2 mb-0"><?php echo $row['title'] . $row['name']; ?></h5> <i>Zonal Director - Katugastota, Sri Lanka</i><br>
                            <i>| Grade - <?php echo $row['grade']; ?></i><br>
                            <i>| <b>Address for Letters</b>- <?php echo $row['address']; ?></i>
                            <div class="px-4 mt-1" style="color: rgba(255, 255, 255, 0.75);">
                                <blockquote class="blockquote">
                                    <p class="fonts">"<?php echo $row['dir_word']; ?>"</p>
                                </blockquote>

                            </div>
                            <br>
                            <div class="px-4 mt-1" style="color: rgba(255, 255, 255, 0.75);">
                                <p class="fonts" style="text-align: justify;"><?php echo $row['descrip']; ?></p>
                            </div>
                            <div>
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    <?php echo $row['email']; ?>
                                </p>
                                <p><i class="fas fa-phone me-3"></i> <?php echo $row['tel']; ?></p>
                            </div>

                            <div> <a href="mailto:<?php echo $row['email']; ?>" class="btn btn-light btn-xl">Message</a> </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <br>

                    <img src="/assets/img/aboutus.jpg" style="width: 74%; margin-left:auto; margin-right:auto; border-radius:0.5em;" alt="Image of Zonal Education Office, Katugastota">

                    <br>
                    <?php
                    $result_vision = $mysqli->query("SELECT * FROM contacts WHERE name = 'vision'")  or header("location:".$query_err_page);
                    $row_vision = $result_vision->fetch_array();
                    $vision = $row_vision['content'];

                    $result_mission = $mysqli->query("SELECT * FROM contacts WHERE name = 'mission'")  or header("location:".$query_err_page);
                    $row_mission = $result_mission->fetch_array();
                    $mission = $row_mission['content'];
                    ?>
                    <div class="card clean-card text-center">
                        <div class="card-body info">
                            <h4 class="card-title text-primary text-uppercase"><strong>Vision</strong><br></h4>
                            <p class="card-text"><?php echo $vision; ?><br><br></p>
                        </div>
                    </div>
                    <br>
                    <div class="card clean-card text-center">
                        <div class="card-body info">
                            <h4 class="card-title text-primary text-uppercase"><strong>Mission</strong><br></h4>
                            <p class="card-text"><?php echo $mission; ?><br><br></p>
                        </div>
                    </div>
                    <br>

                    <h6 class="text-uppercase fw-bold mb-4 text-primary">
                        Related Webpages
                    </h6>
                    <ul class="list-group" style="width: 40%;">
                        <li class="list-group-item"><a href="/zonalStaff"><i class="fas fa-arrow-right"></i> &nbsp; OUR STAFF</a></li>
                        <li class="list-group-item"><a href="/divisionalDetails"><i class="fas fa-arrow-right"></i>&nbsp; OUR DIVISIONS</a></li>

                    </ul>
                </div>

                <br>

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
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <?php require_once 'main-footer.php'; ?>
    </body>

</html>