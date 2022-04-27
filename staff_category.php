<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_GET['but_submit']) || isset($_GET['branch']) || isset($_GET['division'])) {

    $subject = "";

    if (isset($_GET['but_submit'])) {
        $subject = $_GET['but_submit'] . ' Staff';
    } elseif (isset($_GET['branch'])) {
        $subject = $_GET['branch'] . ' Branch Staff';
    } elseif (isset($_GET['division'])) {
        $subject = $_GET['division'] . ' Divisional Staff';
    } else {
        header("location:staff.php");
    }

?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Zonal Education Office - Katugastota">
        <meta name="description" content="You can find the zonal inforamtion on <?php echo $subject; ?> here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. 5 branches Planning Branch, Development Branch, Finance Branch, Establishment Branch, Administration Branch">
        <meta name="keywords" content="<?php echo $subject; ?>, staff, contact numbers <?php echo $subject; ?>, <?php echo $subject; ?>, <?php echo $subject; ?> contact numbers">
        <meta name="robots" content="index, follow">

        <!-- Open graph data -->
        <meta name="og:title" property="og:title" content="<?php echo $subject; ?> - Zonal Education Office, Katugastota, Sri Lanka">
        <meta property="og:url" content="<?php echo $domain_name; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="You can find the zonal inforamtion on <?php echo $subject; ?> here. The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
        <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

        <!-- Twitter Cards -->
        <meta name="twitter:title" content=" <?php echo $subject; ?> - Zonal Education Office, Katugastota, Sri Lanka" />
        <meta name="twitter:card" content="You can find the zonal inforamtion on <?php echo $subject; ?> here." />
        <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
        <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
        <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

        <title><?php echo $subject; ?></title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php require_once 'nav.php'; ?>

        <!-- heading-->



        <?php

        $table = '';
        $hedding = '';
        $branch_name = '';

        if (isset($_GET['but_submit'])) {
            if ($_GET['but_submit'] == 'academic') {
                $table = 'staff';
                $hedding = 'Academic';
            } elseif ($_GET['but_submit'] == 'nonacdemic') {
                $table = 'nonac_staff';
                $hedding = 'Non-Academic';
            } elseif ($_GET['but_submit'] == 'administration') {
                $table = 'admin_staff';
                $hedding = 'Administration';
            } else {
                $table = '';
            }
        }

        if (isset($_GET['branch'])) {
            $br = array("planning", "establishment", "finance", "development", "administration");
            if (in_array($_GET['branch'], $br)) {
                $table = 'nonac_staff';
                $hedding = $_GET['branch'];
                $branch_name = $_GET['branch'];
            } else {
                $table = '';
            }
        }

        if (isset($_GET['division'])) {
            $div = array("poojapitiya", "hatharaliyadda", "galagedara", "akurana", "harispaththuwa");
            if (in_array($_GET['division'], $div)) {
                $table = 'div_staff';
                $hedding = $_GET['division'];
                $branch_name = $_GET['division'];
            } else {
                $table = '';
            }
        }
        ?>

        <?php
        if ($table != '') {


        ?>
            <section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
                <nav aria-label="breadcrumb" style=" padding-left:2%; ">
                    <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/zonalStaff">Staff</a></li>
                        <?php
                        if (isset($_GET['branch'])) {
                        ?>
                            <li class="breadcrumb-item"><a href="/ourBranches">Non-academic Staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo ucwords($hedding); ?> Staff</li>
                        <?php } elseif (isset($_GET['division'])) { ?>
                            <li class="breadcrumb-item"><a href="/ourBranches">Divisional Staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo ucwords($hedding); ?> Divisional Staff</li>
                        <?php } else { ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo ucwords($hedding); ?> Staff</li>
                        <?php } ?>
                    </ol>
                </nav>
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-lg-8 text-center">
                            <?php if (isset($_GET['division'])) { ?>
                                <h2 class="text-white mt-0"><span style="color:#ffd400; text-transform: uppercase;"><?php echo $hedding; ?></span> DIVISIONAL STAFF</h2>
                            <?php } else { ?>
                                <h2 class="text-white mt-0"><span style="color:#ffd400; text-transform: uppercase;"><?php echo $hedding; ?></span> STAFF</h2>
                            <?php } ?>
                            <hr class="divider divider-light" />
                            <!-- <p class="text-white-75 mb-4">The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka.</p> -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services-->
            <?php
            $qu = '';
            if (isset($_GET['branch'])) {
                $qu = "SELECT * from $table WHERE branch='$branch_name' and branch_head = 'no'";
            } else if (isset($_GET['division'])) {
                $qu = "SELECT * from $table WHERE division='$branch_name' and div_head = 'no'";
            } else {
                $qu = "SELECT * from $table";
            }

            $result =  $mysqli->query($qu) or header("location:".$query_err_page);
            ?>
            <br>
            <div id="portfolio">
                <div class="container">
                    <table id="tbl" class="table dt-responsive" style=" width: 100%; border:5px solid white;">
                        <thead>
                            <tr>
                                <th style="visibility: hidden;">Person</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) : ?>



                                <tr>
                                    <td>
                                        <div class="card text-white bg-primary" style="padding: 0.8em; border-radius:3rem;">
                                            <div class="row">
                                                <div class="col-lg-3" style="text-align: center;padding:4em 1em 1em 1em;">


                                                    <img class="center" alt="Image of <?php echo $row['staff_title'] . ' ' . $row['staff_name']; ?>" src="<?php
                                                                                                                                                            if ($row['staff_img'] == "") {
                                                                                                                                                                echo "/default/default_pic.jpg";
                                                                                                                                                            } else {
                                                                                                                                                                
                                                                                                                                                                echo str_replace('..', '', $row['staff_img']);
                                                                                                                                                            }

                                                                                                                                                            ?>" style="width: 220px; height: 220px; border:2px solid #fff; border-radius:50%;">

                                                </div>
                                                <div class="col-lg-8">
                                                    <div style="text-align: left;">


                                                        <h2><?php echo $row['staff_title'] . ' ' . $row['staff_name']; ?></h2>
                                                        <?php
                                                        if ($row['staff_ava'] == 'Available') : ?>
                                                            <span class="bg-success p-1 px-4 rounded text-white"><?php echo $row['staff_ava']; ?></span>
                                                        <?php elseif ($row['staff_ava'] == 'Not Available') : ?>
                                                            <span class="bg-danger p-1 px-4 rounded text-white"><?php echo $row['staff_ava']; ?></span>
                                                        <?php elseif ($row['staff_ava'] == 'On Study Leave') : ?>
                                                            <span class="bg-warning p-1 px-4 rounded text-white"><?php echo $row['staff_ava']; ?></span>
                                                        <?php elseif ($row['staff_ava'] == 'On Maternity Leave') : ?>
                                                            <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $row['staff_ava']; ?></span>
                                                        <?php elseif ($row['staff_ava'] == 'On Personal Leave') : ?>
                                                            <span class="bg-info p-1 px-4 rounded text-white"><?php echo $row['staff_ava']; ?></span>

                                                        <?php endif; ?><br><br>
                                                        <div class="text-white-75">
                                                            <div><strong>Grade - </strong><?php echo $row['staff_grade']; ?></div>
                                                            <div> <strong>Subject - </strong><?php echo $row['staff_subject']; ?></div>
                                                            <div><strong>Email - </strong>
                                                                <?php echo $row['staff_email']; ?>



                                                            </div>
                                                            <div>
                                                                <strong>Phone - </strong>
                                                                <?php echo $row['staff_contact']; ?>



                                                            </div>

                                                            <div><strong>Role - </strong><?php echo $row['staff_role']; ?></div>
                                                        </div>


                                                        <br>
                                                        <div>
                                                            <a style="color: #fff;" data-toggle="collapse" href="#col<?php echo $row['staff_id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                <strong>▼ Description</strong> <i>(Click here to see)</i>
                                                            </a>

                                                        </div>
                                                        <div class="collapse" id="col<?php echo $row['staff_id']; ?>">

                                                            <div style="color: #661414;" class="card card-body notranslate ">
                                                                <?php echo $row['staff_des']; ?>

                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div style="text-align: right; margin-bottom:1em;">
                                                            <a class="btn btn-light btn-xl" style="margin-right:2%; margin-bottom:2%;" href="mailto:<?php echo $row['staff_email']; ?>">Message</a>
                                                            <a class="btn btn-light btn-xl" style="margin-bottom:2%;" href="tel:<?php echo $row['staff_contact']; ?>">Contact Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>
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
        <?php
        } else {
            echo '<div class="container center" style="text-align:center;"> <br><br><br><br><br><br><h1 class="text-primary">404 - Page not found!</h1><br>
    <a class="btn btn-primary btn-xl" style="margin-right:2%; margin-bottom:2%;" href="/zonalStaff">Go back</a></div>';
        }
        ?>


        <!-- Footer-->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
        <?php require_once 'main-footer.php'; ?>
        </body>

</html>

<?php } else {
    header("location:staff.php");
} ?>