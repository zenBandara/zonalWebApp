<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="You can find the zonal FAQs here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation.">
    <meta name="keywords" content="Zonal FAQs, FAQs,Katugastota Zonal FAQs">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="Zonal FAQs : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="You can find the zonal FAQs here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Zonal FAQs : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find the zonal FAQs here." />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>Zonal FAQs</title>
<link rel="stylesheet" href="/assets/css/style.css">
    <?php require_once 'nav.php'; ?>
    
    <style>
        li{text-decoration: none;}
    </style>
<script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>

<section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
    <nav aria-label="breadcrumb" style=" padding-left:2%; ">
        <ol class="breadcrumb" style="background-color: #ffd400; width: 8em; padding-left:1em; border-radius:0.5em;">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
        </ol>
    </nav>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"><span style="color:#ffd400;">FREQUENTLY ASKED</span> QUESTIONS</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4">Please choose your prefered category from bellow!</p>

            </div>
        </div>
    </div>
</section>
    <?php
    $result = $mysqli->query("SELECT DISTINCT cat from faq") or header("location:".$query_err_page);
    ?>

    <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg" >
        <ul class="cd-faq__categories" style="margin-top:2em; margin-left:0; padding:1em; width:15rem; border-radius:1em;">
            <a style="font-weight: bold; color:#661414;">CATEGORIES</a>
            <br>
            <br>
           
            <?php while ($row = $result->fetch_assoc()) : ?>
                <li><a class="cd-faq__category truncate" style="border-radius:1.3em;font-size:0.8em;" href="#<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></a></li>
            <?php endwhile; ?>
        </ul> <!-- cd-faq__categories -->

        <?php $res_q = $mysqli->query("SELECT DISTINCT cat from faq") or header("location:".$query_err_page); ?>
        <div class="cd-faq__items">

            <?php while ($row = $res_q->fetch_assoc()) { ?>
                <ul id="<?php echo $row['cat']; ?>" class="cd-faq__group">


                    <li class="cd-faq__title">
                        <h2><?php echo $row['cat']; ?></h2>
                    </li>

                    <?php 
                    $qu = "SELECT * from faq WHERE cat='".$row['cat']."';";
                    $res_body = $mysqli->query($qu) or header("location:".$query_err_page); ?>
                    <?php while ($row_body = $res_body->fetch_assoc()) {?>
                        <li style="border-radius:2em;" class="cd-faq__item">
                            <a class="cd-faq__trigger" href="#0"><span><?php echo $row_body['question'];?></span></a>
                            <div class="cd-faq__content">
                                <div class="text-component">
                                    <p><?php echo $row_body['answer'];?></p>
                                </div>
                            </div> <!-- cd-faq__content -->
                        </li>
                    <?php } ?>
                
                </ul> <!-- cd-faq__group -->
                <?php }?>

        </div> <!-- cd-faq__items -->

        <a href="#0" class="cd-faq__close-panel text-replace">Close</a>

        <div class="cd-faq__overlay" aria-hidden="true"></div>
    </section> <!-- cd-faq -->
    <script src="/assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="/assets/js/main.js"></script>
    <?php require_once 'main-footer.php'; ?>
</body>

</html>