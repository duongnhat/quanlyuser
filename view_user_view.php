<!DOCTYPE html>
<html>
<head>
	<title>view user</title>
</head>
<body>
<table border="1px" cellspacing="0px" width="100%">
	<tr>
		<th><?php echo $linkid;?></th>
		<th>user</th>
		<th>email</th>
		<th>dia chi</th>
		<th>sdt</th>
                <th>ngay sinh</th>
		<th>profile</th>
		<th>destroy</th>
	</tr>
	<?php
	
	foreach($mang as $row){	
		?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['user']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['diachi']; ?></td>
			<td><?php echo $row['sdt']; ?></td>
                        <td><?php $originalDate = $row['ngaysinh'];
                            $newDate = date("d/m/Y", strtotime($originalDate));
                            echo $newDate; ?></td>
			<td><a href="<?php echo $_baseUrl . 'edit_user.php?id='. $row['id']; ?>">Edit</a></td>
			<td><a href="<?php echo $_baseUrl ."destroy.php?id=".$row['id']; ?>">X</a></td>
			
        </form>
		</tr>
		
		<?php
	}

	?>
	<form method="GET" action="view_all.php" >
		<strong>seach </strong><input type="text" style="width: 400px" name="tim" value="<?php if(isset($_GET['tim'])){echo $_GET['tim'];}?>">
		<input type="submit" name="kiem" value="kiem">
	</form><hr>
</table>
</body>
</html>