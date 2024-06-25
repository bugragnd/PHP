<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>RECEVİE</title>
    </head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <body>
        <br><br><br><br>
        <a href="home.php">Overview</a>
        <a href="send.php">Send</a>
        <a class="active" name="receive" id="receive" href="receive.php">Recevie</a>
        <a href="transaction.php">Transaction</a>
        <hr>
        <br><br>
        <table border="1" style="margin-left:110px;" >
            <h3 style="margin-left:580px">RECEİVE</h3>
            <br><br>
            <tr>
                <td><h3 style="display:inline-block; width:350px;" >Fee</h3></td>
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
                        $txid=$result["Txid"];
              ?>
                   <td> <input style="width:350px; height: 20px;" type="text" id="fee" name="fee" value=""> </td>
                   <td> <input style="width:350px; height: 20px;" type="text" id="" name="address" value=""> </td>
                   <td> <input style="width:350px; height: 20px;" type="text" id="amount" name="amount" value=""> </td>
                   <input style="width:350px; height: 20px;" type="hidden" id="txid" name="txid" value="<?php echo $txid ?>">
                   </div>
            </tr>
            <script type="text/javascript">
            var prdBtn = $("#receive");
            prdBtn.click(function(e) {
              $.get("back-end/gettransaction.php", function(data) {
                var newAddress = data;
                var parsed = JSON.parse(newAddress);
                console.log(parsed);
                var address = parsed["result"]["fee"];
                var amount = parsed["result"]["amount"];
                $("#amount").val(amount);
                $("#fee").val(address);
                var txid = $('#txid').val();
                $.ajax({
                    method: "POST",
                    url:"back-end/gettransaction.php",
                    data: {txid},
                    success: function(response){
                       console.log(response);
                    }
                });
              });
              e.preventDefault();
            });
            </script>
        </table>
        <?php  } ?>
    </body>
</html>
