<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="You can find the local and global Covid-19 statistics here. The COVID-19 data that is showing on this page is based on the API documentation of
Health Promotion Bureau, Sri Lanka. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation.">
    <meta name="keywords" content="COVID-19, covid, Statistics">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="COVID-19 Statistics : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="You can find the local and global Covid-19 statistics here.The COVID-19 data that is showing on this page is based on the API documentation of
Health Promotion Bureau, Sri Lanka. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="COVID-19 Statistics : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find the zonal events here." />
    <meta name="twitter:description" content="You can find the local and global Covid-19 statistics here.The COVID-19 data that is showing on this page is based on the API documentation of
Health Promotion Bureau, Sri Lanka. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>COVID-19 Statistics</title>

    
    <?php require_once 'nav.php'; ?>

    <!-- heading-->

    <section class="page-section bg-primary" id="Academic_heading" style="max-height: 24em; padding-top:6em;">
        <nav aria-label="breadcrumb" style=" padding-left:2%; ">
            <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Global and Local Covid-19 Statistics</li>
            </ol>
        </nav>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0"><span style="color:#ffd400;">COVID-19</span> STATISTICS</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">The COVID-19 data that is showing on this page is based on the API
                        documentation of<br><a href="https://www.hpb.health.gov.lk/en/api-documentation">Health
                            Promotion Bureau, Sri Lanka</a><br>
                            <i id="udate">Last Update - </i></p>

                </div>
            </div>
        </div>
    </section>

    <section class="page-section bg-light" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 text-center">
                    <div class="card bg-light mb-3">
                        <div class="card-header">Global Deaths</div>
                        <div class="card-body">
                            <h5 class="card-title"><h1 class="text-muted mb-0" id="global"></h1></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="card bg-light mb-3">
                        <div class="card-header">Local Deaths</div>
                        <div class="card-body">
                            <h5 class="card-title"><h1 class="text-muted mb-0" id="locview" style="text-align: center;"></h1></h5>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 text-center">
                    <div class="card bg-light mb-3">
                        <div class="card-header">Global Total COVID Cases</div>
                        <div class="card-body">
                            <h5 class="card-title"><h1 class="text-muted mb-0" id="globaltc"></h1></h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 text-center">
                    <div class="card bg-light mb-3" >
                        <div class="card-header">Local Recovered</div>
                        <div class="card-body">
                            <h5 class="card-title"><h1 class="text-muted mb-0" id="recoverdview"></h1></h5>
                        </div>
                    </div>

                </div>
            </div>
            <br><br><br>
            <div class="row justify-content-center">
                <div class="col-lg-3 text-center">
                    <div class="card bg-light mb-3" >
                        <div class="card-header">Local Active Cases</div>
                        <div class="card-body">
                            <h5 class="card-title"><h1 class="text-muted mb-0" id="activecasesview"></h1></h5>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 text-center">

                
                    <div class="card bg-light mb-3" >
                        <div class="card-header">Local Total Number of Individuals (COVID Patients) in The Hospitals</div>
                        <div class="card-body">
                            <h5 class="card-title"><h1 class="text-muted mb-0" id="totnohos"></h1></h5>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3  text-center">
                    <div class="card bg-light mb-3" >
                        <div class="card-header">Total PCR Testing Count (Local)</div>
                        <div class="card-body">
                            <h5 class="card-title"><h1 class="text-muted mb-0" id="totpcr"></h1></h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Footer-->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/covid.js"></script>
    <?php require_once 'main-footer.php'; ?>
    </body>

</html>