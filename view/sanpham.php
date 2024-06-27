<main class="catalog  mb ">
  <div class="boxleft">
      <div class="  mb">
        <div class="box_title">Sản phẩm  <strong> : <?=$tendm?></strong></div>
        <div class="box_content">
        <div class="items">
        <?php
            $i=0;
            foreach($dssp as $sp){
                extract($sp);
                if(($i==2 ) || ($i==5 ) || ($i==8 ) || ($i==11)){
                  $mr ="mr";
                }else{
                  $mr="";
                }
                $hinh = $img_path.$img;
                $licksp="index.php?act=sanphamct&idsp=".$id;
                echo '<div s class="box_items_img '.$mr.'">
                          <a class="item_name" href="'.$licksp.'" ><img src="'.$hinh.'" alt=""></a>
                          <a class="item_name" href="'.$licksp.'" >'.$name.'</a>
                          <p class="price">'.$price.'</p>
                      </div>';
            }
             ?>
             </div>
        </div>
      </div>
    </div>
        <div class="boxright">      
            <?php include "boxright.php"?>
        </div>
    </main>

