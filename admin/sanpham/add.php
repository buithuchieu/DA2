<!-- Trong phần HTML -->
<div class="mb">
    <div class="box_title">THÊM MỚI SẢN PHẨM</div>
    <div class="box_content form_account">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <label for="masp">Danh mục</label><br>
            <select name="iddm">
                <?php 
                    foreach ($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo"<option value=".$id.">$name</option>";
                    }
                ?>
            </select><br>
            <label for="tensp">Tên sản phẩm:</label><br>
            <input type="text" name="tensp" id="tensp"><br>
            <label for="giasp">Giá sản phẩm:</label><br>
            <input type="text" name="giasp" id="giasp"><br>
            <label for="hinh">Ảnh sản phẩm:</label><br>
            <input type="file" name="hinh" id="hinh"><br>
            <label for="mota">Mô Tả sản phẩm:</label><br>
            <textarea name="mota" id="mota" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" name="themmoi" value="Thêm sản phẩm">
            <input type="submit" value="Nhập lại">             
            <a href="index.php?act=listsp"><input type="button" class="menu-button" value="Danh Sách"></a>      
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
