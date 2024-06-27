<?php
function loatAll_binhluan($idpro){
    $sql="select * from binhluon where 1 ";
    if($idpro>0) $sql.= "and idpro='".$idpro."'";
    $sql.="order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan) {
    $sql = "insert into binhluon(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
 ?>