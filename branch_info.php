<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
    <meta name="keywords" content="Zonal Katugastota Branches, Zonal Departments, Our Branches, Branches, Branch staff, Staff">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="Our Branches : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Our Branches : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find the zonal branches here - Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch. " />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>Our Branches</title>
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
 


    @media only screen and (min-width: 790px) {
        .divider-right-ss {
            border-right: 2px solid #fff;
        }
    }
</style>
<?php require_once 'nav.php'; ?>

<!-- heading-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;padding-bottom:17em;">
    <nav aria-label="breadcrumb" style=" padding-left:2%; ">
        <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/zonalStaff">Staff</a></li>
            <li class="breadcrumb-item active" aria-current="page">Non-academic Staff</li>
        </ol>
    </nav>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"><span style="color:#ffd400;">OUR</span> BRANCHES</h2>
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
<div>
    <div class="container">
        <?php
        $branches = array("planning", "development", "finance", "establishment", "administration");
        foreach ($branches as $branch) {

        ?>
            <div id="<?=$branch?>" class="row d-flex justify-content">
                <div class="col-md-12">
                    <div class="card p-3 py-4 text-light bg-primary">
                        <div class="text-center">
                            <h3 class="text-white mt-0" style="text-transform:capitalize;"><span style="color:#ffd400; text-transform:capitalize"><?= strtoupper($branch); ?></span> BRANCH</h3>
                            <hr class="divider divider-light" />
                        </div>
                        <?php 
                        $result_dhead = $mysqli->query("SELECT * FROM `nonac_staff` WHERE branch_head = '$branch' ") or header("location:".$query_err_page);
                        $result_description = $mysqli->query("SELECT * FROM `branch_description` WHERE branch_name = '$branch' ")  or header("location:".$query_err_page);
                        $result_function = $mysqli->query("SELECT * FROM `branch_function` WHERE branch_name = '$branch' ") or header("location:".$query_err_page);
                        $row_head = $result_dhead->fetch_array();
                        $row_desc = $result_description->fetch_array();
                        //$row_fuc = $result_function->fetch_array();
                        ?>
                        <div class="text-center">
                            <div class="px-4 mt-1" style="color: rgba(255, 255, 255, 0.75);border:1px solid #fff; padding:1em; border-radius:10px;margin:0.6em;">
                                <p class="fonts" style="text-align: justify;"><?php echo $row_desc['description'];?></p>
                            </div>
                            <br><br>
                        </div>
                        <div class="row">
                            <div class="col-md-4 divider-right-ss">
                                <div class="center"> <img src="<?php echo $row_head['staff_img']; ?>" style="width: 12rem; height:12rem; border-radius:50%"> </div>
                                <div class="text-center mt-3">
                                    <?php
                                    if ($row_head['staff_ava'] == 'Available') : ?>
                                        <span class="bg-success p-1 px-4 rounded text-white"><?php echo $row_head['staff_ava']; ?></span>
                                    <?php elseif ($row_head['staff_ava'] == 'Not Available') : ?>
                                        <span class="bg-danger p-1 px-4 rounded text-white"><?php echo $row_head['staff_ava']; ?></span>
                                    <?php elseif ($row_head['staff_ava'] == 'On Study Leave') : ?>
                                        <span class="bg-warning p-1 px-4 rounded text-white"><?php echo $row_head['staff_ava']; ?></span>
                                    <?php elseif ($row_head['staff_ava'] == 'On Maternity Leave') : ?>
                                        <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $row_head['staff_ava']; ?></span>
                                    <?php elseif ($row_head['staff_ava'] == 'On Personal Leave') : ?>
                                        <span class="bg-default p-1 px-4 rounded text-white"><?php echo $row_head['staff_ava']; ?></span>

                                    <?php endif; ?>
                                    <h5 class="mt-2 mb-0"><?php echo $row_head['staff_title'] . $row_head['staff_name']; ?></h5> <i>Head of the <?php echo $branch;?> branch - Zonal Education Office, Katugastota, Sri Lanka</i>
                                    <br><i>Grade -  <?php echo $row_head['staff_grade'];?></i>

                                    <br>
                                    <div class="px-4 mt-1" style="color: rgba(255, 255, 255, 0.75);">
                                        <p class="fonts" style="text-align: justify;"><?php echo $row_head['staff_des']; ?></p>
                                    </div>
                                    <div>
                                        <p>
                                            <i class="fas fa-envelope me-3"></i>
                                            <?php echo $row_head['staff_email']; ?>
                                        </p>
                                        <p><i class="fas fa-phone me-3"></i> <?php echo $row_head['staff_contact']; ?></p>
                                    </div>

                                    <div> <a href="mailto:<?php echo $row_head['staff_email']; ?>" class="btn btn-light btn-xl">Message</a> </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <br>
                                <h4 class="">Functions</h4>
                                <?php
                                while($row = $result_function->fetch_assoc()){

                                    ?>
                                <div class="bg-secondary text-white" style="padding:1em; border-radius:10px;margin:0.5em;"><?php echo $row['function']; ?></div>
                                <?php } ?>
                                <br>
                                <div class="text-center"> <a href="/staffCategory/branch/<?=$branch?>" class="btn btn-light btn-xl">See our <?=$branch?> staff</a> </div>

                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <br>
        <?php } ?>
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