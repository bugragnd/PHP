<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>TRANSACTİON</title>
    </head>
    <body>
        <br><br><br><br>
        <a href="home.php">Overview</a>
        <a href="send.php">Send</a>
        <a href="receive.php">Recevie</a>
        <a class="active" href="transaction.php">Transaction</a>
        <hr>
        <br><br>
        <table border="1" style="margin-left:110px;" >
            <tr>
                <td><h3 style="display:inline-block; width:350px;" >Type</h3></td>
                <td><h3 style="display:inline-block; width:350px;" >Address</h3></td>
                <td><h3 style="display:inline-block; width:350px;" >Amount (BTC)</h3></td>
            </tr>
           <tr>
               <div class="bg">
                   <?php
                   if (!$open=mysqli_connect("127.0.0.1","root","root-password","bgwallet")) {
                       exit("veritabanına bağlanamadı");
                   }

                   $table=mysqli_query($open, "SELECT * FROM `transacitons`");
                   foreach ($table as $result) {
                       $amount=$result["Amount"];
                       $address=$result["To"];
                       $type=$result["Type"];


             ?>
                   <td> <input style="width:350px; height: 20px;" type="text" name="type" value="<?php echo $type; ?>"> </td>
                   <td> <input style="width:350px; height: 20px;" type="text" name="address" value="<?php echo $address; ?>"> </td>
                   <td> <input style="width:350px; height: 20px;" type="text" name="amount" value="<?php echo $amount; ?>"> </td>
               </div>
                <!-- <td> <input style="width:350px; height: 20px;" type="text" name="type" value=""> </td>
                <td> <input style="width:350px; height: 20px;" type="text" name="address" value=""> </td>
                <td> <input style="width:350px; height: 20px;" type="text" name="amount" value=""> </td> -->
            </tr>
            <?php  } ?>
        </table>
    </body>
</html>
