<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/php_action/core.php'); ?>

<!DOCTYPE html>
<html>

<head>

  <title>System Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- bootstrap -->
  <link rel="stylesheet" href="/assests/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap theme-->
  <link rel="stylesheet" href="/assests/bootstrap/css/bootstrap-theme.min.css">

  <!-- font awesome -->
  <link rel="stylesheet" href="/assests/font-awesome/css/font-awesome.min.css">
  <!-- Boostrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- custom css -->
  <link rel="stylesheet" href="/custom/css/custom.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="/assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="/assests/plugins/fileinput/css/fileinput.min.css">

  <!--button styles -->
  <link rel="stylesheet" href="/includes/adminStyle/styles.css">

  <!-- jquery -->
  <script src="/assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->
  <link rel="stylesheet" href="/assests/jquery-ui/jquery-ui.min.css">
  <script src="/assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
  <script src="/assests/bootstrap/js/bootstrap.min.js"></script>







</head>
<style>
  .nav.navbar-nav.navbar-right li a {
    color: white;
    font-size: 17px;
    padding: 7px 13px;
    border-radius: 3px;
    text-transform: uppercase;
    margin-top: 10px;
  }

  .nav.navbar-nav.navbar-right li a:hover {
    color: black;
    background-color: #ffd400;
    transition: .5s;
  }

  @media screen and (min-width: 767px) {
    #navSetting {
      margin-left: 100px;
    }

  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.5;
    overflow-x: hidden;
    color: #121212;
    background: #ffffff;
  }
  
</style>

<body>

  <nav style="padding-bottom: 0.4em; background-color:#661414; color:white;">
    <div class="container" style="margin-right: 0;">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          
         <span  style="text-transform: uppercase;  font-weight: bold; font-size: 30px; margin-right:3.5rem;">System <span style="color:#ffd400;">Pannel</span></span><span style="font-size: 30px;">&#9776;</span>

        </button>
        <!-- <a class="navbar-brand" href="#">Brand</a> -->
        <a class="navbar-brand" href="#">
          <!-- <img src="logo1.png" alt="" style="height: 50px;"> -->

        </a>
      </div>
      <!-- permission base start -->
      <?php
      $result = $connect->query("SELECT * from permission") or die($mysqli->error);

      $gen = '';
      $ins = '';
      $sta = '';
      $nw = '';
      $reso = '';
      while ($row = $result->fetch_assoc()) {
        $gen = $row['genaral'];
        $ins = $row['institutes'];
        $sta = $row['staff'];
        $nw = $row['news'];
        $reso = $row['resources'];
      }
      ?>

      <!-- end -->


      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right" style="font-size:20px; color:aliceblue;">


          <li id="navDashboard"><a href="/dashboard.php"> Dashboard</a></li>

          <?php if ($gen == 'Yes') { ?>
            <li id="navCategories"><a href="/frames/general_frame.php"> Genaral</a></li>
          <?php } else if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
            <li id="navCategories"><a href="<?php echo $_SERVER['HTTP_HOST'];?>/frames/general_frame.php"> Genaral</a></li>
          <?php } ?>

          <?php if ($ins == 'Yes') { ?>
            <li class="navitm"><a href="/frames/school_frame.php">Institutes</a></li>
          <?php } else if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
            <li class="navitm"><a href="/frames/school_frame.php">Institutes</a></li>
          <?php } ?>

          <?php if ($sta == 'Yes') { ?>
            <li id="navBrand"><a href="/frames/staff_frame.php">Staff </a></li>
          <?php } elseif (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
            <li id="navBrand"><a href="/frames/staff_frame.php">Staff </a></li>
          <?php } ?>

          <?php if ($nw == 'Yes') { ?>
            <li id="navProduct"><a href="/frames/news_frame.php"> News </a></li>
          <?php } else if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
            <li id="navProduct"><a href="/frames/news_frame.php"> News </a></li>
          <?php } ?>


          <!--only admin 'admin', '1' for all-->

          <!-- resouces -->
          <?php if ($reso == 'Yes') { ?>
            <li id="navReport"><a href="/frames/resource_frame.php"> Resources </a></li>
          <?php } else if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') { ?>
            <li id="navReport"><a href="/frames/resource_frame.php"> Resources </a></li>
          <?php } ?>


          <li class="dropdown" id="navSetting">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #fff; "> <span><?php echo ' ' . '<svg height="9" width="8">
  <circle cx="4" cy="4" r="2" stroke="#27e82e" stroke-width="3" fill="#27e82e" />
   
</svg> '; ?></span> <i class="glyphicon glyphicon-user"></i><span style="font-size: 12px;">&nbsp;<?php echo '  ' . $_SESSION['userRole']; ?></span> <span class="caret"></span></a>
            <ul class="dropdown-menu" style="background-color:#661414; font-size:10px;">
              <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) { ?>
                <li id="topNavSetting"><a href="../setting.php" style="font-size: 12px;"> <i class="glyphicon glyphicon-wrench"></i>Admin Settings</a></li>
                <li id="topNavUser"><a href="../user.php" style="font-size: 12px;"> <i class="glyphicon glyphicon-wrench"></i> Manage Moderators</a></li>
              <?php } ?>
              <li id="topNavLogout"><a href="../logout.php" style="font-size: 12px;"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
            </ul>
          </li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>