  <main class="catalog  mb ">
  <div class="boxleft">
      <div class="mb">
             <?php 
                extract($onesp);
            ?>
        <div class="box_title"><?=$name?></div>
        <div class="box_content">
            <?php 
                extract($onesp);
                $hinh = $img_path.$img;
                echo '<img src="'.$hinh.'" alt=""><br>';
                echo 'Giá tiền : '. $price .' VND';
                echo'<br>';
                echo 'Mô tả sản phẩm : '.$mota; 
            ?>
        </div>
      </div>
      <div class=" mb">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script>
          $(document).ready(function(){
              $("#binhluan").load("binhluan/binhluanfrom.php?idpro=<?=$id?>");
          });
      </script>
      <div class=" mb">
        <div class="box_title">Bình luận</div>
        <div class="box_content">
        <div class="mb" id="binhluan"></div>
        </div>
      </div>
      </div>
      
      <div class=" mb">
        <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
        <div class="box_content">
        <?php 
                foreach ($sp_cung_loai as $spcl){
                    extract($spcl);
                    $linksp = 'index.php?act=sanphamct&idsp=' . $id;
                    echo '<li><a href="' . $linksp . '">' . $name . '</a></li>';
                }
            ?>
        </div>
      </div>
    </div>
        <div class="boxright">      
            <?php include "boxright.php"?>
        </div>
    </main>

