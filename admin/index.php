<?php
include "../model/cart.php";
include "../model/pdo.php";
include "../model/binhluan.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/khachhang.php";
include "header.php";
include "../img/global.php";
//controller 
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        // danh mục 
        case 'adddm':
            // kiểm tra xem người dùng có click vào add ko
            if(isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm mới thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loatAll_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if(isset($_GET['id'])&& ($_GET['id']>0)){
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loatAll_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if(isset($_GET['id']) && ($_GET['id']>0)){      
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updm':
            if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id,$tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loatAll_danhmuc();
            include "danhmuc/list.php";
            break;
        // sản phẩm
        case 'addsp':
            // kiểm tra xem người dùng có click vào add ko
            if(isset($_POST['themmoi']) && $_POST['themmoi']) {
                
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                if(empty($_FILES['hinh']['name'])){
                    $hinh="";
                }else{
                    if(!isset($_SESSION['imageError'])){
                        // thư mục sẽ được lưu ảnh vào thư mục image
                        $targettOir = "../upload/";
                        // đường dẫn đến file được lưu
                        $targetFile = $targettOir.$_FILES['hinh']['name'];
                        // tiếng hành upload file ảnh
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'],$targetFile)){
                            $hinh = $targetFile ;
                        }
                    }
                }
                insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
                $thongbao = "Thêm mới thành công";
            }
            $listdanhmuc = loatAll_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if(isset($_POST['listok']) && $_POST['listok']) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            }else{
                $kyw = "";
                $iddm = 0;
            }
            $listdanhmuc = loatAll_danhmuc();
            $listsanpham = loatAll_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if(isset($_GET['id'])&& ($_GET['id']>0)){
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loatAll_sanpham("",0);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if(isset($_GET['id']) && ($_GET['id']>0)){      
                $sp = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loatAll_danhmuc();
            include "sanpham/update.php";
            break;
        case 'upsp':
            if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                if(empty($_FILES['hinh']['name'])){
                    $hinh="";
                }else{
                    if(!isset($_SESSION['imageError'])){
                        // thư mục sẽ được lưu ảnh vào thư mục image
                        $targettOir = "../upload/";
                        // đường dẫn đến file được lưu
                        $targetFile = $targettOir.$_FILES['hinh']['name'];
                        // tiếng hành upload file ảnh
                        if(move_uploaded_file($_FILES['hinh']['tmp_name'],$targetFile)){
                            $hinh = $targetFile ;
                        }
                    }
                }
                update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loatAll_danhmuc();
            $listsanpham = loatAll_sanpham("",0);
            include "sanpham/list.php";
            break;
        case 'khachhang':
            $listkhachhang = loatAll_khachhang();
            include "khachhang/khachhang.php";
                break;
        case 'binhluan':
            $listbinhluan = loatAll_binhluan(0);
            include "binhluan.php";
                break;
        case 'thongke':
            $listthongke = thongke();
            include "thongke/thongke.php";
                break;
        case 'bieudo':
            $listthongke = thongke();
            include "thongke/bieudo.php";
                break;
        default:
            
            break;
    }
}else{
    include "home.php"; 
}
include "footer.php"; 

?>