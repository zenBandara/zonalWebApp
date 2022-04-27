<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/process/additional_process.php'); ?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/php_action/db_connect_client.php');

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

    $result_vision = $mysqli->query("SELECT * FROM contacts WHERE name = 'vision'") or die($mysqli->error);
    $row_vision = $result_vision->fetch_array();
    $vision = $row_vision['content'];

    $result_mission = $mysqli->query("SELECT * FROM contacts WHERE name = 'mission'") or die($mysqli->error);
    $row_mission = $result_mission->fetch_array();
    $mission = $row_mission['content'];
    
       
    ?>



    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;">
        <li class="breadcrumb-item"><a href="#">General</a></li>
        <li class="breadcrumb-item active" aria-current="page">Content Changes</li>
    </ol>
    <?php
    if (isset($_SESSION['message'])) : ?>

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

        <div class="card cardp cardm" style="padding: 5%;">
            <form action="/process/additional_process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    <label>Vision</label>
                    <textarea class="form-control" name="vision" rows="4" placeholder="Enter the vision here..." value="<?php echo $vision; ?>"><?php echo $vision; ?></textarea>
                    <br>
                    <label>Mission</label>
                    <textarea class="form-control" name="mission" rows="5" placeholder="Enter the mission here..." value="<?php echo $mission; ?>"><?php echo $mission; ?></textarea>
                    <br>
                    <button type="submit" class="btn btn-light btn-xl" name="save">Save</button>
                </div>
            </form>
        </div><br>

        <div class="card cardp cardm" style="padding: 5%;">
            <form action="/process/homeImg_process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    <label>Home Page's Main Image</label><br>
                    <img src="/assets/img/bg-masthead.webp" alt="home page image" style="width: 20em; margin:1em;">
                   
                    <div style="text-align:right;">
                        <input type="file" name="homeImg" id="homeImg" class="form-control" value="<?php echo $img; ?>" class="form-control" style="width: 50%;">
                    </div>
                    <br>
                    <div class="form-group">
            
                        <p id="acfType"></p>
                        <p id="acfSize"></p>

                    </div>

                    <br>
                    <div class="form-group" id="optimize_list" style="display: none; border:2px solid #fff; padding:1em; border-radius:1em; color:#fff;">

                        <input type="radio" id="disable_opt" name="optimization" value="disable_opt" disabled>
                        <label> - Disable image optimization</label><br>
                        <input type="radio" id="img_low_opt" name="optimization" value="low_opt" disabled>
                        <label> - Enable low image optimization</label><br>
                        <input type="radio" id="img_high_opt" name="optimization" value="high_opt" disabled>
                        <label> - Enable higher image optimization</label>
                    </div>
                    <br>
                    
                    <button type="submit" class="btn btn-light btn-xl" name="save">Save</button>
                </div>
            </form>
        </div>
    </div>
    <br><br>

    <script>
        $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                var fileType = e.target.files[0].type;
                var fileSize = e.target.files[0].size;
                var fileLocation = "Uploads/" + fileName;
                if (fileType != "image/jpeg" && fileType != "image/bmp" && fileType != "image/gif" && fileType != "image/png" && fileType != "image/webp") {
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