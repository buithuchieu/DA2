<?php
session_start();
include "../model/pdo.php";
include "../model/cart.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "header.php";
include "../img/global.php";

if(!isset($_SESSION['mycart'])){
    $_SESSION['mycart']=[];
}

$newsp = loatAll_sanpham_home();
$dsdm = loatAll_danhmuc();
$spyt=loatAll_sanpham_top10();

if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case "sanphamct":
            if (isset($_GET['idsp'])&& $_GET['idsp'] > 0){
                $id = $_GET['idsp'];
                $sp_cung_loai= loadone_sanpham_cungloai($id);
                $onesp = loadone_sanpham($id);
                include "sanphamct.php";
            }else{
                include "home.php";
            }
            break;
        case "sanpham":
            if (isset($_POST['kyw'])&& $_POST['kyw'] > 0){
                $kyw = $_POST['kyw'];
            }else{
                $kyw ="";
            }
            if (isset($_GET['iddm'])&& $_GET['iddm'] > 0){
                $iddm = $_GET['iddm'];
            }else{
                $iddm = 0;
            }
            $dssp=loatAll_sanpham($kyw,$iddm);
            $tendm=load_ten_sanpham($iddm);
            include "sanpham.php";
            break;
        case "dangky":
            if(isset($_POST['dangky']) && $_POST['dangky']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                dangky($user,$pass,$email,$address,$tel,$role);
                $thongbao = "Đăng ký thành công, hãy đăng nhập tài khoản";
            }
            include "taikhoan/dangky.php";
            break;
        case "dangnhap":
            if(isset($_POST['dangnhap']) && $_POST['dangnhap']){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $check=check($user,$pass);
                if(is_array($check)){
                    $_SESSION['user'] = $check;
                    include "home.php";
                }else{
                    $thongbao = "Tài khoản không tồn tại";
                    include "home.php";
                }
            }
            break;
        case "edit_taikhoan":
            if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                update_taikhoan($id,$user,$pass,$email,$address,$tel,$role);
                $_SESSION['user']=check($user,$pass);
                $thongbao="Cập nhật thành công";
            }
            include "taikhoan/edit_taikhoan.php";
            break;
        case "xoa":
            unset($_SESSION['user']);
            header("location: index.php");
            break;
        case "quenmk":
            if(isset($_POST['gui']) && $_POST['gui']) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if(is_array($checkemail)){
                    $thongbao = "Mật khẩu của bạn là ".$checkemail['pass'];
                }else{
                    $thongbao="Email không tồn tại";
                }
            }
            include "taikhoan/quenmk.php";
            break;
        case "addtocart":
            if(isset($_POST['addtocart']) && ($_POST['addtocart'])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1 ;
                $thanhtien= $soluong * $price;
                $spadd=[$id,$name,$img,$price,$soluong,$thanhtien];
                array_push($_SESSION['mycart'],$spadd);
            }
            include "cart/viewcart.php";
            break;
        case "delcart":
            if(isset($_GET['idcart'])){
                array_splice($_SESSION['mycart'],$_GET['idcart'],1);
            }else{
                $_SESSION['mycart']=[];
            }
            header('Location: index.php?act=addtocart');
            break;
        case "bill":
            include "cart/bill.php";
            break;
        case "mybill":
            $hienthi = ht_donhang();
            include "cart/mybill.php";
            break;    
        case "billcomfirm":
            if(isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang=tongdonhang();
                $idbill=insert_bill($name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
                    foreach($_SESSION['mycart'] as $cart){
                        insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                    }
            }
            $bill=loadone_bill($idbill);
            $listbill=loadall_cart($idbill);
            unset($_SESSION['mycart']);
            include "cart/billcomfirm.php";
            break;
        default:
            include "home.php";
            break;
    }
}else{
    include "home.php";
}
include "footer.php"; 

?>