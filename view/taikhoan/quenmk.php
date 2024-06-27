  <main class="catalog  mb ">
  <div class="boxleft">
        <div class="box_content form_account">
            <form action="index.php?act=quenmk" method="post">
            <div><p>Email</p>
                <input type="email" name="email" placeholder="Email">
            </div>
            <input type="submit" value="Gửi" name="gui">
            <input type="reset" value="Nhập lại">
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
        <div class="boxright">      
            <?php include "boxright.php"?>
        </div>
    </main>

