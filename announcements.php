<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation.">
    <meta name="keywords" content="Zonal announcements, announcements, quick messages, Katugastota zonal announcements">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="Announcements : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Announcements : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find zonal announcements here." />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>Zonal Announcements</title>
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

    .boxLeg{
        margin-left: 5px;
        width: 8px;
        height: 8px;
        display: inline;
        padding: 5px;
    }
</style>
<?php require_once 'nav.php'; ?>

<!-- heading-->
<section class="page-section bg-primary" id="Academic_heading" style="max-height:23em; padding-top:6em;">
    <nav aria-label="breadcrumb" style=" padding-left:2%; ">
        <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Announcements</li>
        </ol>
    </nav>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"><span style="color:#ffd400;">ORGANIZATIONAL</span> ANNOUNCEMENTS</h2>
                <hr class="divider divider-light" />
                <i class="text-white-75 mb-4"><b>*Note</b> : Use following color codes to identify the criticalness of the announcements.</i><br><br>
            <div>
                <div class="boxLeg bg-danger"><i class="text-white">Critical</i> </div> 
                <div class="boxLeg bg-warning"><i class="text-white">Major</i> </div> 
                <div class="boxLeg bg-success"><i class="text-white">Minor</i> </div> 
            </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Services-->

<div>
    <div class="container notranslate" style="margin-top: 2%;">
        
            <?php
            $result = $mysqli->query("SELECT * from announcement") or header("location:".$query_err_page);
            ?>
            <div class="row">


                <?php while ($row = $result->fetch_assoc()) {



                ?>
                    <div class="col-lg-4">
                        <div id = "an<?php echo $row['id'];?>" class="card text-white bg-<?php
                                                        if ($row['a_level'] == 'Critical') {
                                                            echo 'danger';
                                                        } elseif ($row['a_level'] == 'Major') {
                                                            echo 'warning';
                                                        } elseif ($row['a_level'] == 'Minor') {
                                                            echo 'success';
                                                        }

                                                        ?> mb-3">
                            <i class="card-header text-white-75"><i class="fas fa-clock"></i> <?php echo $row['a_date']; ?></i>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['a_title']; ?></h5>
                                <p class="card-text"><?php echo $row['a_body']; ?></p>
                            </div>
                        </div>
                    </div>

                <?php } ?>

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