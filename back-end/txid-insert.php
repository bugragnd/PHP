<?php
if (!$open=mysqli_connect("127.0.0.1","root","root-password","bgwallet")) {
    exit("veritabanına bağlamadı");
}

$txid=$_POST["txid"];

$query='INSERT INTO `transactions` (`Txid`) VALUES ("'.$txid.'")';
    if (!$result=mysqli_query($open,$query)) {
        exit("kayıt başarılı");
    }
 ?>
