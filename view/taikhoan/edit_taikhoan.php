
  <main class="catalog  mb ">
  <div class="boxleft">
        <div class="box_content form_account">
            <?php 
               if(isset($_SESSION['user'])){
                 extract($_SESSION['user']);
               }
            ?>
            <form action="index.php?act=edit_taikhoan" method="post">
            <div>Tên đăng nhập
                <input type="text" name="user" value="<?=$user?>" >
            </div>
            <div>Mật khẩu
                <input type="password" name="pass"  value="<?=$pass?>">
            </div>
            <div><p>Email</p>
                <input type="email" name="email" value="<?=$email?>">
            </div>
            <div>Địa chỉ
                <input type="text" name="address"  value="<?=$address?>">
            </div>
            <div>Số điện thoại
                <input type="text" name="tel" value="<?=$tel?>">
            </div>
            <div>Vài trò
                <input type="text" name="role"  value="<?=$role?>">
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="Cập nhật" name="capnhat">
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

