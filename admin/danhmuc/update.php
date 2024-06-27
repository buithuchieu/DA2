<?php 
if(is_array($dm)){
    extract($dm); // sử dụng để chuyển các phần tử trong một mảng thành các biến động
}
?>
<div class="mb">
    <div class="box_title">Cập nhập sản phẩm mới </div>
    <div class="box_content form_account">
        <form action="index.php?act=updm" method="post">
            <label for="maloai">Mã sản phẩm:</label><br>
            <input type="text" name="maloai" id="maloai" disabled><br>
            <label for="tenloai">Tên sản phẩm:</label><br>
            <input type="text" name="tenloai" id="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name ; ?>"><br>
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id ; ?>"><br>
            <input type="submit" name="capnhat" value="Cập nhập">
            <input type="submit" value="Nhập lại">
            <a href="index.php?act=listdm" class="list-button"><input type="button" value="Danh Sách"></a>
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
