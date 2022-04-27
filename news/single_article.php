<?php
// function redirectNews(){
//     header("location:news.php");
// }


// if (isset($_GET['id']) == false || $_GET['id'] == "") {
//     redirectNews(); 
// }else{
    include_once "assest/head.php";
    include_once('../config_mains/main.php');
?>

<?php
$article_id = ($_GET['id']);

// Get Article Info
$stmt = $conn->prepare("SELECT * FROM `article`   WHERE `article_id` = ?");
$stmt->execute([$article_id]);
$article = $stmt->fetch();

// Get Category of article
$stmt = $conn->prepare("SELECT * FROM `category` WHERE `category_id` = ?");
$stmt->execute([$article["id_categorie"]]);
$category = $stmt->fetch();

// Get Author's articles
$stmt = $conn->prepare("SELECT article_title, article_id FROM `article` WHERE id_categorie  = ? LIMIT 4");
$stmt->execute([$article["id_categorie"]]);
$articles = $stmt->fetchAll();




// if ($article["article_title"] == "") {
//     redirectNews();
// }


?>

<!-- Custom CSS -->
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/single_article.css">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Zonal Education Office - Katugastota">
<meta name="description" content="<?php
                                    if ($article["seo_description"] == "") {
                                        echo strip_tags(substr($article['article_content'], 0, 178)) . "...";
                                    } else {
                                        echo $article["seo_description"];
                                    }

                                    ?>">
<meta name="keywords" content="<?= $article["seo_keywords"] ?>">
<meta name="robots" content="index, follow">

<!-- Open graph data -->
<meta name="og:title" property="og:title" content="Zonal News - <?= $article["article_title"] ?>">
<meta property="og:url" content="<?php echo $domain_name; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php
                                            if ($article["seo_description"] == "") {
                                                echo strip_tags(substr($article['article_content'], 0, 178)) . "...";
                                            } else {
                                                echo $article["seo_description"];
                                            }

                                            ?>" />
<meta property="og:image" content="<?php echo $domain_name; ?>news/img/article/<?= str_replace('../news/img/article/', '', $article['article_image']) ?>" />

<!-- Twitter Cards -->
<meta name="twitter:title" content="Zonal News - <?= $article["article_title"] ?>" />
<meta name="twitter:card" content="You can find the Zonal News here." />
<meta name="twitter:description" content="<?php
                                            if ($article["seo_description"] == "") {
                                                echo strip_tags(substr($article['article_content'], 0, 178)) . "...";
                                            } else {
                                                echo $article["seo_description"];
                                            }

                                            ?>" />
<meta name="twitter:url" content="<?php echo $domain_name; ?>" />
<meta name="twitter:image" content="<?php echo $domain_name; ?>news/img/article/<?= str_replace('../news/img/article/', '', $article['article_image']) ?>" />

<title><?= $article["article_title"] ?></title>

</head>

<body>
    
<?php 
    //  echo "<br><br><br><br><br><br><br><br><br><br><br><br><h1>".$article['article_title']."</h1>";
    ?>

    <!-- Header -->
    <?php include "assest/header.php" ?>
    <!-- /Header -->


    <!-- Main -->
    <main role="main" class="bg-l py-4 notranslate">

        <div class="container">

            <div class="row">

                <!-- Article -->
                <div class="content bg-white col-lg-9 p-0 border border-muted">


                    <!-- Post Image -->
                    <div class="post__img" style="background-image: url('/news/img/article/<?= str_replace('../news/img/article/', '', $article['article_image']) ?>');"></div>

                    <!-- Post Content -->
                    <div class="post__content w-75 mx-auto">

                        <div class="post-head text-center my-5">
                            <h1 class="post__title">
                                <?php echo $article["article_title"] ;
                                ?>
                                
                            </h1>

                            <div class="post-meta ">
                                <span class="post__date">
                                    <?= date_format(date_create($article["article_created_time"]), "F d, Y ") ?>
                                </span>
                                <a class="post-category" href="/articleCategory/<?= $category['category_id'] ?>" style="background-color:<?= $category['category_color'] ?>">
                                    <?= $category['category_name'] ?>
                                </a>
                            </div>
                        </div>

                        <div class="post-body text-break">

                            <?= $article["article_content"] ?>

                        </div>

                        <!-- author Info -->
                        <div class="post-footer d-flex my-5">




                        </div>

                    </div>


                </div><!-- /Article -->

                <!-- Aside -->
                <aside class="aside col-lg-3" >
                    <!-- Author Info -->
                    <!-- <div class="p-3 bg-white border  border-muted">
                        <div class="d-flex align-items-center">
                            <img class="profile-thumbnail rounded-circle" alt="test avatar image" style="width: 60px;height: 60px;">
                            <h5 class="font-italic m-0"></h5>
                        </div>
                        <p class="author_desc p-1"></p>
                        <div class="d-flex flex-column justify-content-between">
                            <div class="author_links">
                               
                            </div>
                        </div>
                    </div>/Author Info -->

                    <!-- Other articles  -->
                    <!-- <div class="p-3 bg-white border  border-muted">

                            <div class="d-flex align-items-center">
                                <img class="profile-thumbnail rounded-circle" src="img/avatar/" alt="test avatar image" style="width: 60px;height: 60px;">
                                <h5 class="font-italic"></h5>
                            </div>
                            <p class="author_desc"></p>

                        </div> -->


                    <div class="card bg-light my-3" style=" position: sticky;top: 6em;">
                        <div class="card-header"><strong> More from <?= $category['category_name'] ?></strong></div>

                        <ul class="list-group list-group-flush">
                            <?php foreach ($articles as $article) : ?>
                                <li class="list-group-item"><a href="/news/<?= $article['article_id'] ?>"><?= $article['article_title'] ?></a></li>
                                <!-- <li class="list-group-item"><a href="">How To Create A Simple With CSS</a></li>
                                <li class="list-group-item"><a href="">How To Parallax Style Effect With CSSs</a></li> -->
                            <?php endforeach; ?>
                        </ul>
                        <a name="submit" href="/articleCategory" class="btn btn-primary btn-xl float-right ml-5 mr-5 mt-1 mb-1">ALL ARTICLES</a>
                        
                        
                    </div>
                    

                    <!-- /Other articles  -->


                </aside><!-- /Aside -->

            </div>


            <!-- Comments -->
            
        </div>

    </main><!-- /Main -->

    <!-- Footer -->
    <?php include "assest/footer.php" ?>
    <!-- /Footer -->

</body>

</html>