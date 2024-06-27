<main class="catalog  mb ">
  <div class="boxleft">
      <div class="mb">
        <div class="box_title">Đơn hàng của bạn</div>
        <div class="box_content">
          <table>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt hàng </th>
                <th>Số lượng mặt hàng</th>
                <th>Tống khóa đơn</th>
                <th>Tình trạng đơn hàng</th>
            </tr>
            <?php foreach ($hienthi as $cart){
                $tong=$cart['thanhtien'];
                $ht=$cart['tinhtrang'];
                switch ($ht){
                  case "0" :
                      $tt="Đơn hàng mới";
                      break;
                  case "1" :
                      $tt="Đang xử lí";
                      break;  
                  case "2" :
                      $tt="Đang giao hàng";
                      break;     
                  case "3" :
                      $tt="Đã giao hàng";
                      break;
                  default:
                       $tt="Đơn hàng mới";
                      break;
              }
                echo'
                    <tr>
                    <td>'.$cart['id'].'</td>
                    <td>'.$cart['ngaydathang'].'</td>
                    <td>'.$cart['soluong'].'</td>
                    <td>'.$cart['thanhtien'].'</td>
                    <td>'.$tt.'</td>
                    </tr>';
               }
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
