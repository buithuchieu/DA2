  <main class="catalog  mb ">
  <div class="boxleft">
      <div class="mb">
        <div class="box_title"></div>
        <div class="box_content">
           <h2>Cám ơn quý khách</h2>
        </div>
      </div>
           <?php
              if(isset($bill)&&(is_array($bill))){
                extract($bill);
              }
              ?>
      <div class=" mb">
        <div class="box_title">Thông tin đơn hàng</div>
        <div class="box_content">
              <li>Mã đơn hàng : <?=$bill['id'];?></li>
              <li>Ngày đặt hàng : <?=$bill['ngaydathang'];?></li>
              <li>Tổng tiền : <?=$bill['tongdonhang'];?></li>
              <li>Phương thức thanh toán : <?php 
                $ht = $bill['bill_pttt'];
                switch ($ht){
                  case "0" :
                      echo $tt="Trả tiền khi nhận hàng";
                      break;
                  case "1" :
                      echo $tt="Chuyển khoản ngân hàng";
                      break;  
                  case "2" :
                      echo $tt="Thanh toán online";
                      break;     
                  default:
                      echo $tt="Trả tiền khi nhận hàng";
                      break;
                 }
              ?></li>
              
        </div>
      </div>

      <div class=" mb">
        <div class="box_title">Thông tin đặt hàng</div>
        <div class="box_content">
              <table>
                  <tr>
                    <td>Người đặt hàng </td>
                    <td><?=$bill['bill_name']?></td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td><?=$bill['bill_address']?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?=$bill['bill_email']?></td>
                  </tr>
                  <tr>
                    <td>Điện thoại</td>
                    <td><?=$bill['bill_tel']?></td>
                  </tr>
              </table>
        </div>
      </div>
      <div class=" mb">
        <div class="box_title">Chi tiết giở hàng</div>
        <div class="box_content">
              <table>
                <?php
                 bill_chi_tiet($listbill);
                ?>
              </table>
        </div>
      </div>
    </div>
        <div class="boxright">      
            <?php include "boxright.php"?>
        </div>
    </main>
</script>
