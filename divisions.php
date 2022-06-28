<?php include_once('config_mains/main.php'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zonal Education Office - Katugastota">
    <meta name="description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation.">
    <meta name="keywords" content="Zonal Divisions, Divisions,Katugastota Zonal Divisions">
    <meta name="robots" content="index, follow">

    <!-- Open graph data -->
    <meta name="og:title" property="og:title" content="Zonal Divisions : Zonal Education Office, Katugastota, Sri Lanka">
    <meta property="og:url" content="<?php echo $domain_name; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta property="og:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Zonal Divisions : Zonal Education Office, Katugastota, Sri Lanka" />
    <meta name="twitter:card" content="You can find the information on zonal divisions here." />
    <meta name="twitter:description" content="The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. The mission of the Zonal Education Office, Katugastota is to be Knowledgeable skilled individuals with the right attitudes to the globe. And the mission is to bestow a mother nation, a skilled, well-disciplined, humane student population and a satisfied teacher generation." />
    <meta name="twitter:url" content="<?php echo $domain_name; ?>" />
    <meta name="twitter:image" content="<?php echo $domain_name; ?>includes/cardPhoto/card.webp" />

    <title>Zonal Divisions</title>


    <?php require_once 'nav.php'; ?>


    <!-- heading-->

    <?php


    $staff_id = '';
    $staff_name = '';
    $staff_grade = '';
    $staff_email = '';
    $staff_contact = '';
    $staff_role = '';
    $staff_img = '';
    $staff_ava = '';
    $staff_title = '';

    ?>
    <section class="page-section bg-primary" id="Academic_heading" style="max-height: 20em; padding-top:6em;">
        <nav aria-label="breadcrumb" style=" padding-left:2%; ">
            <ol class="breadcrumb" style="background-color: #ffd400; width: 12em; padding-left:1em; border-radius:0.5em;">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Divisions</li>
            </ol>
        </nav>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0"><span style="color:#ffd400;">ZONAL</span> DIVISIONS</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">The Zonal Education Office, Katugastota is facilitating supervision, education, and management over 122 government schools within 5 divisions in the Katugastota zone, Sri Lanka. </p>

                </div>
            </div>
        </div>
    </section>

    <!-- Services-->

    <div id="portfolio">
        <div class="container">

            <div class="row d-flex justify-content">

                <div class="col-md-3">
                    <?php
                    $division_name = 'Poojapitiya';
                    $result = $mysqli->query("SELECT * from div_staff WHERE div_head = '$division_name'") or header("location:" . $query_err_page);
                    while ($row = $result->fetch_assoc()) {
                        $staff_id = $row['staff_id'];
                        $staff_name = $row['staff_name'];
                        $staff_grade = $row['staff_grade'];
                        $staff_email = $row['staff_email'];
                        $staff_contact = $row['staff_contact'];
                        $staff_role = $row['staff_role'];
                        $staff_img = $row['staff_img'];
                        $staff_ava = $row['staff_ava'];
                        $staff_title = $row['staff_title'];
                    } ?>
                    <br>
                    <div class="card p-3 py-4 bg-primary text-light">
                        <div style="text-align: center;">
                            <h5 class="text-white mt-0"><span style="color:#ffd400; text-transform:uppercase;"><?php echo $division_name; ?></span><br> DIVISION</h5>
                        </div>
                        <hr>
                        <div class="center"> <img src="
                        <?php
                                            if ($staff_img == "") {
                                                echo "/default/default_pic.jpg";
                                            } else {
                                                echo $staff_img;
                                            }

                                            ?>" style="width: 120px;height:120px;" class="rounded-circle"> </div>
                        <div class="text-center mt-3">
                            <?php
                            if ($staff_ava == 'Available') : ?>
                                <span class="bg-success p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'Not Available') : ?>
                                <span class="bg-danger p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Study Leave') : ?>
                                <span class="bg-warning p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Maternity Leave') : ?>
                                <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Personal Leave') : ?>
                                <span class="bg-info p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>

                            <?php endif; ?>
                            <h5 class="mt-2 mb-0"><?php echo $staff_title . ' ' . $staff_name; ?></h5> <i>Divisional Director - Poojapitiya, Katugastota Zone, Sri Lanka</i>
                            <br><br>
                            <div style="text-align: center;">
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    <?php echo $staff_email; ?>
                                </p>
                                <p><i class="fas fa-phone me-3"></i><?php echo $staff_contact; ?></p>
                            </div>
                            <hr>
                            <?php
                            $result = $mysqli->query("SELECT count(*) as scl_count from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);
                            $row = $result->fetch_array();
                            $count_scl = $row['scl_count'];
                            ?>
                            <ul style="text-align: center;">
                                <li>Total No. of Schools<h2><?php echo $count_scl; ?></h2>
                                </li>
                                <br>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_tea + eng_tea + sin_tea) as tea_count, sum(tam_tea) as tam_tea_tot, sum(sin_tea) as sin_tea_tot, sum(eng_tea) as eng_tea_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_tea = $row['tea_count'];
                                $tam_tea_tot = $row['tam_tea_tot'];
                                $sin_tea_tot = $row['sin_tea_tot'];
                                $eng_tea_tot = $row['eng_tea_tot'];
                                ?>
                                <li>Total No. of Teachers<h2><?php echo $count_tea; ?></h2>

                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium teachers">Sin. Med. Teachers</td>
                                            <td title="Total number of Tamil medium teachers">Tam. Med. Teachers</td>
                                            <td title="Total number of English medium teachers">Eng. Med. Teachers</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium teachers"><?php echo $sin_tea_tot; ?></th>
                                            <th title="Total number of Tamil medium teachers"><?php echo $tam_tea_tot; ?></th>
                                            <th title="Total number of English medium teachers"><?php echo $eng_tea_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_st + eng_st + sin_st) as st_count, sum(tam_st) as tam_tot, sum(sin_st) as sin_tot, sum(eng_st) as eng_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_st = $row['st_count'];
                                $tam_tot = $row['tam_tot'];
                                $sin_tot = $row['sin_tot'];
                                $eng_tot = $row['eng_tot'];
                                ?>
                                <br>
                                <li>Total No. of Students:<h2><?php echo $count_st; ?></h2>
                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium students">Sin. Med. Students</td>
                                            <td title="Total number of Tamil medium students">Tam. Med. Students</td>
                                            <td title="Total number of English medium students">Eng. Med. Students</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium students"><?php echo $sin_tot; ?></th>
                                            <th title="Total number of Tamil medium students"><?php echo $tam_tot; ?></th>
                                            <th title="Total number of English medium students"><?php echo $eng_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                            </ul>

                            <hr>
                            <div>
                                <a href="/schoolList/<?php echo $division_name; ?>" class="btn btn-light btn-xl">To The School profiles</a><br><br>
                                <a href="/examEvalution/<?php echo $division_name; ?>" class="btn btn-light btn-xl">Examination Evaluation</a>
                            </div>
                            <?php
                            $staff_id = '';
                            $staff_name = '';
                            $staff_grade = '';
                            $staff_email = '';
                            $staff_contact = '';
                            $staff_role = '';
                            $staff_img = '';
                            $staff_ava = '';
                            $staff_title = '';
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <?php
                    $division_name = 'Hatharaliyadda';
                    $result = $mysqli->query("SELECT * from div_staff WHERE div_head = '$division_name'") or header("location:" . $query_err_page);
                    while ($row = $result->fetch_assoc()) {
                        $staff_id = $row['staff_id'];
                        $staff_name = $row['staff_name'];
                        $staff_grade = $row['staff_grade'];
                        $staff_email = $row['staff_email'];
                        $staff_contact = $row['staff_contact'];
                        $staff_role = $row['staff_role'];
                        $staff_img = $row['staff_img'];
                        $staff_ava = $row['staff_ava'];
                        $staff_title = $row['staff_title'];
                    } ?>
                    <br>
                    <div class="card p-3 py-4 bg-primary text-light">
                        <div style="text-align: center;">
                            <h5 class="text-white mt-0"><span style="color:#ffd400; text-transform:uppercase;"><?php echo $division_name; ?></span><br> DIVISION</h5>
                        </div>
                        <hr>
                        <div class="center"> <img src="
                        <?php
                                            if ($staff_img == "") {
                                                echo "/default/default_pic.jpg";
                                            } else {
                                                echo $staff_img;
                                            }

                                            ?>" style="width: 120px;height:120px;" class="rounded-circle"> </div>
                        <div class="text-center mt-3">
                            <?php
                            if ($staff_ava == 'Available') : ?>
                                <span class="bg-success p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'Not Available') : ?>
                                <span class="bg-danger p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Study Leave') : ?>
                                <span class="bg-warning p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Maternity Leave') : ?>
                                <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Personal Leave') : ?>
                                <span class="bg-info p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>

                            <?php endif; ?>
                            <h5 class="mt-2 mb-0"><?php echo $staff_title . ' ' . $staff_name; ?></h5> <i>Divisional director - Hatharaliyadda, Katugastota Zone, Sri Lanka</i>
                            <br><br>
                            <div style="text-align: center;">
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    <?php echo $staff_email; ?>
                                </p>
                                <p><i class="fas fa-phone me-3"></i><?php echo $staff_contact; ?></p>
                            </div>
                            <hr>
                            <?php
                            $result = $mysqli->query("SELECT count(*) as scl_count from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);
                            $row = $result->fetch_array();
                            $count_scl = $row['scl_count'];
                            ?>
                            <ul style="text-align: center;">
                                <li>Total No. of Schools<h2><?php echo $count_scl; ?></h2>
                                </li>
                                <br>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_tea + eng_tea + sin_tea) as tea_count, sum(tam_tea) as tam_tea_tot, sum(sin_tea) as sin_tea_tot, sum(eng_tea) as eng_tea_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_tea = $row['tea_count'];
                                $tam_tea_tot = $row['tam_tea_tot'];
                                $sin_tea_tot = $row['sin_tea_tot'];
                                $eng_tea_tot = $row['eng_tea_tot'];
                                ?>
                                <li>Total No. of Teachers<h2><?php echo $count_tea; ?></h2>

                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium teachers">Sin. Med. Teachers</td>
                                            <td title="Total number of Tamil medium teachers">Tam. Med. Teachers</td>
                                            <td title="Total number of English medium teachers">Eng. Med. Teachers</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium teachers"><?php echo $sin_tea_tot; ?></th>
                                            <th title="Total number of Tamil medium teachers"><?php echo $tam_tea_tot; ?></th>
                                            <th title="Total number of English medium teachers"><?php echo $eng_tea_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_st + eng_st + sin_st) as st_count, sum(tam_st) as tam_tot, sum(sin_st) as sin_tot, sum(eng_st) as eng_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_st = $row['st_count'];
                                $tam_tot = $row['tam_tot'];
                                $sin_tot = $row['sin_tot'];
                                $eng_tot = $row['eng_tot'];
                                ?>
                                <br>
                                <li>Total No. of Students:<h2><?php echo $count_st; ?></h2>
                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium students">Sin. Med. Students</td>
                                            <td title="Total number of Tamil medium students">Tam. Med. Students</td>
                                            <td title="Total number of English medium students">Eng. Med. Students</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium students"><?php echo $sin_tot; ?></th>
                                            <th title="Total number of Tamil medium students"><?php echo $tam_tot; ?></th>
                                            <th title="Total number of English medium students"><?php echo $eng_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                            </ul>

                            <hr>
                            <div>
                                <a href="/schoolList/<?php echo $division_name; ?>" class="btn btn-light btn-xl">To The School profiles</a><br><br>
                                <a href="/examEvalution/<?php echo $division_name; ?>" class="btn btn-light btn-xl">Examination Evaluation</a>
                            </div>
                            <?php
                            $staff_id = '';
                            $staff_name = '';
                            $staff_grade = '';
                            $staff_email = '';
                            $staff_contact = '';
                            $staff_role = '';
                            $staff_img = '';
                            $staff_ava = '';
                            $staff_title = '';
                            ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <?php
                    $division_name = 'Akurana';
                    $result = $mysqli->query("SELECT * from div_staff WHERE div_head = '$division_name'") or header("location:" . $query_err_page);
                    while ($row = $result->fetch_assoc()) {
                        $staff_id = $row['staff_id'];
                        $staff_name = $row['staff_name'];
                        $staff_grade = $row['staff_grade'];
                        $staff_email = $row['staff_email'];
                        $staff_contact = $row['staff_contact'];
                        $staff_role = $row['staff_role'];
                        $staff_img = $row['staff_img'];
                        $staff_ava = $row['staff_ava'];
                        $staff_title = $row['staff_title'];
                    } ?>
                    <br>
                    <div class="card p-3 py-4 bg-primary text-light">
                        <div style="text-align: center;">
                            <h5 class="text-white mt-0"><span style="color:#ffd400; text-transform:uppercase;"><?php echo $division_name; ?></span><br> DIVISION</h5>
                        </div>
                        <hr>
                        <div class="center"> <img src="
                        <?php
                                            if ($staff_img == "") {
                                                echo "/default/default_pic.jpg";
                                            } else {
                                                echo $staff_img;
                                            }

                                            ?>" style="width: 120px;height:120px;" class="rounded-circle"> </div>
                        <div class="text-center mt-3">
                            <?php
                            if ($staff_ava == 'Available') : ?>
                                <span class="bg-success p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'Not Available') : ?>
                                <span class="bg-danger p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Study Leave') : ?>
                                <span class="bg-warning p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Maternity Leave') : ?>
                                <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Personal Leave') : ?>
                                <span class="bg-info p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>

                            <?php endif; ?>
                            <h5 class="mt-2 mb-0"><?php echo $staff_title . ' ' . $staff_name; ?></h5> <i>Divisional director - Akurana, Katugastota Zone, Sri Lanka</i>
                            <br><br>
                            <div style="text-align: center;">
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    <?php echo $staff_email; ?>
                                </p>
                                <p><i class="fas fa-phone me-3"></i><?php echo $staff_contact; ?></p>
                            </div>
                            <hr>
                            <?php
                            $result = $mysqli->query("SELECT count(*) as scl_count from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);
                            $row = $result->fetch_array();
                            $count_scl = $row['scl_count'];
                            ?>
                            <ul style="text-align: center;">
                                <li>Total No. of Schools<h2><?php echo $count_scl; ?></h2>
                                </li>
                                <br>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_tea + eng_tea + sin_tea) as tea_count, sum(tam_tea) as tam_tea_tot, sum(sin_tea) as sin_tea_tot, sum(eng_tea) as eng_tea_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_tea = $row['tea_count'];
                                $tam_tea_tot = $row['tam_tea_tot'];
                                $sin_tea_tot = $row['sin_tea_tot'];
                                $eng_tea_tot = $row['eng_tea_tot'];
                                ?>
                                <li>Total No. of Teachers<h2><?php echo $count_tea; ?></h2>

                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium teachers">Sin. Med. Teachers</td>
                                            <td title="Total number of Tamil medium teachers">Tam. Med. Teachers</td>
                                            <td title="Total number of English medium teachers">Eng. Med. Teachers</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium teachers"><?php echo $sin_tea_tot; ?></th>
                                            <th title="Total number of Tamil medium teachers"><?php echo $tam_tea_tot; ?></th>
                                            <th title="Total number of English medium teachers"><?php echo $eng_tea_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_st + eng_st + sin_st) as st_count, sum(tam_st) as tam_tot, sum(sin_st) as sin_tot, sum(eng_st) as eng_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_st = $row['st_count'];
                                $tam_tot = $row['tam_tot'];
                                $sin_tot = $row['sin_tot'];
                                $eng_tot = $row['eng_tot'];
                                ?>
                                <br>
                                <li>Total No. of Students:<h2><?php echo $count_st; ?></h2>
                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium students">Sin. Med. Students</td>
                                            <td title="Total number of Tamil medium students">Tam. Med. Students</td>
                                            <td title="Total number of English medium students">Eng. Med. Students</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium students"><?php echo $sin_tot; ?></th>
                                            <th title="Total number of Tamil medium students"><?php echo $tam_tot; ?></th>
                                            <th title="Total number of English medium students"><?php echo $eng_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                            </ul>

                            <hr>
                            <div>
                                <a href="/schoolList/<?php echo $division_name; ?>" class="btn btn-light btn-xl">To The School profiles</a><br><br>
                                <a href="/examEvalution/<?php echo $division_name; ?>" class="btn btn-light btn-xl">Examination Evaluation</a>
                            </div>
                            <?php
                            $staff_id = '';
                            $staff_name = '';
                            $staff_grade = '';
                            $staff_email = '';
                            $staff_contact = '';
                            $staff_role = '';
                            $staff_img = '';
                            $staff_ava = '';
                            $staff_title = '';
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <?php
                    $division_name = 'Harispaththuwa';
                    $result = $mysqli->query("SELECT * from div_staff WHERE div_head = '$division_name'") or header("location:" . $query_err_page);
                    while ($row = $result->fetch_assoc()) {
                        $staff_id = $row['staff_id'];
                        $staff_name = $row['staff_name'];
                        $staff_grade = $row['staff_grade'];
                        $staff_email = $row['staff_email'];
                        $staff_contact = $row['staff_contact'];
                        $staff_role = $row['staff_role'];
                        $staff_img = $row['staff_img'];
                        $staff_ava = $row['staff_ava'];
                        $staff_title = $row['staff_title'];
                    } ?>
                    <br>
                    <div class="card p-3 py-4 bg-primary text-light">
                        <div style="text-align: center;">
                            <h5 class="text-white mt-0"><span style="color:#ffd400; text-transform:uppercase;"><?php echo $division_name; ?></span><br> DIVISION</h5>
                        </div>
                        <hr>
                        <div class="center"> <img src="
                        <?php
                                            if ($staff_img == "") {
                                                echo "/default/default_pic.jpg";
                                            } else {
                                                echo $staff_img;
                                            }

                                            ?>" style="width: 120px;height:120px;" class="rounded-circle"> </div>
                        <div class="text-center mt-3">
                            <?php
                            if ($staff_ava == 'Available') : ?>
                                <span class="bg-success p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'Not Available') : ?>
                                <span class="bg-danger p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Study Leave') : ?>
                                <span class="bg-warning p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Maternity Leave') : ?>
                                <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Personal Leave') : ?>
                                <span class="bg-info p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>

                            <?php endif; ?>
                            <h5 class="mt-2 mb-0"><?php echo $staff_title . ' ' . $staff_name; ?></h5> <i>Divisional director - Harispaththuwa, Katugastota Zone, Sri Lanka</i>
                            <br><br>
                            <div style="text-align: center;">
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    <?php echo $staff_email; ?>
                                </p>
                                <p><i class="fas fa-phone me-3"></i><?php echo $staff_contact; ?></p>
                            </div>
                            <hr>
                            <?php
                            $result = $mysqli->query("SELECT count(*) as scl_count from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);
                            $row = $result->fetch_array();
                            $count_scl = $row['scl_count'];
                            ?>
                            <ul style="text-align: center;">
                                <li>Total No. of Schools<h2><?php echo $count_scl; ?></h2>
                                </li>
                                <br>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_tea + eng_tea + sin_tea) as tea_count, sum(tam_tea) as tam_tea_tot, sum(sin_tea) as sin_tea_tot, sum(eng_tea) as eng_tea_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_tea = $row['tea_count'];
                                $tam_tea_tot = $row['tam_tea_tot'];
                                $sin_tea_tot = $row['sin_tea_tot'];
                                $eng_tea_tot = $row['eng_tea_tot'];
                                ?>
                                <li>Total No. of Teachers<h2><?php echo $count_tea; ?></h2>

                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium teachers">Sin. Med. Teachers</td>
                                            <td title="Total number of Tamil medium teachers">Tam. Med. Teachers</td>
                                            <td title="Total number of English medium teachers">Eng. Med. Teachers</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium teachers"><?php echo $sin_tea_tot; ?></th>
                                            <th title="Total number of Tamil medium teachers"><?php echo $tam_tea_tot; ?></th>
                                            <th title="Total number of English medium teachers"><?php echo $eng_tea_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_st + eng_st + sin_st) as st_count, sum(tam_st) as tam_tot, sum(sin_st) as sin_tot, sum(eng_st) as eng_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_st = $row['st_count'];
                                $tam_tot = $row['tam_tot'];
                                $sin_tot = $row['sin_tot'];
                                $eng_tot = $row['eng_tot'];
                                ?>
                                <br>
                                <li>Total No. of Students:<h2><?php echo $count_st; ?></h2>
                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium students">Sin. Med. Students</td>
                                            <td title="Total number of Tamil medium students">Tam. Med. Students</td>
                                            <td title="Total number of English medium students">Eng. Med. Students</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium students"><?php echo $sin_tot; ?></th>
                                            <th title="Total number of Tamil medium students"><?php echo $tam_tot; ?></th>
                                            <th title="Total number of English medium students"><?php echo $eng_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                            </ul>

                            <hr>
                            <div>
                                <a href="/schoolList/<?php echo $division_name; ?>" class="btn btn-light btn-xl">To The School profiles</a><br><br>
                                <a href="/examEvalution/<?php echo $division_name; ?>" class="btn btn-light btn-xl">Examination Evaluation</a>
                            </div>
                            <?php
                            $staff_id = '';
                            $staff_name = '';
                            $staff_grade = '';
                            $staff_email = '';
                            $staff_contact = '';
                            $staff_role = '';
                            $staff_img = '';
                            $staff_ava = '';
                            $staff_title = '';
                            ?>
                        </div>
                    </div>
                </div>





                <br>

            </div>
            <div class="row d-flex justify-content">
                <div class="col-md-3">
                    <?php
                    $division_name = 'Galagedara';
                    $result = $mysqli->query("SELECT * from div_staff WHERE div_head = '$division_name'") or header("location:" . $query_err_page);
                    while ($row = $result->fetch_assoc()) {
                        $staff_id = $row['staff_id'];
                        $staff_name = $row['staff_name'];
                        $staff_grade = $row['staff_grade'];
                        $staff_email = $row['staff_email'];
                        $staff_contact = $row['staff_contact'];
                        $staff_role = $row['staff_role'];
                        $staff_img = $row['staff_img'];
                        $staff_ava = $row['staff_ava'];
                        $staff_title = $row['staff_title'];
                    } ?>
                    <br>
                    <div class="card p-3 py-4 bg-primary text-light">
                        <div style="text-align: center;">
                            <h5 class="text-white mt-0"><span style="color:#ffd400; text-transform:uppercase;"><?php echo $division_name; ?></span><br> DIVISION</h5>
                        </div>
                        <hr>
                        <div class="center"> <img src="
                        <?php
                                            if ($staff_img == "") {
                                                echo "/default/default_pic.jpg";
                                            } else {
                                                echo $staff_img;
                                            }

                                            ?>" style="width: 120px;height:120px;" class="rounded-circle"> </div>
                        <div class="text-center mt-3">
                            <?php
                            if ($staff_ava == 'Available') : ?>
                                <span class="bg-success p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'Not Available') : ?>
                                <span class="bg-danger p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Study Leave') : ?>
                                <span class="bg-warning p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Maternity Leave') : ?>
                                <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>
                            <?php elseif ($staff_ava == 'On Personal Leave') : ?>
                                <span class="bg-info p-1 px-4 rounded text-white"><?php echo $staff_ava; ?></span>

                            <?php endif; ?>
                            <h5 class="mt-2 mb-0"><?php echo $staff_title . ' ' . $staff_name; ?></h5> <i>Divisional director - Harispaththuwa, Katugastota Zone, Sri Lanka</i>
                            <br><br>
                            <div style="text-align: center;">
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    <?php echo $staff_email; ?>
                                </p>
                                <p><i class="fas fa-phone me-3"></i><?php echo $staff_contact; ?></p>
                            </div>
                            <hr>
                            <?php
                            $result = $mysqli->query("SELECT count(*) as scl_count from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);
                            $row = $result->fetch_array();
                            $count_scl = $row['scl_count'];
                            ?>
                            <ul style="text-align: center;">
                                <li>Total No. of Schools<h2><?php echo $count_scl; ?></h2>
                                </li>
                                <br>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_tea + eng_tea + sin_tea) as tea_count, sum(tam_tea) as tam_tea_tot, sum(sin_tea) as sin_tea_tot, sum(eng_tea) as eng_tea_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_tea = $row['tea_count'];
                                $tam_tea_tot = $row['tam_tea_tot'];
                                $sin_tea_tot = $row['sin_tea_tot'];
                                $eng_tea_tot = $row['eng_tea_tot'];
                                ?>
                                <li>Total No. of Teachers<h2><?php echo $count_tea; ?></h2>

                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium teachers">Sin. Med. Teachers</td>
                                            <td title="Total number of Tamil medium teachers">Tam. Med. Teachers</td>
                                            <td title="Total number of English medium teachers">Eng. Med. Teachers</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium teachers"><?php echo $sin_tea_tot; ?></th>
                                            <th title="Total number of Tamil medium teachers"><?php echo $tam_tea_tot; ?></th>
                                            <th title="Total number of English medium teachers"><?php echo $eng_tea_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_st + eng_st + sin_st) as st_count, sum(tam_st) as tam_tot, sum(sin_st) as sin_tot, sum(eng_st) as eng_tot from school WHERE sch_div = '$division_name'") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_st = $row['st_count'];
                                $tam_tot = $row['tam_tot'];
                                $sin_tot = $row['sin_tot'];
                                $eng_tot = $row['eng_tot'];
                                ?>
                                <br>
                                <li>Total No. of Students:<h2><?php echo $count_st; ?></h2>
                                    <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                        <tr>
                                            <td title="Total number of Sinhala medium students">Sin. Med. Students</td>
                                            <td title="Total number of Tamil medium students">Tam. Med. Students</td>
                                            <td title="Total number of English medium students">Eng. Med. Students</td>
                                        </tr>
                                        <tr style="font-size:18px;">
                                            <th title="Total number of Sinhala medium students"><?php echo $sin_tot; ?></th>
                                            <th title="Total number of Tamil medium students"><?php echo $tam_tot; ?></th>
                                            <th title="Total number of English medium students"><?php echo $eng_tot; ?></th>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                            <hr>
                            <div>
                                <a href="/schoolList/<?php echo $division_name; ?>" class="btn btn-light btn-xl">To The School profiles</a><br><br>
                                <a href="/examEvalution/<?php echo $division_name; ?>" class="btn btn-light btn-xl">Examination Evaluation</a>
                            </div>
                            <?php
                            $staff_id = '';
                            $staff_name = '';
                            $staff_grade = '';
                            $staff_email = '';
                            $staff_contact = '';
                            $staff_role = '';
                            $staff_img = '';
                            $staff_ava = '';
                            $staff_title = '';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 ">
                    <br>
                    <div class="card p-3 py-4 bg-primary text-light">
                        <h2 class="text-white mt-0 center" style="text-align: center;"><span style="color:#ffd400;">WHOLE</span> ZONE</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-4" style="text-align: center;">
                                <?php
                                $result = $mysqli->query("SELECT count(*) as scl_count from school") or header("location:" . $query_err_page);
                                $row = $result->fetch_array();
                                $count_scl = $row['scl_count'];
                                ?>
                                <div class="mb-2 center" style="text-align: center;padding-top:30px;"><i class="fas fa-school fa-5x" style="width: 100px;"></i></div>
                                <span class="mb-2">Total No. of Schools</span>
                                <h1 class="text-light mb-0"><?php echo $count_scl; ?></h1>
                            </div>

                            <div class="col-md-4" style="text-align: center;">
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_tea + eng_tea + sin_tea) as tea_count, sum(tam_tea) as tam_tea_tot, sum(sin_tea) as sin_tea_tot, sum(eng_tea) as eng_tea_tot from school") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_tea = $row['tea_count'];
                                $tam_tea_tot = $row['tam_tea_tot'];
                                $sin_tea_tot = $row['sin_tea_tot'];
                                $eng_tea_tot = $row['eng_tea_tot'];
                                ?>
                                <div class="mb-2 center" style="text-align: center;padding-top:30px;"><i class="fas fa-chalkboard-teacher fa-5x" style="width: 100px;"></i></div>
                                <span class="mb-2">Total No. of Teachers</span>
                                <h1 class="text-light mb-0"><?php echo $count_tea; ?></h1>
                                <br>
                                <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                    <tr>
                                        <td title="Total number of Sinhala medium teachers">Sin. Med. Teachers</td>
                                        <td title="Total number of Tamil medium teachers">Tam. Med. Teachers</td>
                                        <td title="Total number of English medium teachers">Eng. Med. Teachers</td>
                                    </tr>
                                    <tr style="font-size:18px;">
                                        <th title="Total number of Sinhala medium teachers"><?php echo $sin_tea_tot; ?></th>
                                        <th title="Total number of Tamil medium teachers"><?php echo $tam_tea_tot; ?></th>
                                        <th title="Total number of English medium teachers"><?php echo $eng_tea_tot; ?></th>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-4" style="text-align: center;">
                                <?php
                                $result = $mysqli->query("SELECT sum(tam_st + eng_st + sin_st) as st_count,sum(tam_st) as tam_tot, sum(sin_st) as sin_tot, sum(eng_st) as eng_tot from school") or header("location:" . $query_err_page);

                                $row = $result->fetch_array();
                                $count_st = $row['st_count'];
                                $tam_tot = $row['tam_tot'];
                                $sin_tot = $row['sin_tot'];
                                $eng_tot = $row['eng_tot'];
                                ?>
                                <div class="mb-2 center" style="text-align: center;padding-top:30px;"><i class="fas fa-child fa-5x" style="width: 100px;"></i></div>
                                <span class="mb-2">Total No. of Students</span>
                                <h1 class="text-light mb-0"><?php echo $count_st; ?></h1>
                                <br>

                                <table style="border: 1px solid white; font-size:11px; text-align:center;">
                                    <tr style="text-align:center;">
                                        <td title="Total number of Sinhala medium students">Sin. Med. Students</td>
                                        <td title="Total number of Tamil medium students">Tam. Med. Students</td>
                                        <td title="Total number of English medium students">Eng. Med. Students</td>
                                    </tr>
                                    <tr style="font-size:18px;">
                                        <th title="Total number of Sinhala medium students"><?php echo $sin_tot; ?></th>
                                        <th title="Total number of Tamil medium students"><?php echo $tam_tot; ?></th>
                                        <th title="Total number of English medium students"><?php echo $eng_tot; ?></th>
                                    </tr>
                                </table>
                                </li>
                            </div>
                        </div>


                        <div class="row center" style="width: 60vw;">
                            <br><br>
                            <a href="/schoolList/<?php echo $division_name; ?>" class="btn btn-light btn-xl">To The School profiles</a><br><br>
                            <a href="/examEvalution/<?php echo $division_name; ?>" class="btn btn-light btn-xl">Examination Evaluation</a>
                        </div>
                    </div>
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
    <?php require_once 'main-footer.php'; ?>
    </body>

</html>