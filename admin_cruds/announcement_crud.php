<?php require_once  ($_SERVER['DOCUMENT_ROOT'].'/process/announcement_process.php'); ?>
<?php


require_once  ($_SERVER['DOCUMENT_ROOT'].'/php_action/db_connect_client.php');

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

    <!--button styles -->
    <link rel="stylesheet" href="/includes/adminStyle/styles.css">

    <script>
        function openModal() {
            $('#myModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                window.location.assign('announcement_crud.php');
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
        <li class="breadcrumb-item"><a href="#">Genaral</a></li>
        <li class="breadcrumb-item active" aria-current="page">Announcements</li>
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
        $result = $mysqli->query("SELECT * from announcement") or die($mysqli->error);
        ?>
        <div class="breadtop" style="margin-bottom:5em;">
            <!-- Trigger the modal with a button -->
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#myModal">Add Announcement</button>

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
                                <div style="text-align:center;" class="card text-white bg-<?php
                                                                                            if ($row['a_level'] == 'Critical') {
                                                                                                echo 'danger';
                                                                                            } elseif ($row['a_level'] == 'Major') {
                                                                                                echo 'warning';
                                                                                            } elseif ($row['a_level'] == 'Minor') {
                                                                                                echo 'success';
                                                                                            }

                                                                                            ?> mb-3" style="max-width: 50rem;">
                                    <div class="card-header"><strong style="font-size:3.5vh;text-transform:uppercase;"><?php echo $row['a_title']; ?></strong><?php echo ' (' . $row['a_level'] . ')'; ?></div>
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #c7c7c7;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 19">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            </svg>&nbsp;<i><?php echo $row['a_date']; ?></i></h5>
                                        <p class="card-text" style="text-align: justify"><?php echo $row['a_body']; ?>
                                            <hr>
                                        <div style="text-align: right;">
                                            <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                                <a href="announcement_crud.php?edit=<?php echo $row['id'] ?>" class="btn btn-light btn-xl" style="display: inline !important;">Edit</a>
                                            </li>


                                            <a href="/process/announcement_process.php?delete=<?php echo $row['id'] ?>" class="btn btn-light btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
                                        </div>
                                        </p>
                                    </div>
                                </div>
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
                            <h4 class="modal-title">Edit Announcement</h4>

                        <?php else : ?>
                            <h4 class="modal-title">Add Announcement</h4>

                        <?php endif; ?>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="/process/announcement_process.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="ID" class="form-control" required>

                                <div class="form-group">
                                    <label>Announcement title</label>
                                    <input type="text" name="a_title" class="form-control" value="<?php echo $a_title; ?>" placeholder="Enter the name" class="form-control" required>
                                </div>



                                <?php
                                if ($update == true) :
                                ?>
                                    <div class="form-group">
                                        <label>Announcement body</label>
                                        <textarea class="form-control" id="	a_body" name="a_body" rows="3" placeholder="Enter the body" value="<?php echo $a_body; ?>"><?php echo $_SESSION['txtdes']; ?>
                                </textarea>

                                    <?php else : ?>
                                        <div class="form-group">
                                            <label>Announcement body</label>
                                            <textarea class="form-control" id="a_body" name="a_body" rows="3" placeholder="Enter the body" value="<?php echo $a_body; ?>"></textarea>

                                        <?php endif; ?>


                                        </div>

                                        <div class="form-group">
                                            <label>Level</label>
                                            <select id="a_level" style="height:3%;" class="form-control" value="<?php echo $a_level; ?>" name="a_level" required>
                                                <option value="">~~NOT SELECTED~~</option>
                                                <option value="Critical" <?php if ($a_level == 'Critical') {
                                                                                echo 'selected';
                                                                            }  ?>>Critical</option>
                                                <option value="Major" <?php if ($a_level == 'Major') {
                                                                            echo 'selected';
                                                                        }  ?>>Major</option>
                                                <option value="Minor" <?php if ($a_level == 'Minor') {
                                                                            echo 'selected';
                                                                        }  ?>>Minor</option>
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
                            <a data-dismiss="modal" class="btn btn-light btn-xl">Close</a>
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