<?php
class database{
	public function conn()
	{
		return mysqli_connect('localhost','root','','user');
		
	}
	public function query($sql)
	{
		return $this->result=mysqli_query($this->conn(),$sql);
	}
	public function assoc()
	{
	$dulieu=mysqli_fetch_assoc($this->result);
	return $dulieu;
	}	

}