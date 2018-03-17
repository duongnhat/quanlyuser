<?php if (!empty($Obj) && is_array($Obj)) { ?>
	<hr>
	<h1>Sua lai thong tin</h1>
<form  method="post" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">User name</label>
      <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user name" name="user" value="<?php echo $Obj['user']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Pass word</label>
      <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter pass word" name="pass">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input  required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $Obj['email']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Dia chi</label>
      <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user name" name="diachi" value="<?php echo $Obj['diachi']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Number phone</label>
      <input required type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter number phone" name="sdt" value="<?php echo $Obj['sdt']; ?>">
    </div>  
    <div class="form-group">
      <label for="exampleInputEmail1">Ngay sinh</label>
      <input required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user name" name="ngaysinh" value="<?php echo $Obj['ngaysinh']; ?>">
    </div>
    <strong>Avata</strong><input type="file" name="myFile"><br>
    <button type="submit" name="tao" class="btn btn-primary">Edit</button>
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