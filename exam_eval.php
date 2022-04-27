
<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_GET['division'])) {
    $division = $_GET['division'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="This is the examination evaluation of <?php echo $division; ?> divisional. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
    <meta name="keywords" content="<?php echo $division; ?> evaluation,<?php echo $division; ?> divisional examination analytics, <?php echo $division; ?> evaluation katugastota zone">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="<?php echo $division; ?> Divisional Examination Evaluation - Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="You can find the zonal <?php echo $division; ?> divisional examination evaluation here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="<?php echo $division; ?> Divisional Examination Evaluation - Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find the zonal <?php echo $division; ?> divisional examination evaluation here. " />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title><?php echo $division; ?> Divisional Examination Evaluation</title>
<?php require_once 'nav.php'; ?>
<!-- heading-->

<?php

$staff_id = '';
$staff_name = '';
$staff_grade = '';
$staff_email = '';
$staff_contact = '';
$staff_role = '';
$staff_img = '';
$staff_ava = '';
$staff_title = '';

?>
<br>
<section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
    <nav aria-label="breadcrumb" style=" padding-left:2%; ">
        <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/divisionalDetails">Divisions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Exam Evaluation</li>
        </ol>
    </nav>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"><span style="color:#ffd400;">EXAM</span> EVALUTION - <span style="color:#ffd400; text-transform:uppercase;"><?php echo $_GET['division']; ?></span> DIVISION<?php $suf = $_GET['division'] == 'all' ? 'S (WHOLE ZONE)': ''; echo $suf;?></h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4"></p>

            </div>
        </div>
    </div>
    <?php 
    $div_name = $_GET['division'];
    ?>
</section>
<div class="container">
    <?php include "graph_module.php"; ?>
</div>


<!-- Footer-->
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<?php require_once 'main-footer.php'; ?>
</body>

<?php } ?>

</html>