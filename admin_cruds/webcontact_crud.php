<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/process/webcontact_process.php'); ?>

<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/php_action/db_connect_client.php');

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

    <title>Website Contacts</title>
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

    $resultU = $mysqli->query("SELECT * FROM contacts") or die($mysqli->error);
    while ($row = $resultU->fetch_assoc()) {
        ${$row['name']} =  $row['content'];
    }

    ?>



    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;">
        <li class="breadcrumb-item"><a href="#">General</a></li>
        <li class="breadcrumb-item active" aria-current="page">Zonal Contacts</li>
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

    <div class="container" style="padding-top: 5%; padding-bottom: 5%;">

        
        <div class="row" style="margin-left: 5%;">

            <h3>Zonal Contacts</h3>
            <div class="card col-4 cardp cardm">
                <form action="/process/webcontact_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Organizational Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Enter the organizational address" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-light btn-xl" name="address_save">Save</button>
                    </div>
                </form>
            </div>
            <div class="card col-4 cardp cardm">
                <form action="/process/webcontact_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Organizational Phone Number</label>
                        <input type="tel" name="pno" class="form-control" value="<?php echo $pno; ?>" placeholder="Enter the organizational T.P" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-light btn-xl" name="pno_save">Save</button>
                    </div>
                </form>
            </div>
            <div class="card col-4 cardp cardm">
                <form action="/process/webcontact_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Organizational Fax Number</label>
                        <input type="tel" name="fax" class="form-control" value="<?php echo $fax; ?>" placeholder="Enter the fax" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-light btn-xl" name="fax_save">Save</button>
                    </div>
                </form>
            </div>
            <div class="card col-4 cardp cardm">
                <form action="/process/webcontact_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Organizational Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter the email" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-light btn-xl" name="email_save">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row" style="margin-left: 5%;">
            <h3>Organization's Social Media Contacts</h3>
            <div class="card col-4 cardp cardm">
                <form action="/process/webcontact_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="url" name="facebook" class="form-control" value="<?php echo $facebook; ?>" placeholder="Enter the facebook URL" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-light btn-xl" name="facebook_save">Save</button>
                    </div>
                </form>
            </div>
            <div class="card col-4 cardp cardm">
                <form action="/process/webcontact_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>LinkedIn</label>
                        <input type="url" name="linkedin" class="form-control" value="<?php echo $linkedin; ?>" placeholder="Enter the linkedin URL" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-light btn-xl" name="linkedin_save">Save</button>
                    </div>
                </form>
            </div>
            <div class="card col-4 cardp cardm">
                <form action="/process/webcontact_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>YouTube</label>
                        <input type="url" name="youtube" class="form-control" value="<?php echo $youtube; ?>" placeholder="Enter the YouTube URL" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-light btn-xl" name="youtube_save">Save</button>
                    </div>
                </form>
            </div>
            <div class="card col-4 cardp cardm">
                <form action="/process/webcontact_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="url" name="twitter" class="form-control" value="<?php echo $twitter; ?>" placeholder="Enter the Twitter URL" class="form-control">
                        <br>
                        <button type="submit"class="btn btn-light btn-xl" name="twitter_save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    

    </div>

</body>

</html>