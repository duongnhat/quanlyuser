<?php
include("thuvien.php");
$view=new truyCap;
$mang=$view->selectUser("SELECT * FROM nguoidung");
if(isset($_GET['kiem'])){
	$mang=$view->selectUser("SELECT * FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%'");
}
$link='<a href="http://localhost/view_all_tang.php">user</a>';
include("view_user_view.php");


?>
<a href="<?php echo $_baseUrl ."create.php"; ?>">new user</a>