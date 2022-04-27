<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('vendor/autoload.php');
session_start();
$otp_global = 0;

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!------ Include the above in your HEAD tag ---------->
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <title>Enter security code</title>
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
    <?php 
    require_once 'headerFogPass.php';
    require ($_SERVER['DOCUMENT_ROOT'] .'/config_mains/main.php'); ?>
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Enter security code</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4"><img src="security.png" style="width: 45vh;"></label>
                                <div class="col-md-6">

                                    <h6>Please check your emails for a message with your code. Your code is 6 numbers long.</h6><br>
                                    <?php
                                    if (isset($_SESSION['Auemail'])) {
                                        //echo 'Mail'.$_SESSION['Auemail'] ;
                                        echo '<form method="post">
    <input type="number" name="otp_no" class="form-control" maxlength="6" minlength="6" required autofocus><br>
    <div class="g-recaptcha" data-sitekey="'.$reCAPTCHA_site_key.'"></div><br>
    <input type="submit" name="otp_btn" class="btn btn-primary btn-xl" value="Continue" />
    
    </form>';
                                        sentmail($_SESSION['Auemail']);
                                        $_SESSION['emailto'] = $_SESSION['Auemail'];
                                    } else {
                                        //echo 'No Email Found';
                                    }
                                    unset($_SESSION['Auemail']);

                                    function sentmail($email)
                                    {
                                        require ($_SERVER['DOCUMENT_ROOT'] .'/config_mains/main.php'); 
                                        $otp = rand(113435, 923472);
                                        $mail = new PHPMailer(true);

                                        try {
                                            $mail->isSMTP();
                                            $mail->SMTPAuth = true;
                                            $mail->SMTPSecure = 'ssl';
                                            // $mail->SMTPDebug = 2;  
                                            $mail->Host = 'katuzonaledu.site';
                                            $mail->Port = '465';
                                            $mail->isHTML();
                                            $mail->Username   = $email_name;
                                            $mail->Password   = $email_password;
                                            $mail->setFrom($email_name);
                                            $mail->Subject = 'Change password request';
                                            $mail->Body = 'Your OTP is -  <b>' . $otp . '</b>';
                                            $mail->addAddress($email);
                                            $mail->send();
                                            echo '<span style="color:green;">*We have sent your code to : ' . $email . '</span>';
                                            $_SESSION['otp_ses'] = $otp;
                                        } catch (Exception $e) {
                                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                        }
                                    }
                                    
                                    if (isset($_POST['g-recaptcha-response'])){
                                        if($_POST['g-recaptcha-response'] ==""){
                                
                                                echo '<form method="post">
                                                <input type="number" name="otp_no" class="form-control" maxlength="6"  required autofocus><br>
                                                <div class="g-recaptcha" data-sitekey="'.$reCAPTCHA_site_key.'"></div><br>
                                                <b style="color:red;">*reCAPTCHA is required!</b><br>
                                                <input type="submit" name="otp_btn" class="btn btn-primary btn-xl" value="Continue" /><br>
    
                                                </form>';
                                        }
                                        
                                    }
                                   

                                    if (isset($_POST['otp_btn']) && $_POST['g-recaptcha-response'] != "") {

                                        

                                        $secret = $reCAPTCHA_secret_key;

                                        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
                                        $responseData = json_decode($verifyResponse);


                                        if ($responseData->success) {


                                            if ($_POST['otp_no'] == $_SESSION['otp_ses']) {
                                                echo 'OTP Correct!';
                                                header("Location: changePassword.php");
                                                //unset($_SESSION['otp_ses']);
                                            } else {

                                                echo '<b style="color:red;">*Wrong security code!</b>';
                                                echo '<form method="post">
                                                <input type="number" name="otp_no" class="form-control" maxlength="6"  required autofocus><br>
                                                <div class="g-recaptcha" data-sitekey="'.$reCAPTCHA_site_key.'"></div><br>
                                                <input type="submit" name="otp_btn" class="btn btn-primary btn-xl" value="Continue" /><br>
    
                                                </form>';
                                            }
                                        }
                                    }
                                    ?>
                                    

                                    <a class="nav-link" href="lostMyPassword.php">Code not recieved?</a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </main>
</body>

</html>