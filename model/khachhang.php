<?php
function loatAll_khachhang(){
    $sql="select * from taikhoan order by id ";
    $listkhachhang = pdo_query($sql);
    return $listkhachhang;
}
 ?>