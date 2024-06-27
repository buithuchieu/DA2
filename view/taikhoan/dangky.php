
  <main class="catalog  mb ">
  <div class="boxleft">
        <div class="box_content form_account">
            
            <form action="index.php?act=dangky" method="post">
            <div>Tên đăng nhập
                <input type="text" name="user"  placeholder="Tài khoản">
            </div>
            <div>Mật khẩu
                <input type="password" name="pass"  placeholder="Mật khẩu">
            </div>
            <div><p>Email</p>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div>Địa chỉ
                <input type="text" name="address"  placeholder="Địa chỉ">
            </div>
            <div>Số điện thoại
                <input type="text" name="tel"  placeholder="Số điện thoại">
            </div>
            <div>Vài trò
                <input type="text" name="role"  placeholder="Vài trò">
            </div>
            <input type="submit" value="Đăng ký" name="dangky">
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
 
