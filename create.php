<?php
include("thuvien.php");
$user = new truyCap;
$title='Tao moi user';
$viewName="view_create.php";
include ("layout.php");
if(isset($_POST['tao'])&&($_POST['user']!='')&&($_POST['pass']!='')&&($_POST['email']!='')&& kiemTraEmail($_POST['email'])){
	$name=$_POST['user'];
	$pass=$_POST['pass'];
        $repass=$_POST['repass'];
	$email=$_POST['email'];
        if($pass==$repass){
            $sql="INSERT INTO nguoidung(`user`,`password`,`email`) VALUES ('$name','$pass','$email')";
            $user->conn();
            $real=$user->query($sql);
            if($real){
                echo 'Tao Thanh Cong';
            } 
        }else{
            echo 'pass khong trung khop';
        }

}else if(isset($_POST['tao'])&&(($_POST['user']=='')||($_POST['pass']=='')||($_POST['email']==''))){echo 'Khong duoc pha';}

function kiemTraEmail($subject)
	{
		$partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
		if(preg_match($partten ,$subject, $matchs)){
			return true;
		}
		else {
			echo "email khong hop le";
			return false;
			
		}
	}

