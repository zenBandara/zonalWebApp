<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation.">
    <meta name="keywords" content="Telephone Number,Zonal Katugastota Contact Number, Contactus, Zonal Phone Numbers, Zonal Numbers, Contact Zonal,Katugastota Zone Phone Number, contact info, call katugastota zonal">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="Contact-us : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Contact-us : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find zonal contacts here." />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>Contact-Us</title>

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

<?php require_once 'nav.php'; ?>

<!-- heading-->
<section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
    <nav aria-label="breadcrumb" style=" padding-left:2%; ">
        <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact-us</li>
        </ol>
    </nav>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"><span style="color:#ffd400;">CONTACT</span> US</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4">Send us a messages and we will get back to you as soon as possible!</p>

            </div>
        </div>
    </div>
</section>

<!-- Services-->
<?php

$result = $mysqli->query("SELECT * FROM contacts WHERE name='email'") or header("location:".$query_err_page);
$row_email = $result->fetch_assoc();
?>

<div class="container">

    <div class="container ">
        <div class="row page-section">
            <div class="col-lg-8 jumbotron">

                <section>
                    <form id="contactForm" action="mailto:<?= $row_email['content']; ?>" method="POST" enctype="multipart/form-data">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." required />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" required />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" required />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Submit</button></div>
                    </form>

                </section>
                <br><br>

                <h6 class="text-uppercase fw-bold mb-4 text-primary">
                    Related Webpages
                </h6>
                <ul class="list-group" style="width: 40%;">
                    <li class="list-group-item"><a href="/zonalStaff"><i class="fas fa-arrow-right"></i> &nbsp; OUR STAFF</a></li>
                    <li class="list-group-item"><a href="/divisionalDetails"><i class="fas fa-arrow-right"></i>&nbsp; OUR DIVISIONS</a></li>

                </ul>

            </div>
            <br>

            <div class="col-lg-4"><br>
                <h6 class="text-uppercase fw-bold mb-4 text-primary">
                    Contact Info.
                </h6>
                <ul class="list-group">

                    <?php
                    $result = $mysqli->query("SELECT * FROM contacts WHERE name='address'")  or header("location:".$query_err_page);
                    $row_addr = $result->fetch_assoc();
                    ?>
                    <li class="list-group-item"><i class="fas fa-home me-3"></i> <?= $row_addr['content']; ?></li>

                    <li class="list-group-item">
                        <i class="fas fa-envelope me-3"></i>
                        <?= $row_email['content']; ?>
                    </li>
                    <?php
                    $result = $mysqli->query("SELECT * FROM contacts WHERE name='pno'") or header("location:".$query_err_page);
                    $row_pno = $result->fetch_assoc();
                    ?>
                    <li class="list-group-item"><i class="fas fa-phone me-3"></i> <?= $row_pno['content']; ?></li>
                    <?php
                    $result = $mysqli->query("SELECT * FROM contacts WHERE name='fax'") or header("location:".$query_err_page);
                    $row_fax = $result->fetch_assoc();
                    ?>
                    <li class="list-group-item"><i class="fas fa-fax me-3"></i><?= $row_fax['content']; ?></li>
                    <li class="list-group-item"><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $g_maps_key; ?>&amp;q=<?= $row_addr['content']; ?>&amp;zoom=11" width="100%" height="400"></iframe></li>

                </ul>
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
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<?php require_once 'main-footer.php'; ?>
</body>

</html>