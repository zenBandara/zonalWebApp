<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php'); ?>


  <nav class="navbar navbar-default visible-xs" style="margin-bottom: 0;">

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a target="main_frame" href="/admin_cruds/announcement_crud.php">Manage Announcements</a>
      <a target="main_frame" href="/admin_cruds/notice_crud.php">Manage Notices</a>
      <a target="main_frame" href="/admin_cruds/faq_crud.php">Manage FAQs</a>
      <a target="main_frame" href="/admin_cruds/eventcal_crud.php">Manage Events</a>
      <a target="main_frame" href="/admin_cruds/relatedweb_crud.php">Manage Related Websites</a>
      <a target="main_frame" href="/admin_cruds/vacancy_crud.php">Manage Job Vacancies</a>
      <a target="main_frame" href="/admin_cruds/webcontact_crud.php">Manage Zonal Contacts</a>
      <a target="main_frame" href="/admin_cruds/additional_crud.php">Manage General Info.</a>
      <a target="main_frame" href="/admin_cruds/branchInfo_crud.php">Manage Branch Info.</a>
      

      


      <span href="#" style="color: #686b70; margin-left:30%; padding-top:50%; bottom:2%;  position: absolute;"> System Panel® v1.0</span>
    </div>
    
    <span style="font-size:25px;cursor:pointer; margin-left:2%; " onclick="openNav()"><span style="color:brown;font-size:28px;">&#9776; &nbsp;</span>GENERAL</span>
  </nav>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs" style="text-align: center;">
      <br><br>
      <i class="bi bi-house-door-fill fa-2x"></i>
        <h2><strong>GENERAL</strong></h2>
        <ul class="nav nav-pills nav-stacked">
    
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/announcement_crud.php">Manage Announcements</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/notice_crud.php">Manage Notices</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/faq_crud.php">Manage FAQs</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/eventcal_crud.php">Manage Event Calender</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/relatedweb_crud.php">Manage Related Websites</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/vacancy_crud.php">Manage Job Vacancies</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/webcontact_crud.php">Manage Zonal Contacts</a></b></li>
          
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/additional_crud.php">Manage General Info.</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/branchInfo_crud.php">Manage Branch Info.</a></b></li>
        </ul>
      </div>


      <div class="col-sm-9" style="height: 100vh; padding: 0;">

        <iframe class="m_frame" name="main_frame" src="/admin_cruds/announcement_crud.php" style="width: 100%; height: 100vh; border: none;"></iframe>

      </div>
    </div>
  </div>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>


<?php require_once ($_SERVER['DOCUMENT_ROOT']. '/includes/footer.php'); ?>