<!DOCTYPE html>
<html>
<body>
<?php
$general = '';
$institutes = '';
$staff = '';
$news = '';
$resources = '';

if (!isset($_SESSION['userId'])) {
  header('HTTP/1.0 403 Forbidden');
  exit;
}

if (isset($_POST['save'])) {
    $general = $_POST['genaral'];
    $institutes = $_POST['institutes'];
    $staff = $_POST['staff'];
    $news = $_POST['news'];
    $resources = $_POST['resources'];

    echo $general.'<br>';
    echo $institutes.'<br>';
    echo $staff.'<br>';
    echo $news.'<br>';
    echo $resources.'<br>';


}
?>

<h3>Form with checkboxes</h3>

<form action="user_permission.php" method="POST" enctype="multipart/form-data">
  <input type="checkbox" name="genaral" value="t">
  <label> Genaral</label><br>
  <input type="checkbox" name="institutes" value="t">
  <label> Institutes</label><br>
  <input type="checkbox" name="staff" value="t" >
  <label>Staff</label><br>
  <input type="checkbox" name="news" value="t" >
  <label>News</label><br>
  <input type="checkbox" name="resources" value="t">
  <label>Resources</label>
  <input type="submit" value="Save">
</form>

</body>


</html>