<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    $idpro =$_REQUEST['idpro'];
    $dsbinhluan = loatAll_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <?php
            foreach($dsbinhluan as $bl){
                extract($bl);
                echo '<tr>
                <td>'.$iduser.'</td>
                <td>'.$noidung.'</td>
                <td>'.$ngaybinhluan.'</td></tr>
                ';
            }
         ?>
    </table>
    <div class="box_search">
      <form action="binhluan/binhluanfrom.php" method="post">
            <input type="hidden" name="idpro" value="<?=$idpro?>">
            <input type="text" name="noidung">
            <input type="submit" name="guibinhluan" value="Gửi bình luận">
        </from>
        </div>
     <?php 
      if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['user'];
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
            header("Location:".$_SERVER['HTTP_REFERER']);
      }
     ?>


</body>
</html>