<?php 
if(is_array($sp)){
    extract($sp); // sử dụng để chuyển các phần tử trong một mảng thành các biến động
}
$hinhload="../upload/".$img;
if(is_file($hinhload)){
    $hinh="<img src='".$hinhload."' height='80'>";
}               
?>
<div class="mb">
    <div class="box_title">Cập nhập sản phẩm mới </div>
    <div class="box_content form_account">
    <form action="index.php?act=upsp" method="post" enctype="multipart/form-data">
            <select name="iddm">
                <option value="0" selected>Tất cả</option>
                <?php
                    foreach ($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                            if($iddm == $id) $s="selected" ; else $s="";
                            echo ' <option value="'.$id.'" '.$s.'>'.$name.'</option>';
                    }
                 ?>
            </select><br>
            <label for="tensp">Tên sản phẩm:</label><br>
            <input type="text" name="tensp" id="tensp" value="<?=$sp['name']?>"><br>
            <label for="giasp">Giá sản phẩm:</label><br>
            <input type="text" name="giasp" id="giasp" value="<?=$price?>"><br>
            <label for="hinh">Ảnh sản phẩm:</label><br>
            <input type="file" name="hinh" id="hinh"><?=$hinh?><br>
            <label for="mota">Mô Tả sản phẩm:</label ><br>
            <textarea name="mota" id="mota" cols="20" rows="10"><?=$mota?></textarea>
            <input type="hidden" name="id" value="<?=$sp['id']?>">
            <input type="submit" name="capnhat" value="Cập nhật">
            <input type="submit" value="Nhập lại">             
            <a href="index.php?act=listsp" class="list-button"><input type="button" value="Danh Sách"></a>    
        </form>
        <p>
            <?php
            if(isset($thongbao) && ($thongbao !="")){
                echo $thongbao;
            }
            ?>
            </p>
    </div>
</div>
