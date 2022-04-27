<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/process/vacancy_process.php'); ?>
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

    <!-- JS TextEditor -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>


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
                window.location.assign('vacancy_crud.php');
            });
            var url_string = window.location.href; //window.location.href
            var url = new URL(url_string);
            var c = url.searchParams.get("edit");
            if (c) {
                $('#myModal').modal('show');
            }

        }
    </script>
    <title>Vacancy add</title>
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
        <li class="breadcrumb-item"><a href="#">Genaral</a></li>
        <li class="breadcrumb-item active" aria-current="page">Job vacancies</li>
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
        $result = $mysqli->query("SELECT * from vacancy") or die($mysqli->error);
        ?>
        <div class="breadtop" style="margin-bottom:5em;">
            <!-- Trigger the modal with a button -->
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#myModal">Add Vacancy</button>
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#catModal">Add Vacancy Category</button>

            <table id="tbl" class="table  table-hover dt-responsive" style=" width: 100%; border:none;">
                <thead style="display: none;">
                    <tr>
                        <th>ID</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td>
                                <!-- start -->

                                <div style="width: 90vw;">
                                    <p class="card text-center bg-light mb-3">
                                        <a data-toggle="collapse" href="#col<?php echo $row['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <strong style="font-size:3.5vh;"><?php echo $row['title']; ?></strong>
                                            <a><i><?php echo ' (Category:' . $row['category'] . ')'; ?></i><br>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#878580" class="bi bi-clock-fill" viewBox="0 0 16 17">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                </svg>&nbsp;<?php echo $row['date']; ?></a>
                                        </a>

                                    </p>
                                    <div class="collapse" id="col<?php echo $row['id']; ?>">
                                        <div class="card card-body">
                                            <?php echo $row['content']; ?>
                                            <hr>
                                            <div style="text-align: right;">
                                                <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                                    <a href="vacancy_crud.php?edit=<?php echo $row['id'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;">Edit</a>
                                                </li>


                                                <a href="/process/vacancy_process.php?delete=<?php echo $row['id'] ?>" class="btn btn-admin btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- end -->

                            </td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>


        </div>

        <script>
            $(function() {
                $('#add_event').change(function() {
                    if (this.checked) {
                        $('#s_date').prop('disabled', false);
                        $('#s_time').prop('disabled', false);
                        $('#e_date').prop('disabled', false);
                        $('#e_time').prop('disabled', false);
                        $('#grayChange').css('background-color', '#fff');
                    } else {
                        $('#s_date').prop('disabled', true);
                        $('#s_time').prop('disabled', true);
                        $('#e_date').prop('disabled', true);
                        $('#e_time').prop('disabled', true);

                        $('#grayChange').css('background-color', '#c9c9c9');
                    }
                });
            });
        </script>

        <!-- Modal update and add -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">


                        <?php
                        if ($update == true) :
                        ?>
                            <h4 class="modal-title">Edit Vacancy</h4>

                        <?php else : ?>
                            <h4 class="modal-title">Add Vacancy</h4>

                        <?php endif; ?>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="/process/vacancy_process.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="ID" class="form-control" required>
                                <div class="form-group">
                                    <label>Vacancy Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Title here" class="form-control" required>
                                </div>
                                <?php
                                if ($update == true) :
                                ?>
                                    <div class="form-group">
                                        <label>Vacancy content</label>
                                        <textarea class="form-control" id="content" name="content" rows="3" value="<?php echo $content; ?>"><?php echo $_SESSION['txtq']; ?>
                                </textarea>

                                    <?php else : ?>
                                        <div class="form-group">
                                            <label>Vacancy content</label>
                                            <textarea class="form-control" id="content" name="content" rows="3" value="<?php echo $content; ?>"></textarea>

                                        <?php endif; ?>


                                        <div class="form-group">
                                            <label>Category</label>
                                            <select id="category" style="height:3%;" class="form-control" value="<?php echo $category; ?>" name="category" required>
                                                <option value="">~~NOT SELECTED~~</option>

                                                <?php
                                                //con

                                                $result_role = $mysqli->query("SELECT * from vacancy_cat") or die($mysqli->error);
                                                ?>
                                                <?php while ($row = $result_role->fetch_assoc()) : ?>


                                                    <option value="<?php echo $row['category']; ?>" <?php if ($cat == $row['category']) {
                                                                                                        echo 'selected';
                                                                                                    }  ?>><?php echo $row['category']; ?></option>

                                                <?php endwhile; ?>
                                            </select>
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


        <!-- start new model -->
        <div class="modal fade" id="catModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title">Add/Remove Vacancy category</h4>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">


                            <?php require_once 'vacancycat_crud.php'; ?>


                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-light btn-xl" data-dismiss="modal">Close</a>
                        </div>



                    </div>

                </div>
            </div>



        </div>
        <!-- end -->

        <script>
            $(document).ready(function() {
                var table = $('#tbl').DataTable({
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    responsive: true

                });
            });
            
            CKEDITOR.replace('content');
        </script>

</body>

</html>