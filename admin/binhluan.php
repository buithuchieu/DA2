<div class="row2">
         <div class="row2 font_title">
          <h1>BÌNH LUẬN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>ID</th>
                <th>Nội dung</th>
                <th>Iduser</th>
                <th>IDpro</th>
                <th>Ngày bình luận</th>
            </tr>
            <?php 
                foreach ($listbinhluan as $bl){
                    extract($bl);
                    echo'<tr>
                        <td>'.$id.'</td>
                        <td>'.$noidung.'</td>
                        <td>'.$iduser.'</td>
                        <td>'.$idpro.'</td>
                        <td>'.$ngaybinhluan.'</td>
                         </tr>';
                } 
            ?>

           </table>
           </div>
          </form>
         </div>
        </div>