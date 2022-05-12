<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_GET['category'])) {
    $category = $_GET['category'];

    if ($_GET['category'] == "") {
        header("location:vacancies.php");
    }
?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Zonal Education Office - Katugastota">
        <meta name="description" content="This is the vacancy category of <?php echo $category; ?>. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
        <meta name="keywords" content="<?php echo $category; ?>, Zonal job vacancy, job opputunity, zonal jobs, Katugastota zonal jobs, jobs">
        <meta name="robots" content="index, follow">

        <!-- Open graph data -->
        <meta name="og:title" property="og:title" content="<?php echo $category; ?> (Vacancies) - Zonal Education Office, Katugastota, Sri Lanka">
        <meta property="og:url" content="<?php echo $domain_name; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="You can find the zonal <?php echo $category; ?>  (Vacancies) here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
        <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

        <!-- Twitter Cards -->
        <meta name="twitter:title" content="<?php echo $category; ?> (Vacancies) - Zonal Education Office, Katugastota, Sri Lanka" />
        <meta name="twitter:card" content="You can find the zonal <?php echo $category; ?>  (Vacancies) here." />
        <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
        <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
        <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

        <title><?php echo $category; ?> (Vacancies)</title>
        <?php require_once 'nav.php'; ?>

        <!-- heading-->

        <section class="page-section bg-primary" id="Academic_heading" style="max-height: 17em; padding-top:6em;">
            <nav aria-label="breadcrumb" style=" padding-left:2%; ">
                <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/zonalVacancies">Vacancies</a></li>
                    <li class="breadcrumb-item active notranslate" aria-current="page"><?php echo $category ?> </li>
                </ol>
            </nav>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0" style=" text-transform: uppercase;"><span style="color:#ffd400;">CATEGORY:</span> <span class="notranslate"><?php echo $category ?></span></h2>
                        <hr class="divider divider-light" />

                    </div>
                </div>
            </div>
        </section>

        <!-- Services-->

        <?php
        $result = $mysqli->query("SELECT * from vacancy WHERE category = '$category'") or header("location:".$query_err_page);
        ?>
        <br>
        <div style="margin-left:2%;margin-right:2%;" class="notranslate">
            <table id="tbl" class="table  table-hover dt-responsive" style=" width: 100%; border:none;">
                <thead style="display: none;">
                    <tr>
                        <th>ID</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td>
                                <!-- start -->

                                <div style="width: 90vw;">
                                    <p class="card text-center bg-light mb-3">
                                        <a data-toggle="collapse" href="#col<?php echo $row['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <strong style="font-size:3.5vh;"><?php echo $row['title']; ?></strong>
                                            <a><i><?php echo ' (Category:' . $row['category'] . ')'; ?></i><br>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#878580" class="bi bi-clock-fill" viewBox="0 0 16 17">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                </svg>&nbsp;<?php echo $row['date']; ?></a>
                                        </a>

                                    </p>
                                    <div class="collapse" id="col<?php echo $row['id']; ?>" class="collapse" data-parent="#accordion" style="overflow:hidden;">
                                        <div class="card card-body">
                                            
                                                <?php echo $row['content']; ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->

                            </td>
                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>
            <br>



        </div>

    <?php } else {
    header("location:vacancies.php");
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/js/scripts.js"></script>
    <!-- Footer-->
    <?php require_once 'main-footer.php'; ?>




    </body>

</html>