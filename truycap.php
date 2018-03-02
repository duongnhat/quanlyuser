<?php
class truyCap extends database{

	public function selectUser($sql='SELECT * FROM nguoidung')
	{       
		$this->conn();
		$this->query($sql);
		$mang=array();
		while($row=$this->assoc()){
			$mang[]=$row;
		}
		return $mang;
	}
	public function save($edit)
	{
		for($i=0;$i<6;$i++){
			$edit[$i]=$this->baoMat($edit[$i]);
		}
		$this->conn();
		$sql="UPDATE nguoidung SET nguoidung.id='".$edit['0']."',nguoidung.user='".$edit['1']."',nguoidung.password='".$edit['2']."',nguoidung.email='".$edit['3']."',nguoidung.diachi='".$edit['4']."',nguoidung.sdt='".$edit['5']."',nguoidung.ngaysinh='".$edit['6']."' WHERE nguoidung.id='".$edit['0']."'";
		return $this->query($sql);
	}
	public function getOne($id)
	{
		$this->conn();
		$sql="select * from nguoidung where nguoidung.id='$id'";
		$this->query($sql);
		return $this->assoc();
	}
	public function baoMat($bien)
	{
		return mysqli_real_escape_string($this->conn(), $bien);
	}

}
