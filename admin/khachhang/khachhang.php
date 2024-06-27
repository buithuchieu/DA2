<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH KHÁCH HÀNG</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>Mã Tk </th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th></th>
            </tr>
            <?php 
                foreach ($listkhachhang as $khachhang){
                    extract($khachhang);
                    $suadm = "index.php?act=suadm&id=".$id;
                    $xoadm = "index.php?act=xoadm&id=".$id;
                    echo'<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$user.'</td>
                        <td>'.$pass.'</td>
                        <td>'.$email.'</td>
                        <td>'.$address.'</td>
                        <td>'.$tel.'</td>
                        <td>'.$role.'</td>
                        <td><a href='.$suadm.'><input type="button" value="Sửa"></a>
                        <a href='.$xoadm.'><input type="button" value="Xóa"></a></td>
                         </tr>';
                } 
            ?>

            
           </table>
           </div>
          </form>
         </div>
        </div>