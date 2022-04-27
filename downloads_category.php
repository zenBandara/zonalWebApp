<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_GET['category'])) {
    $category = $_GET['category'];

    if ($_GET['category']==""){
        header("location:downloads.php");
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="This is the download category of <?php echo $category; ?>. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
    <meta name="keywords" content="<?php echo $category; ?>, Zonal downloads, downloads, zonal  download categories, download category, Katugastota zonal downloads">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="<?php echo $category; ?> (Downloads) - Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="You can find the zonal <?php echo $category; ?>  (Downloads) here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="<?php echo $category; ?> (Downloads) - Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find the zonal <?php echo $category; ?>  (Downloads) here." />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title><?php echo $category; ?> (Downloads)</title>
<?php require_once 'nav.php'; ?>

<!-- heading-->

    <section class="page-section bg-primary" id="Academic_heading" style="max-height: 17em; padding-top:6em;">
        <nav aria-label="breadcrumb" style=" padding-left:2%; ">
            <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/zonalDownloads">Downloads</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $category ?> </li>
            </ol>
        </nav>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0" style=" text-transform: uppercase;"><span style="color:#ffd400;">CATEGORY:</span> <?php echo $category ?></h2>
                    <hr class="divider divider-light" />

                </div>
            </div>
        </div>
    </section>

    <!-- Service-->

    <?php

    $result = $mysqli->query("SELECT * from downloads WHERE res_cat = '$category'") or header("location:".$query_err_page);
    ?>
    <div class="container" style="margin-top: 2%;">
        <table id="tbl" class="table table-bordered table-hover dt-responsive" style=" width: 100%; ">
            <thead>
                <tr>
                    <th>Download</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td> <a href="<?php echo $row['d_path']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2dad4f" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                </svg>&nbsp;Click here to download</a>

                        </td>
                        <td><?php echo $row['d_name']; ?></td>

                        <td>
                                <?php echo $row['d_des']; ?>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

<?php }else{
    header("location:downloads.php");
} ?>

<script>
    $(document).ready(function() {
        var table = $('#tbl').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true

        });
    });
    //$('.alert').alert();
</script>
<!-- Footer-->
<?php require_once 'main-footer.php'; ?>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<script src="/js/scripts.js"></script>
</body>

</html>