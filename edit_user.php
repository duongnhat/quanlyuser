<?php
include ("thuvien.php");	
$edit_user = new truyCap;
$title='Edit user';
if (isset($_POST['tao'])&&($_POST['user']!='')&&($_POST['email']!='')){
	$edit=array($_GET['id'],$_POST['user'],$_POST['pass'],$_POST['email'],$_POST['diachi'],$_POST['sdt'],$_POST['ngaysinh']);
	
	$result = $edit_user->save($edit);
	if($result){
		echo 'edit thanh cong';
	}
	else { echo 'edit khong thanh cong';}
}else if(isset($_POST['tao'])&&(($_POST['user']=='')||($_POST['email']==''))){echo 'Khong duoc pha';}

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$Obj = $edit_user->getOne($id);
        $viewName="view_edit_user.php";
        include ("layout.php");

}
