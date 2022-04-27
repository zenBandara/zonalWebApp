<!doctype html>
<?php session_start(); ?>




<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../css/styles.css" rel="stylesheet" />



    <script src="https://www.google.com/recaptcha/api.js" async defer></script>



    <!------ Include the above in your HEAD tag ---------->





    <title>Change password</title>
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
    <?php require_once 'headerFogPass.php';
    require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
    ?>



    <!-- <div id="in">
        <form method="post" id="form_1">
            <input type="email" name="fog_mail" required>

            <input type="submit" id="sub_1" name="button1" class="button" value="Email check" />

        </form>
    </div> -->

    <!-- New -->


    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Find Your Account </b></h5>
                        </div>
                        <div class="card-body">
                            <span>Please enter your email address to search for your account.</span><br><br>
                            <form id="form_1" method="post" action="">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" id="fog_mail" name="fog_mail" class="form-control" name="email-address" required autofocus>
                                    </div>
                                </div>
                                <br>



                                <div class="col-md-6 offset-md-4">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="g-recaptcha" data-sitekey="<?php echo $reCAPTCHA_site_key; ?>"></div>
                                    </div>
                                    <br>
                                    <button type="submit" id="sub_1" name="submit_email" class="btn btn-primary btn-xl">
                                        Find
                                    </button>

                                    <?php
                                    if (isset($_POST['g-recaptcha-response'])) {
                                        if ($_POST['g-recaptcha-response'] == "") {
                                            echo '<br><b style="color:red;">*reCAPTCHA Required!</b>';
                                        }
                                    }

                                    if (isset($_POST['submit_email']) && $_POST['g-recaptcha-response'] != "") {

                                        // $recaptcha =  $_POST['g-recaptcha-response'];
                                        // echo $_POST['g-recaptcha-response'];

                                        //sentmail($mail);

                                        $secret = $reCAPTCHA_secret_key;

                                        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
                                        $responseData = json_decode($verifyResponse);


                                        if ($responseData->success) {


                                            $mail = $mysqli->real_escape_string($_POST['fog_mail']);
                                            $sql_check = "SELECT * FROM users WHERE email = '$mail'";
                                            $sql_ex = $mysqli->query($sql_check);
                                            $row_count = mysqli_num_rows($sql_ex);



                                            if ($row_count == 1) {
                                                //available user
                                                echo 'Available user';


                                                $_SESSION['Auemail'] = $mail;
                                                header("Location: confirmUser.php");
                                            } else {
                                                //unavailable user
                                                echo '<br><b style="color:red;">*User unavailable!</b>';
                                            }
                                        }
                                    } else {
                                    }
                                    ?>


                                </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>