<main class="catalog  mb ">
<div class="boxleft">
    <div class="row2"> 
         <div class="row2 font_title">
          <h1>Giỏ hàng</h1>
         </div>
         <div class="row2 form_content ">
           <div class="row2 mb10 formds_loai">
           <table>
            <?php 
                viewcart(1);
            ?>
           </table>
           </div>
           <div class="row mb10 ">
           <a href="index.php?act=bill"> <input class="mr20 menu-button" type="button" value="Đồng ý đặt hàng"></a>
           <a href="index.php?act=delcart"> <input class="mr20 menu-button" type="button" value="Xóa giỏ hàng"></a>
        
           </div>
         </div>
        </div>
        </div>
        <div class="boxright">      
            <?php include "boxright.php"?>
        </div>
    </main>