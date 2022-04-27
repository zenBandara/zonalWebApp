<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/styles.css" rel="stylesheet" />

    <title>Your password has been changed</title>
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
                            <h5><b><?php
                                    
                                    if (isset($_SESSION['emailto'])) {
                                        echo 'Password has been changed on your ' . $_SESSION['emailto'] . '!';
                                    }else{
                                        header("Location: lostMyPassword.php");
                                    }
                                    unset($_SESSION['emailto']);
                                    ?></b></h5>
                        </div>
                        <div class="card-body">
                        <div class="form-group row">
                                <img src="complete.png" style="width: 40%; display: block; margin-left: auto; margin-right: auto;">
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