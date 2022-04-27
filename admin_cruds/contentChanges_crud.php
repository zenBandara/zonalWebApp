<?php require_once ($_SERVER['DOCUMENT_ROOT'] .'/process/contentChanges_process.php'); ?>

<?php


require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');

/* prevent direct url acsses */
if (!isset($_SESSION['userId'])) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>



    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Data table JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>



    <!-- CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/includes/adminStyle/styles.css">

    <title>Content Changes</title>
    <style>
        .breadtop {
            margin-top: 5%;
        }

        @media screen and (max-width: 767px) {
            .breadtop {
                margin-top: 12%;
            }
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
            padding-top: 40px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.3);
            border: 1px solid black;
            background: rgb(41, 41, 41);
            border-radius: 10px;

        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            height: 30px;
            width: 8px;
            border: 1px solid black;
            background: rgb(111, 111, 111);
            -webkit-box-shadow: 0 1px 1px rgb(0, 0, 0);
            background: -webkit-linear-gradient(brown, rgb(150, 150, 150));
        }

        ::-webkit-scrollbar-track-piece {
            height: 30px;
            width: 30px;
        }

        .cardp {
            padding: 2%;
            background-color: #661414;
            border-radius: 2em;
            color:#fff;
        }

        .cardm {
            margin: 0.5%;
        }
    </style>
</head>


