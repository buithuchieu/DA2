<div class="row2">
         <div class="row2 font_title">
          <h1>Thống kê</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Số lượng</th>
                <th>Giá cao nhất</th>
                <th>Giá thấp nhất</th>
                <th>Giá trung bình</th>
            </tr>
            <?php 
                foreach ($listthongke as $tk){
                    extract($tk);
                    echo'<tr>
                        <td>'.$madm.'</td>
                        <td>'.$tendm.'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$minprice.'</td>
                        <td>'.$maxprice.'</td>
                        <td>'.$avgprice.'</td>
                         </tr>';
                } 
            ?>    
            <a href="index.php?act=bieudo" class="list-button"><input type="button" value="Thống kê theo biểu đồ"></a>     
           </table>
           </div>
          </form>
         </div>
        </div>