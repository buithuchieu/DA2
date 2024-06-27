<?php
function viewcart($del) {
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th ='<th>Thao tác</th>'; 
    }else{
        $xoasp_th ='';
    }
    echo '<tr>
    <th>Hình</th>
    <th>Tên</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    '.$xoasp_th.'
</tr>
    ';
    foreach ($_SESSION['mycart'] as $cart){
        $img=$img_path.$cart['2'];
        $ttien= ($cart['3'] * $cart['4']) ;
        if($del==1){
            $xoasp_th ='<th>Thao tác</th>';
            $xoasp_td ='<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a></td>';
        }else{
            $xoasp_th ='';
            $xoasp_td ='';
        }
        echo'
            <tr>
            <td><img src="'.$img.'" style="width: 30%;"></td>
            <td>'.$cart['1'].'</td>
            <td>'.$cart['3'].'</td>
            <td>'.$cart['4'].'</td>
            <td>'.$ttien.'</td>
            '.$xoasp_td.'
             </tr>';
        $tong= $tong + $ttien;
        $i+=1;
    }
    echo '<tr>
         <td></td>
         <td></td>
         <td></td>
         <td>Tổng đơn hàng</td>   
         <td>'.$tong.'</td>
    </tr>';
}

function bill_chi_tiet($listbill) {
    global $img_path;
    $tong=0;
    $i=0;
    echo '<tr>
    <th>Hình</th>
    <th>Tên</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
</tr>
    ';
    foreach ($listbill as $cart){
        $img=$img_path.$cart['img'];
        $tong=$cart['thanhtien'];
        echo'
            <tr>
            <td><img src="'.$img.'" style="width: 30%;"></td>
            <td>'.$cart['name'].'</td>
            <td>'.$cart['price'].'</td>
            <td>'.$cart['soluong'].'</td>
            <td>'.$cart['thanhtien'].'</td>
             </tr>';
        $i+=1;
    }
    echo '<tr>
         <td></td>
         <td></td>
         <td></td>
         <td>Tổng đơn hàng</td>   
         <td>'.$tong.'</td>
    </tr>';
}

function tongdonhang() {
    $tong=0;
    foreach ($_SESSION['mycart'] as $cart){
        $ttien= ($cart['3'] * $cart['4']) ;
        $tong= $tong + $ttien;
    }
    return $tong;
}

function insert_bill($name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang) {
    $sql = "insert into bill(bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,tongdonhang) values('$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_last($sql);
}

function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill) {
    $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id){
    $sql = "select * from bill where id = ".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill){
    $sql = "select * from cart where idbill = ".$idbill;
    $bill = pdo_query($sql);
    return $bill;
}

function ht_donhang(){
    $sql = "SELECT * FROM bill JOIN cart ON bill.id = cart.idbill;";
    $bill = pdo_query($sql);
    return $bill;
}

function thongke(){
    $sql="SELECT 
            danhmuc.id AS madm, 
            danhmuc.name AS tendm, 
            COUNT(sanpham.id) AS countsp, 
            MIN(sanpham.price) AS minprice, 
            MAX(sanpham.price) AS maxprice, 
            AVG(sanpham.price) AS avgprice
        FROM 
            danhmuc
        LEFT JOIN 
            sanpham ON danhmuc.id = sanpham.iddm
        GROUP BY 
            danhmuc.id, danhmuc.name
        ORDER BY 
            danhmuc.id DESC;
        ";
    $listtk = pdo_query($sql);
    return $listtk;
}

 ?>