<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/process/relatedweb_process.php'); ?>

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


    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


   

    <!-- CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">


    <link rel="stylesheet" href="/includes/adminStyle/styles.css">


    <script>
        function openModal() {
            $('#myModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                window.location.assign('relatedweb_crud.php');
            });
            var url_string = window.location.href; //window.location.href
            var url = new URL(url_string);
            var c = url.searchParams.get("edit");
            if (c) {
                $('#myModal').modal('show');
            }

        }
    </script>
    <title>Director add</title>
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
    </style>
</head>


<body onload="openModal()">



    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;">
        <li class="breadcrumb-item"><a href="#">General</a></li>
        <li class="breadcrumb-item active" aria-current="page">Related websites</li>
    </ol>

    <?php
    if (isset($_SESSION['message']) || isset($_SESSION['error_up'])) : ?>

        <div style="display:flex; top:30px;" class="alert alert-<?= $_SESSION['msg_type'] ?> fade show" role="alert">


            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            <strong style="color: red;"><?php
                                        echo $_SESSION['error_up'];
                                        unset($_SESSION['error_up']);
                                        ?></strong>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="container">
        <?php
        $result = $mysqli->query("SELECT * from relatedweb ORDER BY id DESC") or die($mysqli->error);
        ?>
        <div class="breadtop" style="margin-bottom:5em;">
            <!-- Trigger the modal with a button -->
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#myModal">Add Realated Website</button>

            <table id="tbl" class="table table-bordered table-hover dt-responsive" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>URL</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td style="text-align: center;"><img src="<?php
                                                                        if ($row['image'] == "") {
                                                                            echo "/default/default_pic.jpg";
                                                                        } else {
                                                                            echo $row['image'];
                                                                        }

                                                                        ?>" style="width: 50px;  border:2px solid black; "></td>
                            <td><a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?></a></td>

                            <td style="width: 20%; text-align:center; padding-top:0.8em;">
                                <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                    <a href="relatedweb_crud.php?edit=<?php echo $row['id'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                </li>

                                <a href="/process/relatedweb_process.php?delete=<?php echo $row['id'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>


        </div>


        <!-- Modal update and add -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">


                        <?php
                        if ($update == true) :
                        ?>
                            <h4 class="modal-title">Edit Related Website</h4>

                        <?php else : ?>
                            <h4 class="modal-title">Add Related Website</h4>

                        <?php endif; ?>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="/process/relatedweb_process.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="ID" class="form-control" required>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter the title" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="url" name="url" class="form-control" value="<?php echo $url; ?>" placeholder="Enter the url" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>Upload image (To represent a website)</label>
                                    <input type="file" name="image" id="image" style="border: 2px black solid;padding:10px;">

                                    <p id="acfType"></p>
                                    <p id="acfSize"></p>

                                </div>
                                <div class="form-group" id="optimize_list" style="visibility: hidden; border:2px solid #000; padding:1em; border-radius:1em;">

                                    <input type="radio" id="disable_opt" name="optimization" value="disable_opt" disabled>
                                    <label> - Disable image optimization</label><br>
                                    <input type="radio" id="img_low_opt" name="optimization" value="low_opt" disabled>
                                    <label> - Enable low image optimization</label><br>
                                    <input type="radio" id="img_high_opt" name="optimization" value="high_opt" disabled>
                                    <label> - Enable higher image optimization</label>
                                </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <?php
                        if ($update == true) :
                        ?>
                            <button type="submit" class="btn btn-admin btn-xl" name="update">Edit</button>

                        <?php else : ?>
                            <button type="submit" class="btn btn-admin btn-xl" name="save">Save</button>

                        <?php endif; ?>
                        <a class="btn btn-light btn-xl" data-dismiss="modal">Close</a>
                    </div>

                    </form>

                </div>

            </div>
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
                    $('#optimize_list').css('visibility', 'visible');
                    $('#disable_opt').prop('disabled', false);
                    $('#img_low_opt').prop('checked', true);
                    $('#img_low_opt').prop('disabled', false);
                    $('#img_high_opt').prop('disabled', false);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#tbl').DataTable({

                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                "ordering": false
            });
        });
        //$('.alert').alert();
    </script>


    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Data table JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

</body>

</html>