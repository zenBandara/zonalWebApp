<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/process/image_process.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php_action/db_connect_client.php');

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


    <script>
        function openModal() {
            $('#myModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                window.location.assign('image_crud.php');
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
        <li class="breadcrumb-item"><a href="#">Resources</a></li>
        <li class="breadcrumb-item active" aria-current="page">Image gallery</li>
    </ol>


    <?php
    if (isset($_SESSION['message'])) : ?>

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
        $result = $mysqli->query("SELECT * from img_gallery order by id DESC") or die($mysqli->error);
        ?>
        <div class="breadtop" style="margin-bottom:5em;">
            <!-- Trigger the modal with a button -->
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#myModal">Add image</button>

            <table id="tbl" class="table" style=" width: 100%; border:none; ">
                <thead style="visibility: hidden;">
                    <tr>

                        <th>Title</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>

                        <tr>
                            <td>
                                <div class="card" style="padding:1em;background-color:#661414; color:#fff; border-radius:3rem">
                                    <div class="row">
                                        <div class="col-lg-3" style="text-align: center; padding:1em;">

                                            <div style="width: 150px;height: 150px;  overflow: hidden; border: 2px solid #fff;border-radius:1em;">
                                                <img class="center" src="<?php
                                                                            if ($row['img_path'] == "") {
                                                                                echo "/default/default_pic.jpg";
                                                                            } else {
                                                                                echo $row['img_path'];
                                                                            }

                                                                            ?>">
                                            </div>

                                        </div>
                                        <div class="col-lg-8">
                                            <div style="text-align: left;">

                                                <div>

                                                    <h4><?php echo $row['img_title']; ?></h4>

                                                    <h5 style="color:#bdbdbd;"><strong>Category - </strong><?php echo $row['category']; ?></h5>




                                                </div>

                                                <br>
                                                <div style="text-align: right;">
                                                    <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                                        <a href="image_crud.php?edit=<?php echo $row['id'] ?>" class="btn btn-light btn-xl" style="display: inline !important;">Edit</a>
                                                    </li>

                                                    <li style="display: inline !important;">
                                                        <a href="/process/image_process.php?delete=<?php echo $row['id'] ?>" class="btn btn-light btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
                                                    </li>

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


        <!-- Modal update and add -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">


                        <?php
                        if ($update == true) :
                        ?>
                            <h4 class="modal-title">Edit Image</h4>

                        <?php else : ?>
                            <h4 class="modal-title">Add Image</h4>

                        <?php endif; ?>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="/process/image_process.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="ID" class="form-control" required>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="img_title" class="form-control" value="<?php echo $img_title; ?>" placeholder="Enter the title" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>Category</label>
                                    <select id="category" style="height:3%;" class="form-control" value="<?php echo $category; ?>" name="category" required>
                                        <option value="">~~NOT SELECTED~~</option>
                                        <option value="Home page images" <?php if ($category == "Home page images") {
                                                                                echo 'selected';
                                                                            }  ?>>Home page images</option>
                                        <?php
                                        //con

                                        $result_role = $mysqli->query("SELECT * from res_category WHERE section	 = 'Image gallery'") or die($mysqli->error);
                                        ?>
                                        <?php while ($row = $result_role->fetch_assoc()) : ?>


                                            <option value="<?php echo $row['res_cat']; ?>" <?php if ($category == $row['res_cat']) {
                                                                                                echo 'selected';
                                                                                            }  ?>><?php echo $row['res_cat']; ?></option>

                                        <?php endwhile; ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Upload image</label>
                                    <input type="file" name="gal_img" id="gal_img" style="border: 2px black solid;padding:10px;">
                                    <p id="acfName"></p>
                                    <p id="acfType"></p>
                                    <p id="acfSize"></p>
                                    <p id="acfPath"></p>
                                </div>
                                <div class="form-group" id="optimize_list" style="visibility: hidden; border:2px solid #000; padding:1em; border-radius:1em;">

                                    <input type="radio" id="disable_opt" name="optimization" value="disable_opt" disabled>
                                    <label> - Enable low image optimization</label><br>
                                    <input type="radio" id="img_low_opt" name="optimization" value="low_opt" disabled>
                                    <label> - Enable basic image optimization</label><br>
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
                if (fileType != "image/jpeg"  && fileType != "image/bmp" && fileType != "image/gif" && fileType != "image/png" && fileType != "image/webp") {
                    alert("The file is not valid image file - Try again!");
                    $('#gal_img').val('');
                    document.getElementById("acfName").innerHTML = "";
                    document.getElementById("acfType").innerHTML = "";
                    document.getElementById("acfSize").innerHTML = "";
                    document.getElementById("acfPath").innerHTML = "";
                } else if (fileSize > 4000000) {
                    alert("Long file, You can't submit more than 4MB file - Try again!");
                    $('#gal_img').val('');
                    
                    document.getElementById("acfType").innerHTML = "";
                    document.getElementById("acfSize").innerHTML = "";
                 
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

</body>

</html>