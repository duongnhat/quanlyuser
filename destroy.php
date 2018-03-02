<?php
include("thuvien.php");
$destroy=new truyCap;
if(isset($_GET['id'])){
	$sql="DELETE FROM `nguoidung` WHERE `nguoidung`.`id` = ".$_GET['id'];
	$destroy->conn();
	$destroy->query($sql);
}
redirect($_baseUrl."view_all.php"); 