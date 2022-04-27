<!-- new -->
<!doctype html>

<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/php_action/db_connect_client.php');
if (isset($_SESSION['emailto'])) {
    if (array_key_exists('btnSubmit', $_POST)) {
        $new_pwd = password_hash($_POST['txtPassword'], PASSWORD_DEFAULT);

        $email = $_SESSION['emailto'];
        $qu = "UPDATE users SET password='$new_pwd' WHERE email = '$email'";
        $mysqli->query($qu) or die($mysqli->error);
        echo 'Password updated!';
        header("Location: passwordChanged.php");
    }
?>




    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../css/styles.css" rel="stylesheet" />

        <title>Choose a new password</title>
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
    </head>


    <body>
        <?php require_once 'headerFogPass.php'; ?>
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5><b>Choose a new password</b></h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4"><img src="security.png" style="width: 45vh;"></label>
                                    <div class="col-md-6">

                                        <h6>Create a new password that is at least 8 characters long. A strong password has a combination of letters, digits and punctuation marks.</h6><br>

                                        <!--  end new-->

                                        <form onsubmit="return Validate()" method="POST">
                                            <label>Password:</label>

                                            <input type="password" id="txtPassword" name="txtPassword" minlength="8" class="form-control" required autofocus /><br>

                                            <label>Confirm Password:</label>

                                            <input type="password" id="txtConfirmPassword" minlength="8" class="form-control" required autofocus /><br>

                                            <input type="submit" id="btnSubmit" value="Save" name="btnSubmit" class="btn btn-primary btn-xl" /><br>
                                            <a style="color:red;"><b id="errortxt"></b></a>
                                        </form>

                                        <script type="text/javascript">
                                            function Validate() {
                                                var password = document.getElementById("txtPassword").value;
                                                var confirmPassword = document.getElementById("txtConfirmPassword").value;
                                                if (password != confirmPassword) {
                                                    $('#errortxt').text('*Passwords do not match.')
                                                    return false;
                                                } else {
                                                    // $('#errortxt').text('*Passwords mached.')
                                                    return true;
                                                }

                                            }


                                            <?php } else {
                                            header("Location: lostMyPassword.php");
                                        } ?>
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

    </html>