<body>
    <?php

    $resultU = $mysqli->query("SELECT * FROM zone_dir") or die($mysqli->error);
    while ($row = $resultU->fetch_assoc()) {
        $name = $row['name'];
        $address = $row['address'];
        $email = $row['email'];
        $tel = $row['tel'];
        $dir_word = $row['dir_word'];
        $title = $row['title'];
        $img_loc = $row['img_path'];
        $ava = $row['ava'];
        $description = $row['descrip'];
        $grade = $row['grade'];
    }

    ?>



    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;">
        <li class="breadcrumb-item"><a href="#">General</a></li>
        <li class="breadcrumb-item active" aria-current="page">Zonal Director Info.</li>
    </ol>
    <?php
    if (isset($_SESSION['message']) && isset($_SESSION['error_up'])) : ?>

        <div style="display:flex; top:30px;" class="alert alert-<?= $_SESSION['msg_type'] ?> fade show" role="alert">


            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>


            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="container" style="padding-top: 5%; display:block; width:60%">

        <h3>Zonal Director's Info.</h3>
        <div class="card cardp cardm" style="padding: 5%;">
            <form action="/process/contentChanges_process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div style="text-align:center;">
                        <label>Photo</label>
                        <br>
                        <img src="<?php echo $img_loc ?>" style="width: 100px; height: 100px; border:2px solid black; border-radius:50%;">
                        <br>
                        <br>
                    </div>
                    <div style="text-align:right;">
                        <input type="file" name="img" class="form-control" value="<?php echo $img; ?>" class="form-control" style="width: 50%;">
                    </div>
                    <br>
                    <div class="form-group">
            
                        <p id="acfType"></p>
                        <p id="acfSize"></p>

                    </div>

                    <br>
                    <div class="form-group" id="optimize_list" style="display: none; border:2px solid #000; padding:1em; border-radius:1em;">

                        <input type="radio" id="disable_opt" name="optimization" value="disable_opt" disabled>
                        <label> - Disable image optimization</label><br>
                        <input type="radio" id="img_low_opt" name="optimization" value="low_opt" disabled>
                        <label> - Enable low image optimization</label><br>
                        <input type="radio" id="img_high_opt" name="optimization" value="high_opt" disabled>
                        <label> - Enable higher image optimization</label>
                    </div>

                    <label>Title</label>
                    <select style="height:3%; width:7em;" class="form-control" value="<?php echo $title; ?>" name="title" required>
                        <option value="">~~NOT SELECTED~~</option>
                        <option value="Ven." <?php if ($title == 'Ven.') {
                                                    echo 'selected';
                                                }  ?>>Ven.</option>
                        <option value="Mrs." <?php if ($title == 'Mrs.') {
                                                    echo 'selected';
                                                }  ?>>Mrs.</option>
                        <option value="Miss." <?php if ($title == 'Miss.') {
                                                    echo 'selected';
                                                }  ?>>Miss.</option>
                        <option value="Mr." <?php if ($title == 'Mr.') {
                                                echo 'selected';
                                            }  ?>>Mr.</option>

                    </select>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter the name" class="form-control" required>
                    <br>
                    <label>Availability</label>
                    <select style="height:3%;" class="form-control" value="<?php echo $ava; ?>" name="ava" required>
                        <option value="">~~NOT SELECTED~~</option>
                        <option value="Available" <?php if ($ava == 'Available') {
                                                        echo 'selected';
                                                    }  ?>>Available</option>
                        <option value="Not Available" <?php if ($ava == 'Not Available') {
                                                            echo 'selected';
                                                        }  ?>>Not Available</option>
                        <option value="On Study Leave" <?php if ($ava == 'On Study Leave') {
                                                            echo 'selected';
                                                        }  ?>>On Study Leave</option>
                        <option value="On Maternity Leave" <?php if ($ava == 'On Maternity Leave') {
                                                                echo 'selected';
                                                            }  ?>>On Maternity Leave</option>
                        <option value="On Personal Leave" <?php if ($ava == 'On Personal Leave') {
                                                                echo 'selected';
                                                            }  ?>>On Personal Leave</option>
                    </select>
                    <br>
                    <label>Grade</label>
                    <select id="grade" style="height:3%;" class="form-control" value="<?php echo $grade; ?>" name="grade" required>
                        <option value="">~~NOT SELECTED~~</option>
                        <option value="SLTC1" <?php if ($grade == 'SLTC1') {
                                                    echo 'selected';
                                                }  ?>>SLTC1</option>
                        <option value="SLTC2" <?php if ($grade == 'SLTC2') {
                                                    echo 'selected';
                                                }  ?>>SLTC2</option>

                        <?php
                        //con

                        $result_grade = $mysqli->query("SELECT * from grade WHERE category = 'Zonal Director' or category = 'All' ") or die($mysqli->error);
                        ?>
                        <?php while ($row = $result_grade->fetch_assoc()) : ?>


                            <option value="<?php echo $row['grade_name']; ?>" <?php if ($grade == $row['grade_name']) {
                                                                                    echo 'selected';
                                                                                }  ?>><?php echo $row['grade_name']; ?></option>

                        <?php endwhile; ?>
                    </select>
                    <br>
                    <label>Organizational Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Enter the address" class="form-control" required>
                    <br>
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter the Email address" class="form-control" required>
                    <br>
                    <label>Telephone number</label>
                    <input type="tel" name="tel" class="form-control" value="<?php echo $tel; ?>" placeholder="Enter the telephone number" class="form-control" required>
                    <br>
                    <label>Word of Zonal Director</label>
                    <textarea class="form-control" name="dir_word" rows="4" placeholder="Enter the word of the zonal director" value="<?php echo $dir_word; ?>"><?php echo $dir_word; ?>
                        </textarea>
                    <br>
                    <label>Description</label>
                    <textarea class="form-control" name="desc" rows="5" placeholder="Enter the Desc" value="<?php echo $description; ?>"><?php echo $description; ?>
                        </textarea>
                    <br>
                    <button type="submit" class="btn btn-light btn-xl" name="save">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                var fileType = e.target.files[0].type;
                var fileSize = e.target.files[0].size;
                var fileLocation = "Uploads/" + fileName;
                if (fileType != "image/jpeg" && fileType != "image/bmp" && fileType != "image/gif" && fileType != "image/png") {
                    alert("The file is not valid image file - Try again!");
                    $('#image').val('');
                    document.getElementById("acfName").innerHTML = "";
                    document.getElementById("acfType").innerHTML = "";
                    document.getElementById("acfSize").innerHTML = "";
                    document.getElementById("acfPath").innerHTML = "";
                } else if (fileSize > 4000000) {
                    alert("Long file, You can't submit more than 4MB file - Try again!");
                    $('#image').val('');
                    document.getElementById("acfName").innerHTML = "";
                    document.getElementById("acfType").innerHTML = "";
                    document.getElementById("acfSize").innerHTML = "";
                    document.getElementById("acfPath").innerHTML = "";
                } else {

                    document.getElementById("acfType").innerHTML = "Type: " + fileType;
                    document.getElementById("acfSize").innerHTML = "Size: " + fileSize * 0.001 + "KB";

                    //image optimization features
                    $('#optimize_list').css('display', 'block');
                    $('#disable_opt').prop('disabled', false);
                    $('#img_low_opt').prop('checked', true);
                    $('#img_low_opt').prop('disabled', false);
                    $('#img_high_opt').prop('disabled', false);
                }
            });
        });
    </script>

</body>

</html>