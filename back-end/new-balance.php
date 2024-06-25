<?php
if (!$open=mysqli_connect("127.0.0.1","root","root-password","bgwallet")) {
    exit("Could not connect to database.");
}

$amount = $_POST["amount"];
$balance = $_POST["balance"];
$txid = $_POST["txid"];
$Address = $_POST["address"];

$c = $balance - $amount ;


$query="UPDATE `balance` SET `Balance` = '$c' WHERE `ID`= '1' ";
if (!$result=mysqli_query($open,$query)) {
    exit("sorgu hatası");
}
$query2 = "INSERT INTO `transacitons` (`Txid`,`Amount`, `Address`) VALUES ('".$txid."', '".$amount."' , '".$Address."' )";
if ($result=mysqli_query($open,$query2)) {
    exit("Insert Succes");
}
// $table=mysqli_query($open, "SELECT * FROM `balance`");
// foreach ($table as $result) {
//     $ID=$result["Balance"];
//     $query='SELECT `Total` FROM `balance` WHERE `ID`="1"';
//     if (!$result=mysqli_query($open,$query)) {
//         exit("Could not query database.");

?>
