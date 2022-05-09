<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/process/branchInfo_process.php'); ?>

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
            $('#planningModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                window.location.assign('branchInfo_crud.php');
            });
            var url_string = window.location.href; //window.location.href
            var url = new URL(url_string);
            var c = url.searchParams.get("edit");
            if (c) {
                $('#planningModal').modal('show');
            }

           

        }
    </script>

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
            background-color: #fff;
            border-radius: 2em;
            color:#000;
        }

        .cardm {
            margin: 0.5%;
        }
    </style>
</head>


<body onload="openModal()">



    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;">
        <li class="breadcrumb-item"><a href="#">General</a></li>
        <li class="breadcrumb-item active" aria-current="page">Branch Info.</li>
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

    <div class="container" style="padding-top: 5%; display:block;">
        <!-- Planning branch details -->
        <?php
        $planning_qu = $mysqli->query("SELECT * FROM branch_description WHERE branch_name = 'planning'") or die($mysqli->error);
        while ($row = $planning_qu->fetch_assoc()) {
            $p_description = $row['description'];
        }
        ?>
        <!-- change id -->
        <div class="card cardp cardm" style="padding: 5%;" id="planning">
            <h3>Planning Branch's Info.</h3>
            <form action="/process/branchInfo_process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- Change name for another feild -->
                    <input type="hidden" name="b_name" class="form-control" value="planning" placeholder="ID" class="form-control" required>
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Enter the Description"><?php echo $p_description; ?></textarea>
                    <br>
                    <button type="submit" class="btn btn-admin btn-xl" name="save_desc">Save Changes</button>
                </div>
            </form>
            <br>
            <label>Add branch's functions here.</label>
            <!-- Trigger the modal with a button -->
            <div style="text-align: right;">
                <button type="button" style="margin: 2%; width:20%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#planningModal">Add Function</button>
            </div>

            <table class="table table-bordered table-hover dt-responsive tbl" style=" width: 100%;">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //change branch_name
                    $planning_func_qu = $mysqli->query("SELECT * FROM branch_function WHERE branch_name = 'planning'") or die($mysqli->error);
                    while ($row = $planning_func_qu->fetch_assoc()) : ?>
                        <tr>

                            <td><?php echo $row['function']; ?></td>

                            <td style="width: 30%; text-align:center; padding:0.8em;">
                                <li onclick="$('#planningModal').modal('show')" style="display: inline;">
                                    <a href="branchInfo_crud.php?edit=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                </li>
                                <a href="/process/branchInfo_process.php?delete=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>

        <!-- Development branch details -->
        <?php
        $planning_qu = $mysqli->query("SELECT * FROM branch_description WHERE branch_name = 'development' ORDER BY `branch_description`.`id` DESC") or die($mysqli->error);
        while ($row = $planning_qu->fetch_assoc()) {
            $p_description = $row['description'];
        }
        ?>

        <div class="card cardp cardm" style="padding: 5%;" id="development">
            <h3>Development Branch's Info.</h3>
            <form action="/process/branchInfo_process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- Change name for another feild -->
                    <input type="hidden" name="b_name" class="form-control" value="development" placeholder="ID" class="form-control" required>
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Enter the Description"><?php echo $p_description; ?></textarea>
                    <br>
                    <button type="submit" class="btn btn-admin btn-xl" name="save_desc">Save Changes</button>
                </div>
            </form>
            <br>
            <label>Add branch's functions here.</label>
            <!-- Trigger the modal with a button -->
            <div style="text-align: right;">
                <!--change modal target -->
                <button type="button" style="margin: 2%; width:20%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#planningModal">Add Function</button>
            </div>

            <table id="tbl" class="table table-bordered table-hover dt-responsive tbl" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //change branch_name
                    $planning_func_qu = $mysqli->query("SELECT * FROM branch_function WHERE branch_name = 'development'  ORDER BY `branch_function`.`id` DESC") or die($mysqli->error);
                    while ($row = $planning_func_qu->fetch_assoc()) : ?>
                        <tr>

                            <td><?php echo $row['function']; ?></td>

                            <td style="width: 30%; text-align:center; padding:0.8em;">
                                <!-- change modal id -->
                                <li onclick="$('#planningModal').modal('show')" style="display: inline;">
                                    <a href="branchInfo_crud.php?edit=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                </li>
                                <a href="/process/branchInfo_process.php?delete=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>

        <!-- Finance branch details -->
        <?php
        $planning_qu = $mysqli->query("SELECT * FROM branch_description WHERE branch_name = 'finance' ORDER BY `branch_description`.`id` DESC") or die($mysqli->error);
        while ($row = $planning_qu->fetch_assoc()) {
            $p_description = $row['description'];
        }
        ?>

        <div class="card cardp cardm" style="padding: 5%;" id="finance">
            <h3>Finance Branch's Info.</h3>
            <form action="/process/branchInfo_process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- Change name for another feild -->
                    <input type="hidden" name="b_name" class="form-control" value="finance" placeholder="ID" class="form-control" required>
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Enter the Description"><?php echo $p_description; ?></textarea>
                    <br>
                    <button type="submit" class="btn btn-admin btn-xl"" name="save_desc">Save Changes</button>
                </div>
            </form>
            <br>
            <label>Add branch's functions here.</label>
            <!-- Trigger the modal with a button -->
            <div style="text-align: right;">
                <!--change modal target -->
                <button type="button" style="margin: 2%; width:20%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#planningModal">Add Function</button>
            </div>

            <table id="tbl" class="table table-bordered table-hover dt-responsive tbl" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //change branch_name
                    $planning_func_qu = $mysqli->query("SELECT * FROM branch_function WHERE branch_name = 'finance'  ORDER BY `branch_function`.`id` DESC") or die($mysqli->error);
                    while ($row = $planning_func_qu->fetch_assoc()) : ?>
                        <tr>

                            <td><?php echo $row['function']; ?></td>

                            <td style="width: 30%; text-align:center; padding:0.8em;">
                                <!-- change modal id -->
                                <li onclick="$('#planningModal').modal('show')" style="display: inline;">
                                    <a href="branchInfo_crud.php?edit=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                </li>
                                <a href="/process/branchInfo_process.php?delete=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>

        <!-- Administration branch details -->
        <?php
        $planning_qu = $mysqli->query("SELECT * FROM branch_description WHERE branch_name = 'administration' ORDER BY `branch_description`.`id` DESC") or die($mysqli->error);
        while ($row = $planning_qu->fetch_assoc()) {
            $p_description = $row['description'];
        }
        ?>

        <div class="card cardp cardm" style="padding: 5%;" id="administration">
            <h3>Administration Branch's Info.</h3>
            <form action="/process/branchInfo_process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- Change name for another feild -->
                    <input type="hidden" name="b_name" class="form-control" value="administration" placeholder="ID" class="form-control" required>
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Enter the Description"><?php echo $p_description; ?></textarea>
                    <br>
                    <button type="submit" class="btn btn-admin btn-xl" name="save_desc">Save Changes</button>
                </div>
            </form>
            <br>
            <label>Add branch's functions here.</label>
            <!-- Trigger the modal with a button -->
            <div style="text-align: right;">
                <!--change modal target -->
                <button type="button" style="margin: 2%; width:20%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#planningModal">Add Function</button>
            </div>

            <table id="tbl" class="table table-bordered table-hover dt-responsive tbl" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //change branch_name
                    $planning_func_qu = $mysqli->query("SELECT * FROM branch_function WHERE branch_name = 'administration'  ORDER BY `branch_function`.`id` DESC") or die($mysqli->error);
                    while ($row = $planning_func_qu->fetch_assoc()) : ?>
                        <tr>

                            <td><?php echo $row['function']; ?></td>

                            <td style="width: 30%; text-align:center; padding:0.8em;">
                                <!-- change modal id -->
                                <li onclick="$('#planningModal').modal('show')" style="display: inline;">
                                    <a href="branchInfo_crud.php?edit=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                </li>
                                <a href="/process/branchInfo_process.php?delete=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>


        <!-- Establishment branch details -->
        <?php
        $planning_qu = $mysqli->query("SELECT * FROM branch_description WHERE branch_name = 'establishment' ORDER BY `branch_description`.`id` DESC") or die($mysqli->error);
        while ($row = $planning_qu->fetch_assoc()) {
            $p_description = $row['description'];
        }
        ?>

        <div class="card cardp cardm" style="padding: 5%;" id="establishment">
            <h3>Establishment Branch's Info.</h3>
            <form action="/process/branchInfo_process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- Change name for another feild -->
                    <input type="hidden" name="b_name" class="form-control" value="establishment" placeholder="ID" class="form-control" required>
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Enter the Description"><?php echo $p_description; ?></textarea>
                    <br>
                    <button type="submit" class="btn btn-admin btn-xl" name="save_desc">Save Changes</button>
                </div>
            </form>
            <br>
            <label>Add branch's functions here.</label>
            <!-- Trigger the modal with a button -->
            <div style="text-align: right;">
                <!--change modal target -->
                <button type="button" style="margin: 2%; width:20%;" class="btn btn-success" data-toggle="modal" data-target="#planningModal">Add Function</button>
            </div>

            <table id="tbl" class="table table-bordered table-hover dt-responsive tbl" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th>Function</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //change branch_name
                    $planning_func_qu = $mysqli->query("SELECT * FROM branch_function WHERE branch_name = 'establishment'  ORDER BY `branch_function`.`id` DESC") or die($mysqli->error);
                    while ($row = $planning_func_qu->fetch_assoc()) : ?>
                        <tr>

                            <td><?php echo $row['function']; ?></td>

                            <td style="width: 30%; text-align:center; padding:0.8em;">
                                <!-- change modal id -->
                                <li onclick="$('#planningModal').modal('show')" style="display: inline;">
                                    <a href="branchInfo_crud.php?edit=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                </li>
                                <a href="/process/branchInfo_process.php?delete=<?php echo $row['id'] ?>&br_name=<?php echo $row['branch_name'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>

    </div>

    <!-- model for planning -->
    <div class="modal fade" id="planningModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">


                    <?php
                    if ($update == true) :
                    ?>
                        <h4 class="modal-title">Edit Function</h4>

                    <?php else : ?>
                        <h4 class="modal-title">Add Function</h4>

                    <?php endif; ?>

                </div>

                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <form action="/process/branchInfo_process.php" method="POST" enctype="multipart/form-data">
                            <!-- change value -->
                            <input type="hidden" name="b_name" class="form-control" value="planning" placeholder="b_name" class="form-control" required>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="ID" class="form-control" required>
                            <?php
                            if ($update == true) :
                            ?>
                                <div class="form-group">
                                    <label>Function</label>
                                    <textarea class="form-control" id="function" name="function" rows="3" placeholder="Enter the function" value="<?php echo $p_function; ?>" required><?php echo $_SESSION['txtdes']; ?></textarea>

                                <?php else : ?>
                                    <div class="form-group">
                                        <label>Select the branch</label>
                                        <select class="form-control" name="b_name" id="b_name" style="height:3%;" required>
                                            <option value="">~~NOT SELECTED~~</option>
                                            <option value="planning">Planning Branch</option>
                                            <option value="development">Development branch</option>
                                            <option value="finance">Finance Branch</option>
                                            <option value="establishment">Establishment branch</option>
                                            <option value="administration">Administration branch</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Type new function</label>
                                        <textarea class="form-control" id="function" name="function" rows="3" placeholder="Enter the function" value="<?php echo $p_function; ?>" required></textarea>

                                    <?php endif; ?>


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
    </div>
    <!-- /model for planning -->


    <script>
        $(document).ready(function() {
            var table = $('.tbl').DataTable({
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