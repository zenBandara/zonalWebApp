<!-- Include Head -->
<?php 
include "assest/head.php";
include_once('../config_mains/main.php');
?>
<?php

$catID = "";

// Get All Categories
$stmt = $conn->prepare("SELECT * FROM `category` ");
$stmt->execute();
$categories = $stmt->fetchAll();

if (isset($_GET["catID"])) {

    $catID = $_GET["catID"];

    // Get Category Info
    $stmt = $conn->prepare("SELECT * FROM `category` WHERE category_id = ?");
    $stmt->execute([$catID]);
    $category = $stmt->fetch();

    // Get Latest articles
    $stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id WHERE id_categorie = ?  ORDER BY `article_created_time` DESC ");
    $stmt->execute([$catID]);
    $articles = $stmt->fetchAll();
} else {

    $stmt = $conn->prepare("SELECT * FROM `article` INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC ");
    $stmt->execute();
    $articles = $stmt->fetchAll();
}


?>

<!-- Google Fonts -->

<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

<!-- Custom CSS -->
<!-- <link href="css/home.css" rel="stylesheet"> -->
<link href="/css/style.css" type="text/css" rel="stylesheet" />
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Zonal Education Office - Katugastota">
<meta name="description" content="You can find the <?= $catID == "" ? "" : $category['category_name'] ?> Articles  here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
<meta name="keywords" content="Zonal <?= $catID == "" ? "" : $category['category_name'] ?> News Articles, <?= $catID == "" ? "" : $category['category_name'] ?>, Katugastota Zonal <?= $catID == "" ? "" : $category['category_name'] ?> News">
<meta name="robots" content="index, follow">

<!-- Open graph data -->
<meta name="og:title" property="og:title" content="<?= $catID == "" ? "" : $category['category_name'] ?> Articles : Zonal Education Office, Katugastota, Sri Lanka">
<meta property="og:url" content="<?php echo $domain_name; ?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="You can find the <?= $catID == "" ? "" : $category['category_name'] ?> Articles  here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
<meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

<!-- Twitter Cards -->
<meta name="twitter:title" content="<?= $catID == "" ? "" : $category['category_name'] ?> Articles : Zonal Education Office, Katugastota, Sri Lanka" />
<meta name="twitter:card" content="You can find the <?= $catID == "" ? "" : $category['category_name'] ?> Articles here." />
<meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
<meta name="twitter:url" content="<?php echo $domain_name; ?>" />
<meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

<title><?= $catID == "" ? "" : $category['category_name'] ?> Articles</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <?php include "assest/header.php" ?>
    <!-- </Header> -->

    <!-- Main -->
    <main class="main notranslate">

        <!-- Latest Articles -->
        <div class="section jumbotron mb-0 h-100">
            <!-- container -->
            <div class="container">

                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title" style="padding-top: 5em;">
                            <h2><?= $catID == "" ? "" : $category['category_name'] ?> Articles</h2>

                            <ul class="list-inline mt-1 mb-4">
                                <li class="list-inline-item">
                                    <a href="/articleCategory" class="text-muted">
                                        All
                                    </a>
                                </li>

                                <?php foreach ($categories as $category) : ?>
                                    <li class="list-inline-item">
                                        <a href="/articleCategory/<?= $category['category_id'] ?>" class="text-muted">
                                            <?= $category['category_name'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <?php foreach ($articles as $article) : ?>
                        <!-- post -->
                        <div class="col-md-4">
                            <div class="post">
                                <a class="post-img" href="/news/<?= $article['article_id'] ?>">
                                    <img src="/news/img/article/<?= str_replace('../news/img/article/','',$article['article_image'] )?>" alt="">
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
        </div>


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