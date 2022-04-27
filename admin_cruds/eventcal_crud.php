<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/process/eventcal_process.php'); ?>
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

    <script>
        function openModal() {
            $('#myModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                window.location.assign('eventcal_crud.php');
            });
            var url_string = window.location.href; //window.location.href
            var url = new URL(url_string);
            var c = url.searchParams.get("edit");
            if (c) {
                $('#myModal').modal('show');
            }

        }
    </script>
    <title>Event calender</title>
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
    <link rel="stylesheet" href="/includes/adminStyle/styles.css">
</head>


<body onload="openModal()">




    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;">
        <li class="breadcrumb-item"><a href="#">General</a></li>
        <li class="breadcrumb-item active" aria-current="page">Event calander</li>
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
        $result = $mysqli->query("SELECT * from eventcal order by id DESC") or die($mysqli->error);
        ?>
        <div class="breadtop" style="margin-bottom:5em;">
            <!-- Trigger the modal with a button -->
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" data-toggle="modal" data-target="#myModal">Add Event</button>
            <button type="button" style="margin: 2%;" class="btn btn-admin btn-xl" onclick="location.href = '/event cal/calender/eventCalender.php';">Event calender view</button>

            <table id="tbl" class="table" style=" width: 100%;">
                <thead style="visibility: hidden;">
                    <tr>
                        <th>ID</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>


                        <tr>
                            <td>
                                <div class="card" style="padding:1em;background-color:#661414; color:#fff; border-radius:3rem">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div style="text-align: left;">

                                                <div>

                                                    <h4><?php echo $row['title']; ?></h4>

                                                    <h5 style="color:#bdbdbd;"><strong>Start date & time - </strong><?php echo str_replace("T", " at ", $row['start_date']); ?></h5>
                                                    <h5 style="color:#bdbdbd;"><strong>End date & time - </strong><?php echo str_replace("T", " at ", $row['end_date']); ?></h5>
                                                    <h5 style="color:#bdbdbd;"><strong>URL - </strong><a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?></a></h5>

                                                </div>

                                                <br>
                                                <div style="text-align: right; margin:0.5em;">
                                                    <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                                        <a href="eventcal_crud.php?edit=<?php echo $row['id'] ?>" class="btn btn-light btn-xl" style="display: inline !important;">Edit</a>
                                                    </li>
                                                    <li style="display: inline !important;">
                                                        <a href="/process/eventcal_process.php?delete=<?php echo $row['id'] ?>" class="btn btn-light btn-xl" style="display: inline !important;" onclick="return confirm('Do you need to delete this item?')">Delete</a>
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
                            <h4 class="modal-title">Edit Event</h4>

                        <?php else : ?>
                            <h4 class="modal-title">Add Event</h4>

                        <?php endif; ?>

                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <form action="/process/eventcal_process.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" placeholder="ID" class="form-control" required>


                                <?php
                                if ($update == true) :
                                ?>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <textarea class="form-control" id="title" name="title" rows="3" placeholder="Enter the title of the event" value="<?php echo $title; ?>" required><?php echo $_SESSION['txtdes']; ?>
                                </textarea>

                                    <?php else : ?>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <textarea class="form-control" id="title" name="title" rows="3" placeholder="Enter the title of the event" value="<?php echo $title; ?>" required></textarea>

                                        <?php endif; ?>


                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label>Start date</label>
                                                <input type="date" name="s_date" class="form-control" value="<?php echo $s_date; ?>" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Start Time</label>
                                                <input type="time" name="s_time" class="form-control" value="<?php echo $s_time; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-6">
                                                <label>End date</label>
                                                <input type="date" name="e_date" class="form-control" value="<?php echo $e_date; ?>" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>End Time</label>
                                                <input type="time" name="e_time" class="form-control" value="<?php echo $e_time; ?>" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>URL</label>
                                            <input type="url" name="url" class="form-control" value="<?php echo $url; ?>" class="form-control">
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