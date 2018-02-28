<?php
include("thuvien.php");
$destroy=new truyCap;
if(isset($_GET['id'])){
	$sql="DELETE FROM `nguoidung` WHERE `nguoidung`.`id` = ".$_GET['id'];
	$destroy->conn();
	$destroy->query($sql);
}
$_baseUrl = 'http://localhost/';
?>
<a href="<?php echo $_baseUrl ."view_all.php"; ?>">view all</a>
<a href="<?php echo $_baseUrl ."create.php"; ?>">new user</a>