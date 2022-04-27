<!DOCTYPE html>
<html lang="en">

<?php 
   require "db.php";

   $result_status = $conn->prepare("SELECT status FROM web_status");
   $result_status->execute();
   $status = $result_status->fetchAll();
   foreach ($status as $st) {

      if ($st['status'] == 0) {
         header("location:/zonalMaintainance");
         exit;
      }
   }
   ?>

<head>

   <!-- New -->
   <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
   <!-- Bootstrap Icons-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />


   <!-- SimpleLightbox plugin CSS-->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
   <!-- Core theme CSS (includes Bootstrap)-->

   <!-- end new -->

   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>





   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


   <!-- Data table JS -->
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>

   <!-- CSS DataTables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

   <link rel="stylesheet" href="/news/css/bootstrap.min.css">
   <link href="/css/styles.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="/css/reset.min.css">
   <link rel="stylesheet" type="text/css" href="/css/style.min.css">
   <link rel="stylesheet" type="text/css" href="/css/ionicon.min.css">

   <!-- font awesome -->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

   <style>
      li {
         text-decoration: none;
      }

      .dropbtn {
         background-color: #661414;
         color: white;
         padding-right: 0.3em;
         padding-left: 0.3em;
         font-size: 16px;
         border: none;
         cursor: pointer;
         border-radius: 0.6em;
      }

      .dropbtn:hover,
      .dropbtn:focus {
         background-color: #fff;

      }

      #myInput {
         box-sizing: border-box;
         background-image: url('searchicon.png');
         background-position: 14px 12px;
         background-repeat: no-repeat;
         font-size: 16px;
         padding: 14px 20px 12px 45px;
         border: none;
         border-bottom: 1px solid #ddd;

      }

      #myInput:focus {
         outline: 3px solid #ddd;

      }

      .dropdown {
         position: relative;
         display: inline-block;


      }

      .dropdown-content {
         display: none;
         position: absolute;
         background-color: rgba(102, 20, 20, 0.5);
         min-width: 230px;
         overflow: auto;
         border: 1px solid #ddd;
         z-index: 1;
         right: 1.2em;
         top: 3em;
         border-radius: 20px;

      }

      .dropdown-content a {
         color: #fff;
         padding: 12px 16px;
         text-decoration: none;
         display: block;


      }

      .dropdown a:hover {
         background-color: #ffd400;
      }

      .show {
         display: block;
      }
      .goog-te-banner-frame.skiptranslate{display:none !important;}
   </style>

   <script src="/js/script.js" defer></script>
   <link type="text/css" rel="stylesheet" href="/news/css/style.css" />
   <link rel="stylesheet" type="text/css" href="/includes/homeStyle/style.css">


<script>
    //Get the button
    var mybutton = document.getElementById("topBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>