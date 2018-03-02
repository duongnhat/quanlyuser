<?php
include("thuvien.php");
$view=new truyCap;
$columnName="nguoidung.user";
$dataName="nguoidung";	
$itemPerPage=4;	
$modelNguoidung = new PhanTrang;
$soHang=$modelNguoidung->demDong($columnName,$dataName);
$soTrang=ceil($soHang['tong']/$itemPerPage);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$mang = $modelNguoidung->get($page, $dataName, $itemPerPage);
if(!isset($_GET['page'])){
    $_GET['page']=1;
}
if(isset($_GET['page'])){
    $offSet = ($_GET['page']-1) * $itemPerPage;
}
$linkid="<a href= ".$_baseUrl."view_all.php?xapxep=tang&page=".$page.">id</a>";
if(isset($_GET['xapxep'])&& isset($_GET['page'])&& !(isset($_GET['tim']))){
    if($_GET['xapxep']=='tang'){
            $sql="SELECT * FROM nguoidung ORDER BY nguoidung.id ASC limit ".$offSet.",".$itemPerPage;
            $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=giam&page=".$page.">id</a>";
    }else if($_GET['xapxep']=='giam'){
            $sql="SELECT * FROM nguoidung ORDER BY nguoidung.id DESC limit ".$offSet.",".$itemPerPage;
            $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=tang&page=".$page.">id</a>";
    }
    $mang=$view->selectUser($sql);
}

if(isset($_GET['kiem'])|| isset($_GET['tim'])){
    if(isset($_GET['kiem'])){
        $_GET['xapxep']='tang';
    }
    $soHang = $modelNguoidung->dem("SELECT COUNT(*) FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%' or nguoidung.ngaysinh LIKE '%".$_GET['tim']."%'");
    $soTrang=ceil($soHang["COUNT(*)"]/$itemPerPage);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $mang=$view->selectUser("SELECT * FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%' or nguoidung.ngaysinh LIKE '%".$_GET['tim']."%' limit ".$offSet.",".$itemPerPage);
    $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=giam&tim=".$_GET['tim'].">id</a>";
    if(isset($_GET['xapxep'])){
        if($_GET['xapxep']=='giam'){
        $mang=$view->selectUser("SELECT * FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%' or nguoidung.ngaysinh LIKE '%".$_GET['tim']."%' ORDER BY nguoidung.id DESC limit ".$offSet.",".$itemPerPage);
        $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=tang&tim=".$_GET['tim'].">id</a>";
        }
        else if($_GET['xapxep']=='tang'){
        $mang=$view->selectUser("SELECT * FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%' or nguoidung.ngaysinh LIKE '%".$_GET['tim']."%' ORDER BY nguoidung.id ASC limit ".$offSet.",".$itemPerPage);
        $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=giam&tim=".$_GET['tim'].">id</a>";
        }
    }

}

$viewName="view_user_view.php";
include ("layout.php");

if(isset($_GET['page'])|| isset($_GET['kiem'])){
    echo "<br/>"."Page ".$_GET['page'];

    echo "<p align='center'>";
    if(isset($_GET['kiem'])||isset($_GET['tim'])){
        $themUrl="&tim=".$_GET['tim'];
    } else{$themUrl='';
    }
    if($page>1 & $page<=$soTrang){
            echo "<td><a href=".$_baseUrl . "view_all.php/?xapxep=".$_GET['xapxep'].$themUrl."&page=". ($page-1).">"."Prev"."</a></td>"."--";
    }
    for($i=1;$i<=$soTrang;$i++){
            echo "<td><a href=".$_baseUrl . "view_all.php/?xapxep=".$_GET['xapxep'].$themUrl."&page=". $i.">".$i."</a></td>"."  ";
    }
    if($soTrang>$page & $page>=1){
            echo "--"."<td><a href=".$_baseUrl . "view_all.php/?xapxep=".$_GET['xapxep'].$themUrl."&page=". ($page+1).">"."Next"."</a></td>";
    }
    echo "</p>";
}
