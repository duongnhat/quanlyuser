<?php
include("thuvien.php");
$view=new truyCap;
$mang=$view->selectUser("SELECT * FROM nguoidung ORDER BY nguoidung.user ASC");
$link='<a href="http://localhost/view_all_giam.php">user</a>';
include("view_user_view.php");
$_baseUrl = 'http://localhost/';
?>
<a href="<?php echo $_baseUrl ."create.php"; ?>">new user</a>