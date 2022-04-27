<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   


    <!------ Include the above in your HEAD tag ---------->
    <!-- Bootstrap CSS -->

    <link href="../css/styles.css" rel="stylesheet" />

    <title>Reset password</title>
</head>
<style>
    body {
        margin: 0;
        font-size: .9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f5f8fa;
    }

    .navbar-laravel {
        box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
    }

    .navbar-brand,
    .nav-link,
    .my-form,
    .login-form {
        font-family: sans-serif;
    }

    .my-form {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .my-form .row {
        margin-left: 0;
        margin-right: 0;
    }

    .login-form {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .login-form .row {
        margin-left: 0;
        margin-right: 0;
    }
</style>

<body>
<?php require_once 'headerFogPass.php'; ?>
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Reset Your Password</b></h5>
                        </div>
                        <div class="card-body">
                            
                                <div class="form-group row">
                                    <label class="col-md-4 "><img src="profile.png" style="width:90%"></label>
                                    <div class="col-md-6">

                                        <?php

                                        if (isset($_SESSION['Auemail'])) {
                                            $mail = $_SESSION['Auemail'];
                                            $result = $mysqli->query("SELECT username from users WHERE email = '$mail'") or die($mysqli->error);
                                            $name = '';
                                            while ($row = $result->fetch_assoc()) {
                                                $name = $row['username'];
                                            }

                                            echo "<h4>Is this you?</h4><br><h3>" . strtoupper($name) . "</h3><br>";
                                            echo "<h5>E-mail: <b>" . $mail . "</b></h5><br>";

                                        ?>
                                            <?php
                                            $url1 = "location.href = 'lostMyPassword.php'";
                                            $url2 = "location.href = 'otpCheck.php'";
                                            echo '<a href="' . $url1 . ';" class="nav-link h6" >Not You?</a><br>';
                                            ?>


                                    </div>
                                </div>



                                <div class="form-group row">

                                </div>

                                <div class="col-md-6">
                                    <br>
                                    <div>
                                    <?php
                                            echo '<button onclick="' . $url2 . ';" class="btn btn-primary btn-xl" > Continue</button>';
                                 }else{
                                    header("Location: lostMyPassword.php");
                                }

                                ?>
                                    </div>
                                
                                </div>
                                
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>




</body>

</html>