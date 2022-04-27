<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/process/eval_process.php'); ?>
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



    <script>
        function openModal() {
            $('#myModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                window.location.assign('eval_crud.php');
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
        <li class="breadcrumb-item"><a href="#">Instritution</a></li>
        <li class="breadcrumb-item active" aria-current="page">Evaluation</li>
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

    <div class="container">
        <?php
        $result = $mysqli->query("SELECT * from evaluation") or die($mysqli->error);
        ?>
        <div class="breadtop">
            <!-- Trigger the modal with a button -->
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#myModal">Add Evaluation Details</button>

            <table id="tbl" class="table table-bordered table-hover dt-responsive" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th style="width:30%">School name</th>
                        <th>Year</th>
                        <th>O/L passed</th>
                        <th>O/L failed</th>
                        <th>A/L passed</th>
                        <th>A/L failed</th>
                        <th>Genaral Scholarship exam passed</th>
                        <th>Genaral Scholarship exam failed</th>

                        <th style="width: 22%;"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['sch_name']; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <td><?php echo $row['ol_pass']; ?></td>
                            <td><?php echo $row['ol_fail']; ?></td>
                            <td><?php echo $row['al_pass']; ?></td>
                            <td><?php echo $row['al_fail']; ?></td>
                            <td><?php echo $row['gq_pass']; ?></td>
                            <td><?php echo $row['gq_fail']; ?></td>
                            <td style="padding: 0.8em;">
                                <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                    <a href="eval_crud.php?edit=<?php echo $row['id'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                </li>

                                <a href="/process/eval_process.php?delete=<?php echo $row['id'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>

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
                            <h4 class="modal-title">Edit school evaluation details</h4>

                        <?php else : ?>
                            <h4 class="modal-title">Add school evaluation details</h4>

                        <?php endif; ?>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="/process/eval_process.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="ID" class="form-control" required>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <select id="sch_name" style="height:3%;" class="form-control" value="<?php echo $sch_name; ?>" name="sch_name" required>
                                        <option value="">~~NOT SELECTED~~</option>
                                        <?php
                                        //con

                                        $result_scl = $mysqli->query("SELECT * from school") or die($mysqli->error);
                                        ?>
                                        <?php while ($row = $result_scl->fetch_assoc()) : ?>


                                            <option value="<?php echo $row['sch_name']; ?>" <?php if ($sch_name == $row['sch_name']) {
                                                                                                echo 'selected';
                                                                                            }  ?>><?php echo $row['sch_name']; ?></option>

                                        <?php endwhile; ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Year</label>
                                    <select id="year" style="height:3%;" class="form-control" value="<?php echo $year; ?>" name="year" required>
                                        <option value="">~~NOT SELECTED~~</option>
                                        <?php
                                        for ($x = date("Y"); $x >= date("Y") - 5; $x--) {

                                        ?>

                                            <option value="<?php echo $x; ?>" <?php if ($year == $x) {
                                                                                    echo 'selected';
                                                                                }  ?>><?php echo $x ?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>O/L results</label>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>O/L passed</label>
                                            <input type="number" name="ol_pass" class="form-control" value="<?php echo $ol_pass; ?>" placeholder="No.of O/L passed" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>O/L failed</label>
                                            <input type="number" name="ol_fail" class="form-control" value="<?php echo $ol_fail; ?>" placeholder="No.of O/L failed" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>A/L results</label>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>A/L passed</label>
                                            <input type="number" name="al_pass" class="form-control" value="<?php echo $al_pass; ?>" placeholder="No.of A/L passed" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>A/L failed</label>
                                            <input type="number" name="al_fail" class="form-control" value="<?php echo $al_fail; ?>" placeholder="No.of A/L failed" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Genaral Scholarship Exam results</label>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>GS passed</label>
                                            <input type="number" name="gq_pass" class="form-control" value="<?php echo $gq_pass; ?>" placeholder="No.of QS passed" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>GS failed</label>
                                            <input type="number" name="gq_fail" class="form-control" value="<?php echo $gq_fail; ?>" placeholder="No.of GS failed" class="form-control">
                                        </div>
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