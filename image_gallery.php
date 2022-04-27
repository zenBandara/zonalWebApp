<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="You can find the zonal images here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
    <meta name="keywords" content="Zonal images, images, katugastota zonal images, katugastota images">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="Image Gallery : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="You can find the zonal images here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Image Gallery : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find the zonal images here." />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>Image Gallery</title>
<?php require_once 'nav.php'; ?>

<!-- heading-->

<section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
    <nav aria-label="breadcrumb" style=" padding-left:2%; ">
        <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Image Gallery</li>
        </ol>
    </nav>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"><span style="color:#ffd400;">IMAGE</span> GALLERY</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4">Please choose your prefered category from bellow!</p>

            </div>
        </div>
    </div>
</section>

<!-- Services-->

<div id="portfolio">
    <div class="container notranslate">
        <div class="row g-0" style="margin-top: 2em;">
            <?php
            $result = $mysqli->query("SELECT * from res_category WHERE section = 'Image gallery'") or header("location:".$query_err_page);
            ?>
            <?php while ($row = $result->fetch_assoc()) { 
                    $path_img  ='';
                    $category_name = $row['res_cat'];
            
                    $r_name = $mysqli->query("SELECT * from img_gallery WHERE category = '$category_name' order by RAND() LIMIT 1") or header("location:".$query_err_page);
                    while ($row_path = $r_name->fetch_assoc()) { 
                        $path_img = $row_path['img_path'] ;
                        
                    ?>
                    <?php } ?>
                <div class="col-lg-4 col-sm-6 gal">
                    <a href="/imageCategory/<?php echo $category_name ?>">
                        
                        <div class="card" style="width: 18rem; border:2px #fff solid; width:100%; background-color:#661414; border-radius:2em;">
                            <img class="card-img-top" style="height: 12rem;" src="<?php echo $path_img;?>" alt="Card image cap">
                            <div class="card-body" style="text-align: center; color:#fff;">
                                <p class="card-text" style="font-size:1.2em;"><?php echo $row['res_cat']; ?></p>
                                
                            </div>
                        </div>
                    </a>

                </div>
                
            <?php } ?>


        </div>
    </div>
</div>


<!-- Footer-->
<?php require_once 'main-footer.php'; ?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>