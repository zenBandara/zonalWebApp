
<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    if ($_GET['category']==""){
        header("location:image_gallery.php");
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="This is the image category of <?php echo $category; ?>. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
    <meta name="keywords" content="<?php echo $category; ?>, Zonal Image gallery, Image gallery, zonal Image categories, Image category, Katugastota zonal Images">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="<?php echo $category; ?> (Images) - Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="You can find the zonal <?php echo $category; ?>  (Images) here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="<?php echo $category; ?> (Images) - Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find the zonal <?php echo $category; ?>  (Images) here." />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title><?php echo $category; ?> (Images)</title>
<?php require_once 'nav.php'; ?>

<!-- heading-->

    <section class="page-section bg-primary" id="Academic_heading" style="max-height: 17em; padding-top:6em;">
        <nav aria-label="breadcrumb" style=" padding-left:2%; ">
            <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/imageGallery">Image Gallery</a></li>
                <li class="breadcrumb-item active notranslate" aria-current="page"><?php echo $category ?> </li>
            </ol>
        </nav>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0" style=" text-transform: uppercase;"><span style="color:#ffd400;">CATEGORY:</span> <span class="notranslate"><?php echo $category ?></span></h2>
                    <hr class="divider divider-light" />

                </div>
            </div>
        </div>
    </section>

    <!-- Services-->

    <div id="portfolio">
        <div class="container-fluid p-0 notranslate">
            <div class="row g-0">
                <?php
                $result = $mysqli->query("SELECT * from img_gallery WHERE category = '$category'") or header("location:".$query_err_page);
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



<?php }else{
    header("location:image_gallery.php");
} ?>
<!-- Footer-->
<?php require_once 'main-footer.php'; ?>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="/js/scripts.js"></script>

</body>

</html>