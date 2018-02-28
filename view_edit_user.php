<?php if (!empty($Obj) && is_array($Obj)) { ?>
	<hr>
	<h1>Sua lai thong tin</h1>
	<form method="post" action="" method="POST" enctype="multipart/form-data">
		<strong>User Name </strong><input required type="text" style="width: 500px" name="user" value="<?php echo $Obj['user']; ?>"/><br>
		<strong>PassWord </strong><input type="password" style="width: 500px" name="pass" /><br>
		<strong>Email </strong><input required type="email" style="width: 500px" name="email" value="<?php echo $Obj['email']; ?>"/><br>
		<strong>Dia Chi </strong><input required type="text" style="width: 500px" name="diachi" value="<?php echo $Obj['diachi']; ?>"/><br>
		<strong>sdt </strong><input required type="number" style="width: 500px" name="sdt" value="<?php echo $Obj['sdt']; ?>"/><br>
		<strong>Avata</strong><input type="file" name="myFile"><br>
		<input type="submit" name="tao" value="edit"/><br>
		
	</form>
<?php } 
if(isset($_POST['tao'])&& ($_FILES['myFile']['name'] != NULL)){
	  if($_FILES['myFile']['type'] == "image/jpeg" || $_FILES['myFile']['type'] == "image/png" || $_FILES['myFile']['type'] == "image/gif"){ 
		$file = $_FILES['myFile']['tmp_name'];
		 move_uploaded_file($_FILES['myFile']['tmp_name'],"file/".$_FILES['myFile']['name']);
		$avata=new database;
		$avata->query("UPDATE nguoidung SET nguoidung.avataname='".$_FILES['myFile']['name']."' WHERE nguoidung.id='".$_GET['id']."'");
	  }else{
		  echo "Kiểu file không hợp lệ";
	  }

}
	?>