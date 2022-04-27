
<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/php_action/db_connect_client.php');

if (!isset($_SESSION['userId'])) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}
$result = $mysqli->query("SELECT category_id, category_name FROM category") or die($mysqli->error);
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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/includes/adminStyle/styles.css">

    <title>Manage Article</title>
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
    <!-- JS TextEditor -->
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</head>


<body>




    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;">
        <li class="breadcrumb-item"><a href="#">News</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Article</li>
    </ol>



    <!-- Main -->
    <main role="main" class="main">


        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <br><br><br><br>
                    <!-- Form -->
                    <form action="/process/article_process.php" method="POST" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label for="arTitle">Title</label>
                            <input type="text" class="form-control" name="arTitle" id="arTitle" required>
                        </div>

                        <div class="form-group">
                            <label for="arContent">Content</label>

                            <textarea class="form-control" name="arContent" id="arContent" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="arImage">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="arImage" id="arImage">
                                <label class="custom-file-label" for="arImage">Choose Image</label>
                                <i>*Note - You can choose only .jpg(JPEG), .bmp, .gif, .png</i>
                                <p id="acfType"></p>
                                <p id="acfSize"></p>
                            </div>
                        </div>

                        <div class="form-group" id="optimize_list" style="display: none; border:2px solid #000; padding:1em; border-radius:1em;">

                            <input type="radio" id="disable_opt" name="optimization" value="disable_opt" disabled>
                            <label> - Disable image optimization</label><br>
                            <input type="radio" id="img_low_opt" name="optimization" value="low_opt" disabled>
                            <label> - Enable low image optimization</label><br>
                            <input type="radio" id="img_high_opt" name="optimization" value="high_opt" disabled>
                            <label> - Enable higher image optimization</label>
                        </div>
                        <br>
                        <div class="my-2" style="width: 200px;">
                            <img class="w-100 h-auto" src="/news/img/article/<?= $article["article_image"] ?>" alt="">
                        </div>
                        <br>
                        


                        <div class="form-group">
                            <label for="arCategory">Category</label>
                            <select class="custom-select" name="arCategory" id="arCategory" required>
                                <option value="">-- Select Category --</option>

                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                                <?php endwhile; ?>

                            </select>
                        </div>
                        <hr>
                        <h4>Optional - For SEO(Search Engine Optimization)</h4>
                        <div class="form-group">
                            <label for="arKeywords">Keywords (Separate each keyword by using comma (','))</label>
                            <i>*Note - don't use more than about 10 keywords.</i>
                            <input type="text" class="form-control" name="arKeywords" id="arKeywords">
                        </div>

                        <div class="form-group">
                            <label for="arDescription">Short description (Recommended to use words between 50 and 160)</label>

                            <textarea class="form-control" name="arDescription" id="arDescription" rows="3"></textarea>
                        </div>


                        <div class="text-center">
                            <button type="submit" name="add_article" class="btn btn-admin btn-xl">Submit</button>
                        </div>
                    </form>
                    <br>
                </div>

                <!-- <div class="col-lg-4 mb-4">
                     <h1> Random Articles </h1>
                </div> -->


            </div>
        </div>

    </main>

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
                    $('#optimize_list').css('display', 'block');
                    $('#disable_opt').prop('disabled', false);
                    $('#img_low_opt').prop('checked', true);
                    $('#img_low_opt').prop('disabled', false);
                    $('#img_high_opt').prop('disabled', false);
                }
            });
        });
    </script>


    <!-- Text Editor Script -->
    <script>
        CKEDITOR.replace('arContent');
    </script>
    <!-- Data table JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <!-- bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>