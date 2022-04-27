
<!-- Footer -->
<div  style="background-color: #ffd400; height:1em; border-radius:10em 10em 0 0; ">&nbsp;</div>
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

            $social_result = $conn->prepare("SELECT * FROM contacts WHERE name='facebook' OR name='linkedin' OR name='youtube' OR name='twitter' ");
            $social_result->execute();
            $social_media = $social_result->fetchAll();

            foreach ($social_media as $sm) {
            ?>

                <a href="<?= $sm['content']; ?>" class="me-4 text-reset">
                    <i class="fab fa-<?php echo $sm['name']; ?>"></i>
                </a>

            <?php } ?>

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
                    <div id="google_translate_element"></div>


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
                    $latest_news = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT 4");
                    $latest_news->execute();
                    $latest_news_article = $latest_news->fetchAll();

                    ?>
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        LATEST NEWS
                    </h6>
                    <?php foreach ($latest_news_article as $row) { ?>
                        <div class="notranslate">
                            <a style="color:#f4623a; text-decoration:none" href="/news/<?= $row['article_id'] ?>"><?= $row['article_title'] ?></a><br><br>
                        </div>
                    <?php } ?>

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
                    $foot_contacts = $conn->prepare("SELECT * FROM contacts WHERE name='address' OR name='email' OR name='pno' OR name='fax'");
                    $foot_contacts->execute();
                    $foot_c = $foot_contacts->fetchAll();

                    $icon_arr = ['home', 'phone', 'fax', 'envelope'];
                    $i = 0;
                    foreach ($foot_c as $fc) {

                    ?>
                        <p><i class="fas fa-<?= $icon_arr[$i]; ?> me-3"></i> <?= $fc['content']; ?></p>
                    <?php
                        $i++;
                    } ?>

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
        <a class="text-reset fw-bold" href="index.php">Zonal Education Office, Katugastota, Sri Lanka</a>
    </div>
    <!-- Copyright -->
</footer>
</div>
<!-- Footer -->
<script>
    //Get the button
    var mybutton = document.getElementById("topBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
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

