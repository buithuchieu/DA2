
  <main class="catalog  mb ">
          <div  class="boxleft">
               <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                      <img src="../img/anh2.jpg">
                      <div class="text">Caption Text</div>
                  </div>

                  <div class="mySlides fade">
                      <img src="../img/anh4.jpg">
                      <div class="text">Caption Two</div>
                  </div>

                  <div class="mySlides fade">
                      <img src="../img/anh5.jpg">
                      <div class="text">Caption Three</div>
                  </div>
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
               </div>       
          <div class="items">
            <?php
            $i=0;
            foreach($newsp as $sp){
                extract($sp);
                if(($i==2 )||($i==5 )||($i==8 )){
                  $mr ="mr";
                }else{
                  $mr="";
                }
                $hinh = $img_path.$img;
                $licksp="index.php?act=sanphamct&idsp=".$id;
                echo '<div  class="box_items_img '.$mr.'">
                          <a class="item_name" href="'.$licksp.'" ><img src="'.$hinh.'" alt=""></a>
                          <a class="item_name" href="'.$licksp.'" >'.$name.'</a>
                          <p class="price">'.$price.'</p>
                          <form action="index.php?act=addtocart" method="post">
                          <input type="hidden" name="id" value="'.$id.'">
                          <input type="hidden" name="name" value="'.$name.'">
                          <input type="hidden" name="img" value="'.$img.'">
                          <input type="hidden" name="price" value="'.$price.'">
                          <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                          </form>
                      </div>';
            }
             ?>
          
      </div>
    </div>
    <div class="boxright">      
           <?php include "boxright.php"?>
    </div>
      </main>

