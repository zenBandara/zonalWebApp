<?php 

require_once ($_SERVER['DOCUMENT_ROOT'].'/process/article_process.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'].'/php_action/db_connect_client.php');

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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/includes/adminStyle/styles.css">

    <script>
        function openModal() {
            $('#myModal').on('hidden.bs.modal', function() {
                console.log('IT IS HIDDEN!');
                window.location.assign('article_crud.php');
            });
            var url_string = window.location.href; //window.location.href
            var url = new URL(url_string);
            var c = url.searchParams.get("edit");
            if (c) {
                $('#myModal').modal('show');
            }

        }
    </script>
    <title>Article Add</title>
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
        <li class="breadcrumb-item"><a href="#">News</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage News Articles</li>
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
       
        $result = $mysqli->query("SELECT * FROM article, category WHERE id_categorie = category_id  ORDER BY article_id DESC") or die($mysqli->error);
        ?>
        <div class="breadtop" style="margin-bottom:5em;">
            <!-- Trigger the modal with a button -->
            <a type="button" style="margin: 2%;" class="btn btn-admin btn-xl" href="manage_article.php">Add Article</a>

            <table id="tbl" class="table table-bordered table-hover dt-responsive" style=" width: 100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Created Time</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?= $row['article_id'] ?></td>
                            <td><?= $row['article_title'] ?></td>
                            <td class="text-break"><?= strip_tags(substr($row['article_content'], 0, 40)) . "..." ?></td>
                            <td><img src="/news/img/article/<?= str_replace('../news/img/article/','',$row['article_image'] )?>" style="width: 100px; height: auto;"></td>
                            <td><?= $row['article_created_time'] ?></td>
                            <td><?= $row['category_name'] ?></td>


                            <td style="width:22%; text-align:center;">

                                <li onclick="$('#myModal').modal('show')" style="display: inline;">
                                    <a class="btn btn-admin btn-xl" href="article_crud.php?edit=<?php echo $row['article_id'] ?>" >
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </li>
                                


                                <a class="btn btn-admin btn-xl" href="update_article.php?id=<?= $row['article_id'] ?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>

                                <a class="btn btn-admin btn-xl" href="/process/article_process.php?delete=<?= $row['article_id'] ?>" onclick="return confirm('Do you need to delete this post?')">
                                    <i class="fa fa-trash " aria-hidden="true"></i>
                                </a>
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
                        <h4 class="modal-title">Title : <?= $article_title; ?></h4>
                    </div>
                    <div class="modal-body" style="width: 100%; overflow:scroll;">
                        <div >
                        <?= $article_content; ?>
                        </div>
                   
                        <div class="modal-footer">
                            <a class="btn btn-light btn-xl" data-dismiss="modal">Close</a>
                        </div>

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


    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Data table JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

</body>

</html>