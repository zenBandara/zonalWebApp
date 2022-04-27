<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/header.php'); ?>

  <nav class="navbar navbar-default visible-xs" style="margin-bottom: 0;">

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a target="main_frame" href="/admin_cruds/staff_crud.php">Academic Staff</a>
      <a target="main_frame" href="/admin_cruds/nonac_staff_crud.php">Non-academic Staff</a>
      <a target="main_frame" href="/admin_cruds/div_staff_crud.php">Divisional Staff</a>
      <a target="main_frame" href="/admin_cruds/contentChanges_crud.php">Zonal Director Info.</a>
      <a target="main_frame" href="/admin_cruds/role_crud.php">Manage Role</a>
      <a target="main_frame" href="/admin_cruds/subject_crud.php">Manage Subject</a>
      <a target="main_frame" href="/admin_cruds/grade_crud.php">Manage Grade</a>


      <span href="#" style="color: #686b70; margin-left:30%; padding-top:50%; bottom:2%;  position: absolute;"> System Panel® v1.0</span>
    </div>
    
    <span style="font-size:25px;cursor:pointer; margin-left:2%; " onclick="openNav()"><span style="color:brown;font-size:28px;">&#9776; &nbsp;</span>STAFF OPERATIONS</span>
  </nav>



  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs" style="text-align: center;">
      <br><br><br><br><br>
      <i class="bi bi-people-fill fa-3x"></i>
        <h2><strong>STAFF OPERATIONS</strong></h2>
        <ul class="nav nav-pills nav-stacked">
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/staff_crud.php">Academic Staff</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/nonac_staff_crud.php">Non-academic Staff</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/div_staff_crud.php">Divisional Staff</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/contentChanges_crud.php">Zonal Director Info.</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/role_crud.php">Manage Role</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/grade_crud.php">Manage Grade</a></b></li>
          <li><b><a class="btn btn-admin btn-xxl" target="main_frame" href="/admin_cruds/subject_crud.php">Manage Subject</a></b></li>

        </ul>
      </div>


      <div class="col-sm-9" style="height: 100vh; padding: 0;">

        <iframe class="m_frame" name="main_frame" src="/admin_cruds/staff_crud.php" style="width: 100%; height: 100vh; border: none;"></iframe>

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

</body>

</html>

<?php require_once ($_SERVER['DOCUMENT_ROOT']. '/includes/footer.php'); ?>