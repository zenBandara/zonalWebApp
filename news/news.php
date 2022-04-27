<!-- Include Head -->
<?php
include "assest/head.php";
include_once('../config_mains/main.php'); ?>
<?php

// Get Latest articles
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT 9");
$stmt->execute();
$articles = $stmt->fetchAll();

// Get Categories
$stmt = $conn->prepare("SELECT *,COUNT(*) as article_count FROM `article` INNER JOIN category ON id_categorie=category_id GROUP BY id_categorie");
$stmt->execute();
$categories = $stmt->fetchAll();

// Get Most Read Articles
$stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id order by RAND() LIMIT 4");
$stmt->execute();
$most_read_articles = $stmt->fetchAll();

?>

<!-- Google font -->
<!-- <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> -->

<!-- Custom CSS -->
<!-- <link href="css/home.css" rel="stylesheet"> -->


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Zonal Education Office - Katugastota">
<meta name="description" content="You can find the Zonal News here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
<meta name="keywords" content="Zonal News, News, resources, Katugastota Zonal News">
<meta name="robots" content="index, follow">

<!-- Open graph data -->
<meta name="og:title" property="og:title" content="Zonal News : Zonal Education Office, Katugastota, Sri Lanka">
<meta property="og:url" content="<?php echo $domain_name; ?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="You can find the Zonal News here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
<meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

<!-- Twitter Cards -->
<meta name="twitter:title" content="Zonal News : Zonal Education Office, Katugastota, Sri Lanka" />
<meta name="twitter:card" content="You can find the Zonal News here." />
<meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
<meta name="twitter:url" content="<?php echo $domain_name; ?>" />
<meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

<title>Zonal News</title>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <?php include "assest/header.php" ?>
    <!-- </Header> -->


    <!-- Main -->
    <main class="main">
        

        <section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em; padding-bottom:16rem">
            <nav aria-label="breadcrumb" style=" padding-left:2%; ">
                <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Zonal News</li>
                </ol>
            </nav>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0" style="text-transform:uppercase;"><span style="color:#ffd400;">Zonal</span> News</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Latest Articles -->
        <div class="section section-grey notranslate">

            <!-- container -->
            <div class="container">

                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Latest Articles</h2>
                        </div>
                    </div>

                    <?php foreach ($articles as $article) : ?>

                        <!-- post -->
                        <div class="col-md-4">
                            <div class="post">
                                <a class="post-img" href="/news/<?= $article['article_id'] ?>">
                                    <img src="/news/img/article/<?= str_replace('../news/img/article/', '', $article['article_image']) ?>" alt="">
                                </a>
                                <di class="post-body">

                                    <div class="post-meta">
                                        <a class="post-category cat-1" href="/articleCategory/<?= $article['category_id'] ?>" style="background-color:<?= $article['category_color'] ?>"><?= $article['category_name'] ?></a>
                                        <span class="post-date">
                                            <?= date_format(date_create($article['article_created_time']), "F d, Y ") ?>
                                        </span>
                                    </div>

                                    <h3 class="post-title"><a href="/news/<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a></h3>

                                </di>
                            </div>
                        </div>
                        <!-- /post -->

                    <?php endforeach;  ?>


                    <div class="clearfix visible-md visible-lg"></div>
                </div>
                <!-- /row -->

            </div>
            <!-- /container -->
        </div><!-- /Latest Articles -->

        <!-- Most Read -->
        <div class="section section-grey notranslate">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Recommanded Articles</h2>
                                </div>
                            </div>

                            <?php foreach ($most_read_articles as $article) : ?>

                                <!-- post -->
                                <div class="col-md-12">
                                    <div class="post post-row">
                                        <a class="post-img" href="/news/<?= $article['article_id'] ?>">
                                            <img src="/news/img/article/<?= str_replace('../news/img/article/', '', $article['article_image']) ?>" alt="">
                                        </a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a href="/articleCategory/<?= $article['category_id'] ?>" class="post-category" style="background-color:<?= $article['category_color'] ?>">
                                                    <?= $article['category_name'] ?>
                                                </a>
                                                <span class="post-date">
                                                    <?= date_format(date_create($article['article_created_time']), "F d, Y ") ?>
                                                </span>
                                            </div>

                                            <h3 class="post-title"><a href="/news/<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a></h3>
                                            <p><?= strip_tags(substr($article['article_content'], 0, 178)) . "..." ?> <a href="/news/<?= $article['article_id'] ?>">Read More...</a></p>

                                        </div>
                                    </div>
                                </div>
                                <!-- /post -->

                            <?php endforeach;  ?>
                            <div style="text-align:center; margin-bottom:2em; ">
                                <a name="submit" href="/articleCategory" class="btn btn-primary btn-xl float-right mt-1">More Articles...</a>
                            </div>
                            



                        </div>
                    </div>

                    <div class="col-md-4">


                        <!-- catagories -->
                        <div class="aside-widget">
                            <div class="section-title">
                                <h2>Categories</h2>
                            </div>
                            <div class="category-widget">

                                <ul>
                                    <!-- /category -->
                                    <?php foreach ($categories as $category) : ?>
                                        <li>
                                            <a href="/articleCategory/<?= $category['category_id'] ?>"> <?= $category["category_name"] ?>
                                                <span style="background-color: <?= $category["category_color"] ?>"> <?= $category["article_count"] ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                    <!-- /category -->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div><!-- /Most Read -->

    </main><!-- </Main> -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>
    <!-- </Footer> -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>