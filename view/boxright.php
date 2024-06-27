
<div class="mb">
  
              <div class="box_title">TÀI KHOẢN</div>
              <div class="box_content form_account">
                  <?php
                  if(isset($_SESSION['user'])){
                    extract($_SESSION['user']);
                    ?>
                      <li class="form_li"><a href="index.php?act=addtocart">Giỏ hàng</a></li>
                      <li class="form_li"><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                      <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                      <li class="form_li"><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
                      <?php
                      if($role==1){
                      ?>
                      <li class="form_li"><a href="../admin/index.php">Đăng nhập Amin</a></li>
                      <?php
                      }
                      ?>
                      <li class="form_li"><a href="index.php?act=xoa">Thoát</a></li>
                    <?php 
                  }else{ ?>
                    <form action="index.php?act=dangnhap" method="POST">
                  <h4>Tên đăng nhập</h4><br>
                  <input type="text" name="user" id="">
                  <h4>Mật khẩu</h4><br>
                  <input type="password" name="pass" id=""><br>
                  <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                  <br><input type="submit" value="Đăng nhập" name="dangnhap">
                  <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                  <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
                  </form>
                  <?php 
                  }
                  ?>
                  <p>
                  <?php
                  if(isset($thongbao) && ($thongbao !="")){
                    echo $thongbao;
                  }
                  ?>
                  </p>
  </div>
           </div>
           <div class="mb">
              <div class="box_title">DANH MỤC</div>
              <div class="box_content2 product_portfolio">
                <ul >
                  <?php
                    foreach($dsdm as $dm){
                        extract($dm);
                        $linkdm = "index.php?act=sanpham&iddm=".$id;
                        echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                    }
                   ?>
                   <!-- <li><a href="">Đồng hồ </a></li>
                   <li><a href="">Laptop</a></li>
                   <li><a href="">Điện thoại</a></li>
                   <li><a href="">Ipad</a></li>
                   <li><a href="">Tivi</a></li> -->
                </ul>
              </div>
              <div class="box_search">
                <form action="index.php?act=sanpham" method="POST"> 
                   <input type="text" name="kyw" id="" placeholder="Từ khóa tìm kiếm">
                   <input type="submit" name="Tìm kiếm" id="">
                </form>
              </div>
           </div>
           <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
            <div class="mb">
              <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
                   <?php
                    foreach ($spyt as $yt) {
                        extract($yt);
                        $linksp = 'index.php?act=sanphamct&idsp=' . $id;
                        $anh = $img_path . $img;
                        echo '<div class="selling_products" style="width:100%;">
                                <a href="' . $linksp . '"><img src="' . $anh . '" alt=""></a>
                                <a href="' . $linksp . '">' . $name . '</a>
                              </div>';
                    }
                    ?>

              
          </div>