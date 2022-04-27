<!-- Footer -->
<br><br>
<div  style="background-color: #ffd400; height:1em; border-radius:10em 10em 0 0; "></div>
<div style="background-color: #ffd400;">
<footer class="text-center text-lg-start bg-primary " style="color: #c7c7c7; border-radius:2em 2em 0 0 ;">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom ">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <?php

            $result = $mysqli->query("SELECT * FROM contacts WHERE name='facebook'")  or header("location:".$query_err_page);
            $row = $result->fetch_assoc();
            ?>
            <a href="<?= $row['content']; ?>" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <?php
            $result = $mysqli->query("SELECT * FROM contacts WHERE name='twitter'")  or header("location:".$query_err_page);
            $row = $result->fetch_assoc();
            ?>
            <a href="<?= $row['content']; ?>" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <?php
            $result = $mysqli->query("SELECT * FROM contacts WHERE name='linkedin'")  or header("location:".$query_err_page);
            $row = $result->fetch_assoc();
            ?>

            <a href="<?= $row['content']; ?>" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <?php
            $result = $mysqli->query("SELECT * FROM contacts WHERE name='youtube'") or header("location:".$query_err_page);
            $row = $result->fetch_assoc();
            ?>

            <a href="<?= $row['content']; ?>" class="me-4 text-reset">
                <i class="fab fa-youtube"></i>
            </a>

        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Zonal Education Office, Katugastota, Sri Lanka
                    </h6>
                    <p>
                        Education towards full-fledged knowledge society.
                    </p>
                    <div style="width:20rem;" id="google_translate_element"></div>


                    <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({
                                pageLanguage: 'en',
                                includedLanguages: 'en,si,ta',
                            }, 'google_translate_element');
                        }
                    </script>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <?php
                    // Get Latest articles


                    $result = $mysqli->query("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT 4") or header("location:".$query_err_page);

                    ?>
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        LATEST NEWS
                    </h6>
                    <div class="notranslate">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <p>
                                <a href="/news/<?= $row['article_id'] ?>"><?= $row['article_title'] ?></a>
                            </p>
                        <?php } ?>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="/zonalEvents" class="text-reset">Events</a>
                    </p>
                    <p>
                        <a href="/zonalNotices" class="text-reset">Notices</a>
                    </p>
                    <p>
                        <a href="/news/newsHome" class="text-reset">News</a>
                    </p>
                    <p>
                        <a href="/Zonalfaq" class="text-reset">FAQs</a>
                    </p>
                    <p>
                        <a href="/COVID19" class="text-reset">COVID-19 Statistics</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                    </h6>
                    <?php
                    $result = $mysqli->query("SELECT * FROM contacts WHERE name='address'") or header("location:".$query_err_page);
                    $row = $result->fetch_assoc();
                    ?>
                    <p><i class="fas fa-home me-3"></i> <?= $row['content']; ?></p>
                    <?php
                    $result = $mysqli->query("SELECT * FROM contacts WHERE name='email'") or header("location:".$query_err_page);
                    $row = $result->fetch_assoc();
                    ?>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        <?= $row['content']; ?>
                    </p>
                    <?php
                    $result = $mysqli->query("SELECT * FROM contacts WHERE name='pno'") or header("location:".$query_err_page);
                    $row = $result->fetch_assoc();
                    ?>
                    <p><i class="fas fa-phone me-3"></i> <?= $row['content']; ?></p>
                    <?php
                    $result = $mysqli->query("SELECT * FROM contacts WHERE name='fax'") or header("location:".$query_err_page);
                    $row = $result->fetch_assoc();
                    ?>
                    <p><i class="fas fa-fax me-3"></i><?= $row['content']; ?></p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="home">Zonal Education Office, Katugastota, Sri Lanka</a>
    </div>
    <!-- Copyright -->
</footer>
</div>
<!-- Footer -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $g_analytics_key;?>"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', '<?php echo $g_analytics_key;?>');
</script>

<script>
    //Get the button
    var mybutton = document.getElementById("topBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<?php
$mysqli->close();
?>