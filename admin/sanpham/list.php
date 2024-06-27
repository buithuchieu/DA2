<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
        <form action="index.php?act=listsp" method="post">
            Tìm kiếm theo tên
            <input type="text" name="kyw"><br>
            <select name='iddm'>
                <option value='0' selected>Tất cả</option>
                <?php 
                    foreach ($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo "<option value=".$id.">$name</option>";
                    }
                ?>
            </select>
            <input type="submit" class="menu-button" value="Tìm kiếm" name="listok">
        </form>
    </div>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN Sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Lượt xem</th>
                        <th></th>
                    </tr>
                    <?php 
                        foreach ($listsanpham as $sanpham){
                            extract($sanpham);
                            $suasp = "index.php?act=suasp&id=".$id;
                            $xoasp = "index.php?act=xoasp&id=".$id;
                            $hinhload="../upload/".$img;
                            if(is_file($hinhload)){
                                $img="<img src='".$hinhload."' height='80'>";
                            }
                            echo'<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$price.'</td>
                                <td>'.$img.'</td>
                                <td>'.$mota.'</td>
                                <td>'.$luotxem.'</td>
                                <td><a href='.$suasp.'><input type="button" class="menu-button" value="Sửa"></a>
                                <a href='.$xoasp.'><input type="button" class="menu-button" value="Xóa"></a></td>
                            </tr>';
                        } 
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20 menu-button" type="button" value="CHỌN TẤT CẢ">
                <input  class="mr20 menu-button" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=addsp"> <input  class="mr20 menu-button" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>
