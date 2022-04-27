<?php
/* prevent direct url acsses */
if (!isset($_SESSION['userId'])) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}
require_once 'php_action/db_connect_client.php';
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



    <script>
        function openModal() {
            $('#myModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                //$("input:text").val("Glenn Quagmire");
                window.location.assign('admin_staff_crud.php');
            });
            var url_string = window.location.href; //window.location.href
            var url = new URL(url_string);
            var c = url.searchParams.get("edit");
            if (c) {
                $('#myModal').modal('show');
            }

        }
    </script>
    <title>Administaion staff</title>
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

    <?php require_once 'process/admin_staff_process.php'; ?>


    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;">
        <li class="breadcrumb-item"><a href="#">Staff operations</a></li>
        <li class="breadcrumb-item active" aria-current="page">Administration staff</li>
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
        $result = $mysqli->query("SELECT * from admin_staff") or die($mysqli->error);
        ?>
        <div class="breadtop">
            <!-- Trigger the modal with a button -->
            <button type="button" style="margin: 2%;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Person</button>

            <table id="tbl" class="table table-bordered table-hover dt-responsive" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Role</th>
                        <th> Availability</th>
                        <th>Description</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['staff_id']; ?></td>
                            <td><img src="<?php
                                            if ($row['staff_img'] == "") {
                                                echo "default/default_pic.jpg";
                                            } else {
                                                echo $row['staff_img'];
                                            }

                                            ?>" style="width: 50px; height: 50px; border:2px solid black; border-radius:50%;"></td>
                            <td><?php echo $row['staff_title']; ?></td>
                            <td><?php echo $row['staff_name']; ?></td>
                            <td><?php echo $row['staff_grade']; ?></td>
                            <td><?php echo $row['staff_subject']; ?></td>
                            <td><?php echo $row['staff_email']; ?>
                                <br>
                                <a type="button" class="btn btn-outline-success" href="mailto:<?php echo $row['staff_email']; ?>">Send Email</a>
                            </td>
                            <td><?php echo $row['staff_contact']; ?> <br>
                                <a type="button" class="btn btn-outline-info" href="tel:<?php echo $row['staff_contact']; ?>">Contact Now</a>
                            </td>

                            <td><?php echo $row['staff_role']; ?></td>
                            <td>
                                <?php
                                if ($row['staff_ava'] == 'Available') : ?>
                                    <span class="label label-success"><?php echo $row['staff_ava']; ?></span>
                                <?php elseif ($row['staff_ava'] == 'Not Available') : ?>
                                    <span class="label label-danger"><?php echo $row['staff_ava']; ?></span>
                                <?php elseif ($row['staff_ava'] == 'On Study Leave') : ?>
                                    <span class="label label-warning"><?php echo $row['staff_ava']; ?></span>
                                <?php elseif ($row['staff_ava'] == 'On Maternity Leave') : ?>
                                    <span class="label label-primary"><?php echo $row['staff_ava']; ?></span>
                                <?php elseif ($row['staff_ava'] == 'On Personal Leave') : ?>
                                    <span class="label label-default"><?php echo $row['staff_ava']; ?></span>

                                <?php endif; ?>


                            </td>
                            <td>
                                <div style="width: 200px;">


                                    <?php echo $row['staff_des']; ?>

                                </div>
                            </td>
                            <td>
                                <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                    <a href="admin_staff_crud.php?edit=<?php echo $row['staff_id'] ?>" class="btn btn-info" style="display: inline !important;">Edit</a>
                                </li>

                                <a href="process/admin_staff_process.php?delete=<?php echo $row['staff_id'] ?>" class="btn btn-danger" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>


        </div>
        <?php
        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>

        <!-- Modal update and add -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">


                        <?php
                        if ($update == true) :
                        ?>
                            <h4 class="modal-title">Edit Administration Staff Member</h4>

                        <?php else : ?>
                            <h4 class="modal-title">Add Administration Staff Member</h4>

                        <?php endif; ?>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="process/admin_staff_process.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="acstaff_id" class="form-control" value="<?php echo $acstaff_id; ?>" placeholder="ID" class="form-control" required>
                                <div class="form-group">
                                    <label>Title</label>
                                    <select style="height:3%;" class="form-control" value="<?php echo $acstaff_title; ?>" name="acstaff_title" required>
                                        <option value="">~~NOT SELECTED~~</option>
                                        <option value="Ven." <?php if ($acstaff_title == 'Ven.') {
                                                                    echo 'selected';
                                                                }  ?>>Ven.</option>
                                        <option value="Mrs." <?php if ($acstaff_title == 'Mrs.') {
                                                                    echo 'selected';
                                                                }  ?>>Mrs.</option>
                                        <option value="Miss." <?php if ($acstaff_title == 'Miss.') {
                                                                    echo 'selected';
                                                                }  ?>>Miss.</option>
                                        <option value="Mr." <?php if ($acstaff_title == 'Mr.') {
                                                                echo 'selected';
                                                            }  ?>>Mr.</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="acstaff_name" class="form-control" value="<?php echo $acstaff_name; ?>" placeholder="Enter the name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Grade</label>
                                    <select id="acstaff_grade" style="height:3%;" class="form-control" value="<?php echo $acstaff_grade; ?>" name="acstaff_grade" required>
                                        <option value="">~~NOT SELECTED~~</option>
                                        <option value="SLTC1" <?php if ($acstaff_grade == 'SLTC1') {
                                                                    echo 'selected';
                                                                }  ?>>SLTC1</option>
                                        <option value="ISLTC2" <?php if ($acstaff_grade == 'SLTC2') {
                                                                    echo 'selected';
                                                                }  ?>>SLTC2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="acstaff_email" class="form-control" value="<?php echo $acstaff_email; ?>" placeholder="Enter the email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Telephone no.</label>
                                    <input type="tel" name="acstaff_contact" class="form-control" value="<?php echo $acstaff_contact; ?>" placeholder="Enter the contact number" class="form-control" required>
                                </div>


                                <?php
                                if ($update == true) :
                                ?>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="acstaff_des" name="acstaff_des" rows="3" placeholder="Enter the description" value="<?php echo $acstaff_des; ?>"><?php echo $_SESSION['txtdes']; ?>
                                </textarea>

                                    <?php else : ?>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="acstaff_des" name="acstaff_des" rows="3" placeholder="Enter the description" value="<?php echo $acstaff_des; ?>"></textarea>

                                        <?php endif; ?>




                                        </div>


                                        <div class="form-group">
                                            <label>Job Role</label>
                                            <select id="acstaff_role" style="height:3%;" class="form-control" value="<?php echo $acstaff_role; ?>" name="acstaff_role" required>
                                                <option value="">~~NOT SELECTED~~</option>
                                                <option value="Subject director" <?php if ($acstaff_role == 'Subject director') {
                                                                                        echo 'selected';
                                                                                    } ?>>Subject Director</option>
                                                <option value="ISA(In service advicer)" <?php if ($acstaff_role == 'ISA(In service advicer)') {
                                                                                            echo 'selected';
                                                                                        }  ?>>ISA</option>
                                                <?php
                                                //con

                                                $result_role = $mysqli->query("SELECT * from role WHERE category = 'Administration'") or die($mysqli->error);
                                                ?>
                                                <?php while ($row = $result_role->fetch_assoc()) : ?>


                                                    <option value="<?php echo $row['role_name']; ?>" <?php if ($acstaff_role == $row['role_name']) {
                                                                                                            echo 'selected';
                                                                                                        }  ?>><?php echo $row['role_name']; ?></option>

                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select the subject</label>
                                            <select id="acstaff_subject" style="height:3%;" class="form-control" value="<?php echo $acstaff_subject; ?>" name="acstaff_subject" required>
                                                <option value="">~~NOT SELECTED~~</option>
                                                <option value="English" <?php if ($acstaff_subject == 'English') {
                                                                            echo 'selected';
                                                                        }  ?>>English</option>
                                                <option value="History" <?php if ($acstaff_subject == 'History') {
                                                                            echo 'selected';
                                                                        }  ?>>History</option>

                                                <?php
                                                //con

                                                $result_subject = $mysqli->query("SELECT * from subject WHERE category = 'Administration'") or die($mysqli->error);
                                                ?>
                                                <?php while ($row = $result_subject->fetch_assoc()) : ?>


                                                    <option value="<?php echo $row['sub_name']; ?>" <?php if ($acstaff_role == $row['sub_name']) {
                                                                                                        echo 'selected';
                                                                                                    }  ?>><?php echo $row['sub_name']; ?></option>

                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Availability</label>
                                            <select style="height:3%;" class="form-control" value="<?php echo $acstaff_ava; ?>" name="acstaff_ava" required>
                                                <option value="">~~NOT SELECTED~~</option>
                                                <option value="Available" <?php if ($acstaff_ava == 'Available') {
                                                                                echo 'selected';
                                                                            }  ?>>Available</option>
                                                <option value="Not Available" <?php if ($acstaff_ava == 'Not Available') {
                                                                                    echo 'selected';
                                                                                }  ?>>Not Available</option>
                                                <option value="On Study Leave" <?php if ($acstaff_ava == 'On Study Leave') {
                                                                                    echo 'selected';
                                                                                }  ?>>On Study Leave</option>
                                                <option value="On Maternity Leave" <?php if ($acstaff_ava == 'On Maternity Leave') {
                                                                                        echo 'selected';
                                                                                    }  ?>>On Maternity Leave</option>
                                                <option value="On Personal Leave" <?php if ($acstaff_ava == 'On Personal Leave') {
                                                                                        echo 'selected';
                                                                                    }  ?>>On Personal Leave</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload image</label>
                                            <input type="file" name="acstaff_img" id="acstaff_img" style="border: 2px black solid;padding:10px;">
                                            <p id="acfName"></p>
                                            <p id="acfType"></p>
                                            <p id="acfSize"></p>
                                            <p id="acfPath"></p>
                                        </div>

                                    </div>

                        </div>
                        <div class="modal-footer">
                            <?php
                            if ($update == true) :
                            ?>
                                <button type="submit" class="btn btn-primary" name="update">Edit</button>

                            <?php else : ?>
                                <button type="submit" class="btn btn-primary" name="save">Save</button>

                            <?php endif; ?>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                    if (fileType != "image/jpeg" && fileType != "image/gif" && fileType != "image/tiff" && fileType != "image/bmp" && fileType != "image/gif" && fileType != "image/png") {
                        alert("The file is not valid image file - Try again!");
                        $('#acstaff_img').val('');
                        document.getElementById("acfName").innerHTML = "";
                        document.getElementById("acfType").innerHTML = "";
                        document.getElementById("acfSize").innerHTML = "";
                        document.getElementById("acfPath").innerHTML = "";
                    } else if (fileSize > 2000000) {
                        alert("Long file, You can't submit more than 2MB file - Try again!");
                        $('#acstaff_img').val('');
                        document.getElementById("acfName").innerHTML = "";
                        document.getElementById("acfType").innerHTML = "";
                        document.getElementById("acfSize").innerHTML = "";
                        document.getElementById("acfPath").innerHTML = "";
                    } else {
                        document.getElementById("acfName").innerHTML = "Upload: " + fileName;
                        document.getElementById("acfType").innerHTML = "Type: " + fileType;
                        document.getElementById("acfSize").innerHTML = "Size: " + fileSize * 0.001 + "KB";
                        document.getElementById("acfPath").innerHTML = "Stored in: " + fileLocation;
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
                    responsive: true

                });
            });
            //$('.alert').alert();
        </script>

</body>

</html>