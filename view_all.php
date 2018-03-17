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
$linkid="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=id&page=".$page.">id</a>";
if(isset($_GET['xapxep'])&& isset($_GET['page'])&& !(isset($_GET['tim']))){
    if($_GET['xapxep']=='tang'){
        $sql="SELECT * FROM nguoidung ORDER BY nguoidung.".$_GET['by']." ASC limit ".$offSet.",".$itemPerPage;
        $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=id&page=".$page.">id</a>";
        $linkuser="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=user&page=".$page.">user</a>";
        $linkemail="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=email&page=".$page.">email</a>";
        $linkdiachi="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=diachi&page=".$page.">dia chi</a>";
        $linksdt="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=sdt&page=".$page.">sdt</a>";
        $linkngaysinh="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=ngaysinh&page=".$page.">ngay sinh</a>";
        
    }else if($_GET['xapxep']=='giam'){
        $sql="SELECT * FROM nguoidung ORDER BY nguoidung.".$_GET['by']." DESC limit ".$offSet.",".$itemPerPage;
        $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=id&page=".$page.">id</a>";
        $linkuser="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=user&page=".$page.">user</a>";
        $linkemail="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=email&page=".$page.">email</a>";
        $linkdiachi="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=diachi&page=".$page.">dia chi</a>";
        $linksdt="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=sdt&page=".$page.">sdt</a>";
        $linkngaysinh="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=ngaysinh&page=".$page.">ngay sinh</a>";
    }
    $mang=$view->selectUser($sql);
}

if(isset($_GET['kiem'])|| isset($_GET['tim'])){
    if(isset($_GET['kiem'])){
        $_GET['xapxep']='tang';
        $_GET['by']='id';
    }
    $soHang = $modelNguoidung->dem("SELECT COUNT(*) FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%' or nguoidung.ngaysinh LIKE '%".$_GET['tim']."%'");
    $soTrang=ceil($soHang["COUNT(*)"]/$itemPerPage);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $mang=$view->selectUser("SELECT * FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%' or nguoidung.ngaysinh LIKE '%".$_GET['tim']."%' limit ".$offSet.",".$itemPerPage);
    $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=id&tim=".$_GET['tim'].">id</a>";
    if(isset($_GET['xapxep'])){
        if($_GET['xapxep']=='giam'){
        $mang=$view->selectUser("SELECT * FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%' or nguoidung.ngaysinh LIKE '%".$_GET['tim']."%' ORDER BY nguoidung.".$_GET['by']." DESC limit ".$offSet.",".$itemPerPage);
        $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=id&tim=".$_GET['tim'].">id</a>";
        $linkuser="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=user&tim=".$_GET['tim'].">user</a>";
        $linkemail="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=email&tim=".$_GET['tim'].">email</a>";
        $linkdiachi="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=diachi&tim=".$_GET['tim'].">dia chi</a>";
        $linksdt="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=sdt&tim=".$_GET['tim'].">sdt</a>";
        $linkngaysinh="<a href= ".$_baseUrl."view_all.php?xapxep=tang&by=ngaysinh&tim=".$_GET['tim'].">ngay sinh</a>";
        }
        else if($_GET['xapxep']=='tang'){
        $mang=$view->selectUser("SELECT * FROM nguoidung WHERE nguoidung.id LIKE '%".$_GET['tim']."%' or nguoidung.user LIKE '%".$_GET['tim']."%' or nguoidung.email LIKE '%".$_GET['tim']."%' or nguoidung.diachi LIKE '%".$_GET['tim']."%' or nguoidung.sdt LIKE '%".$_GET['tim']."%' or nguoidung.ngaysinh LIKE '%".$_GET['tim']."%' ORDER BY nguoidung.".$_GET['by']." ASC limit ".$offSet.",".$itemPerPage);
        $linkid="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=id&tim=".$_GET['tim'].">id</a>";
        $linkuser="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=user&tim=".$_GET['tim'].">user</a>";
        $linkemail="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=email&tim=".$_GET['tim'].">email</a>";
        $linkdiachi="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=diachi&tim=".$_GET['tim'].">dia chi</a>";
        $linksdt="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=sdt&tim=".$_GET['tim'].">sdt</a>";
        $linkngaysinh="<a href= ".$_baseUrl."view_all.php?xapxep=giam&by=ngaysinh&tim=".$_GET['tim'].">ngay sinh</a>";
        }
    }

}
$title='Quan ly user';
$viewName="view_user_view.php";
include ("layout.php");

if(isset($_GET['page'])|| isset($_GET['kiem'])){
    if(isset($_GET['tim'])){
        echo "Tim duoc ".$soHang["COUNT(*)"]." ket qua";
    }
    if(isset($_GET['kiem'])||isset($_GET['tim'])){
        $themUrl="&tim=".$_GET['tim'];
    } else {$themUrl='';
    }
    if($_GET['page']==1){
            echo "<nav aria-label='...'><ul class='pagination'><li class='page-item disabled'><a class='page-link' href=".$_baseUrl . "view_all.php/?xapxep=".$_GET['xapxep'].$themUrl."&by=".$_GET['by']."&page=". ($page-1).">Previous</a></li>";
    }else{
        echo "<nav aria-label='...'><ul class='pagination'><li class='page-item'><a class='page-link' href=".$_baseUrl . "view_all.php/?xapxep=".$_GET['xapxep'].$themUrl."&by=".$_GET['by']."&page=". ($page-1).">Previous</a></li>";
    }
    for($i=1;$i<=$soTrang;$i++){
        if($_GET['page']==$i){
            $active='active';
        }else{
            $active='';
        }
            echo "<li class='page-item ".$active."'><a class='page-link' href=".$_baseUrl . "view_all.php/?xapxep=".$_GET['xapxep'].$themUrl."&by=".$_GET['by']."&page=".$i.">".$i."</a></li>";
    }
    if($_GET['page']==$soTrang){
            echo "<li class='page-item disabled'><a class='page-link' href=".$_baseUrl . "view_all.php/?xapxep=".$_GET['xapxep'].$themUrl."&by=".$_GET['by']."&page=". ($page+1).">Next</a></li></ul></nav>";
    }else{
        echo "<li class='page-item'><a class='page-link' href=".$_baseUrl . "view_all.php/?xapxep=".$_GET['xapxep'].$themUrl."&by=".$_GET['by']."&page=". ($page+1).">Next</a></li></ul></nav>";
    }
}
