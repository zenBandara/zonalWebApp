<?php 

// /$divs = ['Akurana','Poojapitiya','Akurana','Harispaththuwa','Galagedara','all'];

if (isset($_GET['division'])==false || $_GET['division']==""){
    header("location:school_list.php?division=all");
}

include_once('config_mains/main.php'); 


?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="You can find <?php echo $_GET['division']; ?> divisional school list here.The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation.">
    <meta name="keywords" content="School List, Katugastota Zonal School, Schools in Katugastota Zone, Schools in <?php echo $_GET['division']; ?>">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="School List (<?php echo $_GET['division']; ?>) : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="School List (<?php echo $_GET['division']; ?>) : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find <?php echo $_GET['division']; ?> divisional school list here." />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>Zonal School List</title>
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
    <br>
    <section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
        <nav aria-label="breadcrumb" style=" padding-left:2%; ">
            <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/divisionalDetails">Divisions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Exam Evaluation</li>
            </ol>
        </nav>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0"><span style="color:#ffd400;">SCHOOL</span> LIST - <span style="color:#ffd400; text-transform:uppercase;"><?php echo $_GET['division']; ?></span> DIVISION<?php $suf = $_GET['division'] == 'all' ? 'S (WHOLE ZONE)' : '';
                                                                                                                                                                                                            echo $suf; ?></h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4"></p>

                </div>
            </div>
        </div>
        <?php
        $div_name = $_GET['division'];
        ?>
    </section>
    <div class="container">
        <?php
        $sql = $div_name == 'all' ? "SELECT * from school" : "SELECT * from school WHERE sch_div = '$div_name'";
        $result = $mysqli->query($sql) or header("location:".$query_err_page);
        ?>

        <br>
        <table id="tbl" class="center table dt-responsive" style="width: 100%;">
            <thead>
                <tr style="visibility: hidden;">
                    <th>Census No.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td>

                            <div class="container card p-3 py-4 bg-primary text-light" style="width: 83vw;">
                                <div class="center mt-3"> <img src="<?php
                                                                    if ($row['sch_img'] == "") {
                                                                        echo "/default/default_school.png";
                                                                    } else {
                                                                        echo $row['sch_img'];
                                                                    }

                                                                    ?>" style="width: 7em; height:7em; float: center;" class="center rounded-circle"> </div><br>
                                <div class="text-center mt-3"> <b style="background-color:#ffd400;" class=" p-1 px-4 rounded text-dark"><?php echo 'Census No. ' . $row['census_no']; ?></b>
                                    <h5 class="mt-2 mb-0"><?php echo $row['sch_name']; ?></h5>

                                    <i>(Division: <?php echo $row['sch_div']; ?>)</i><br><br>
                                    <a class="btn btn-light btn-xl" href="/schoolProfile/<?php echo $row['census_no']; ?>" style="margin-bottom:2px;width: 16em;">VISIT SCHOOL PROFILE</a>
                                </div>
                            </div>




                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="/js/scripts.js"></script>
    <?php require_once 'main-footer.php'; ?>
    </body>

</html>