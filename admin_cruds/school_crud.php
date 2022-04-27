<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/process/school_process.php'); ?>
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


    <!-- jquery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Datatable JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    

    <!-- CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Data table JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/includes/adminStyle/styles.css">




    <script>
        function openModal() {
            $('#myModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                window.location.assign('school_crud.php');
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
        <li class="breadcrumb-item"><a href="#">Schools</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add school</li>
    </ol>


    <?php
    if (isset($_SESSION['message']) && isset($_SESSION['error_up'])) : ?>

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
        $result = $mysqli->query("SELECT * from school ORDER BY created_time DESC") or die($mysqli->error);
        ?>
        <div class="breadtop">
            <!-- Trigger the modal with a button -->
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#myModal">Add school</button>

            <table id="tbl" class="table table-bordered table-hover dt-responsive" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th>Census No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Division</th>
                        <th>Name of the principal</th>
                        <th>Available grades</th>
                        <th>Email</th>
                        <th>School adderess</th>
                        <th>School telephone</th>
                        <th>School type</th>
                        <th>Sinhala medium students</th>
                        <th>Tamil medium students</th>
                        <th>English medium students</th>
                        <th>Sinhala medium teachers</th>
                        <th>Tamil medium teachers</th>
                        <th>English medium teachers</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['census_no']; ?></td>
                            <td><img src="<?php
                                            if ($row['sch_img'] == "") {
                                                echo "default/default_pic.jpg";
                                            } else {
                                                echo $row['sch_img'];
                                            }

                                            ?>" style="width: 50px; height: 50px; border:2px solid black; border-radius:50%;"></td>
                            <td><?php echo $row['sch_name']; ?></td>
                            <td><?php echo $row['sch_div']; ?></td>
                            <td><?php echo $row['principal_title'] . $row['sch_principal']; ?></td>
                            <td><?php echo $row['sch_grades']; ?></td>
                            <td><?php echo $row['sch_email']; ?>
                                <br>
                                <a type="button" class="btn btn-outline-success" href="mailto:<?php echo $row['sch_email']; ?>">Send Email</a>
                            </td>
                            <td><?php echo $row['sch_address']; ?></td>
                            <td><?php echo $row['sch_tel']; ?> <br>
                                <a type="button" class="btn btn-outline-info" href="tel:<?php echo $row['sch_tel']; ?>">Contact Now</a>
                            </td>

                            <td><?php echo $row['sch_type']; ?></td>

                            <td><?php echo $row['sin_st']; ?></td>
                            <td><?php echo $row['tam_st']; ?></td>
                            <td><?php echo $row['eng_st']; ?></td>

                            <td><?php echo $row['sin_tea']; ?></td>
                            <td><?php echo $row['tam_tea']; ?></td>
                            <td><?php echo $row['eng_tea']; ?></td>

                            <td>
                                <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                    <a href="school_crud.php?edit=<?php echo $row['census_no'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                </li>

                                <a href="/process/school_process.php?delete=<?php echo $row['census_no'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br><br>
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
                            <h4 class="modal-title">Edit School Details</h4>

                        <?php else : ?>
                            <h4 class="modal-title">Add School</h4>

                        <?php endif; ?>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="/process/school_process.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Census No.</label>
                                    <input type="number" name="census_no" class="form-control" value="<?php echo $census_no; ?>" placeholder="Enter census No." class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="sch_name" class="form-control" value="<?php echo $sch_name; ?>" placeholder="Enter the name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Division</label>
                                    <select style="height:3%;" class="form-control" value="<?php echo $sch_div; ?>" name="sch_div" required>
                                        <option value="">~~NOT SELECTED~~</option>
                                        <option value="Poojapitiya" <?php if ($sch_div == 'Poojapitiya') {
                                                                        echo 'selected';
                                                                    }  ?>>Poojapitiya</option>
                                        <option value="Harispaththuwa" <?php if ($sch_div == 'Harispaththuwa') {
                                                                            echo 'selected';
                                                                        }  ?>>Harispaththuwa</option>
                                        <option value="Galagedara" <?php if ($sch_div == 'Galagedara') {
                                                                        echo 'selected';
                                                                    }  ?>>Galagedara</option>
                                        <option value="Hatharaliyadda" <?php if ($sch_div == 'Hatharaliyadda') {
                                                                            echo 'selected';
                                                                        }  ?>>Hatharaliyadda</option>
                                        <option value="Akurana" <?php if ($sch_div == 'Akurana') {
                                                                    echo 'selected';
                                                                }  ?>>Akurana</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Principal details</label>
                                    <hr style="margin: 0;">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Title</label>
                                            <select style="height:35px;" class="form-control" value="<?php echo $principal_title; ?>" name="principal_title" required>
                                                <option value="">~~NOT SELECTED~~</option>
                                                <option value="Ven." <?php if ($principal_title == 'Ven.') {
                                                                            echo 'selected';
                                                                        }  ?>>Ven.</option>
                                                <option value="Mrs." <?php if ($principal_title == 'Mrs.') {
                                                                            echo 'selected';
                                                                        }  ?>>Mrs.</option>
                                                <option value="Miss." <?php if ($principal_title == 'Miss.') {
                                                                            echo 'selected';
                                                                        }  ?>>Miss.</option>
                                                <option value="Mr." <?php if ($principal_title == 'Mr.') {
                                                                        echo 'selected';
                                                                    }  ?>>Mr.</option>

                                            </select>
                                        </div>
                                        <div class="col-md-10">
                                            <label>Principal's name</label>
                                            <input type="text" name="sch_principal" class="form-control" value="<?php echo $sch_principal; ?>" placeholder="Enter the Principal's name" class="form-control" required>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label>School grades(sp.)</label>
                                    <select style="height:35px;" class="form-control" value="<?php echo $sch_grades; ?>" name="sch_grades" required>
                                        <option value="">~~NOT SELECTED~~</option>
                                        <option value="1-13" <?php if ($sch_grades == '1-13') {
                                                                    echo 'selected';
                                                                }  ?>>1-13</option>
                                        <option value="6-13" <?php if ($sch_grades == '6-13') {
                                                                    echo 'selected';
                                                                }  ?>>6-13</option>
                                        <option value="1-11" <?php if ($sch_grades == '1-11') {
                                                                    echo 'selected';
                                                                }  ?>>1-11</option>
                                        <option value="1-5" <?php if ($sch_grades == '1-5') {
                                                                echo 'selected';
                                                            }  ?>>1-5</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>School Email</label>
                                    <input type="email" name="sch_email" class="form-control" value="<?php echo $sch_email; ?>" placeholder="Enter the email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>School Address</label>
                                    <input type="text" name="sch_address" class="form-control" value="<?php echo $sch_address; ?>" placeholder="Enter the school's address" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>School's telephone no.</label>
                                    <input type="tel" name="sch_tel" class="form-control" value="<?php echo $sch_tel; ?>" placeholder="Enter the telephone number" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>Type</label>
                                    <select id="sch_type" style="height:35px;" class="form-control" value="<?php echo $sch_type; ?>" name="sch_type" required>
                                        <option value="">~~NOT SELECTED~~</option>
                                        <option value="1AB-type" <?php if ($sch_type == '1AB-type') {
                                                                        echo 'selected';
                                                                    }  ?>>1AB-type</option>
                                        <option value="1C-type" <?php if ($sch_type == '1C-type') {
                                                                    echo 'selected';
                                                                }  ?>>1C-type</option>
                                        <option value="2-type" <?php if ($sch_type == '2-type') {
                                                                    echo 'selected';
                                                                }  ?>>2-type</option>
                                        <option value="3-type" <?php if ($sch_type == '3-type') {
                                                                    echo 'selected';
                                                                }  ?>>3-type</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Student details</label>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4"><label>No.of Sinhala medium students</label><input type="number" name="sin_st" class="form-control" value="<?php echo $sin_st; ?>" placeholder="Sinhala medium students" class="form-control" required></div>
                                        <div class="col-md-4"><label>No.of Tamil medium students</label><input type="number" name="tam_st" class="form-control" value="<?php echo $tam_st; ?>" placeholder="Tamil medium students" class="form-control" required></div>
                                        <div class="col-md-4"><label>No.of English medium students</label><input type="number" name="eng_st" class="form-control" value="<?php echo $eng_st; ?>" placeholder="English medium students" class="form-control" required></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tearcher details</label>
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-4"><label>No.of Sinhala medium teachers</label><input type="number" name="sin_tea" class="form-control" value="<?php echo $sin_tea; ?>" placeholder="Sinhala medium teachers" class="form-control" required></div>
                                        <div class="col-md-4"><label>No.of Tamil medium teachers</label><input type="number" name="tam_tea" class="form-control" value="<?php echo $tam_tea; ?>" placeholder="Tamil medium teachers" class="form-control" required></div>
                                        <div class="col-md-4"><label>No.of English medium teachers</label><input type="number" name="eng_tea" class="form-control" value="<?php echo $eng_tea; ?>" placeholder="English medium teachers" class="form-control" required></div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Upload image</label>
                                    <input type="file" name="sch_img" id="sch_img" style="border: 2px black solid;padding:10px;">

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
                    $('#sch_img').val('');
                    document.getElementById("acfName").innerHTML = "";
                    document.getElementById("acfType").innerHTML = "";
                    document.getElementById("acfSize").innerHTML = "";
                    document.getElementById("acfPath").innerHTML = "";
                } else if (fileSize > 2000000) {
                    alert("Long file, You can't submit more than 2MB file - Try again!");
                    $('#sch_img').val('');
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



</body>

</html>