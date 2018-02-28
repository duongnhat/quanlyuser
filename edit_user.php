<?php
include ("thuvien.php");	
$edit_user = new truyCap;

// Save ncc
if (isset($_POST['tao'])&&($_POST['user']!='')&&($_POST['email']!='')){
	$edit=array($_GET['id'],$_POST['user'],$_POST['pass'],$_POST['email'],$_POST['diachi'],$_POST['sdt']);
	
	$result = $edit_user->save($edit);
	if($result){
		echo 'edit thanh cong';
	}
	else { echo 'edit khong thanh cong';}
}else if(isset($_POST['tao'])&&(($_POST['user']=='')||($_POST['email']==''))){echo 'Khong duoc pha';}

// Display edit form
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$Obj = $edit_user->getOne($id);
	include ("view_edit_user.php");
}
$_baseUrl = 'http://localhost/';
?>
<a href="<?php echo $_baseUrl ."view_all.php"; ?>">view all</a>
<a href="<?php echo $_baseUrl ."create.php"; ?>">new user</a>
