<?php
include("thuvien.php");
$user = new truyCap;
include("view_create.php");
if(isset($_POST['tao'])&&($_POST['user']!='')&&($_POST['pass']!='')&&($_POST['email']!='')&& kiemTraEmail($_POST['email'])){
	$name=$_POST['user'];
	$pass=$_POST['pass'];
	$email=$_POST['email'];
	$sql="INSERT INTO nguoidung(`user`,`password`,`email`) VALUES ('$name','$pass','$email')";
	$user->conn();
	$user->query($sql);
	echo 'Tao Thanh Cong';
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
?>
<br>
<a href="<?php echo $_baseUrl ."view_all.php"; ?>">view all</a>