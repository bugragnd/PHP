<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>SEND</title>
    </head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
    .bg{
        display: inline;
        margin-top:50px;
        margin-left:60px;
    }
    .bgr{
        display: inline;
        margin-left: 55px;
    }
    .lbl{
        display: inline;
        margin-left: 70px;
    }
    </style>
    <body>
        <br><br><br><br>
        <a href="home.php">Overview</a>
        <a class="active" name="btn" id="btn" href="send.php">Send</a>
        <a href="receive.php" >Recevie</a>
        <a href="transaction.php">Transaction</a>
        <hr>
        <br><br>
        <h2 style="display:inline;" >Balance:</h2>
        <div class="bg">
                    <?php
                    if (!$open=mysqli_connect("127.0.0.1","root","root-password","bgwallet")) {
                        exit("veritabanına bağlanamadı");
                    }

                    $table=mysqli_query($open, "SELECT * FROM `balance`");
                    foreach ($table as $result) {
                        $ID=$result["Balance"];
              ?>
            <input style="width: 470px; height: 50px;" type="text"  id="balance" name="balance" value="<?php echo $ID; ?>">
        </div>
        <?php } ?>
        <br>
        <br><br>
        <h2 style="display:inline;">Pay To:</h2>
        <div class="lbl">
            <input style="width: 470px; height: 50px;" type="text" name="address" id="address" placeholder="Enter a Bitcoin address.." value="">
        </div>
        <br>
        <br><br>
        <br>
        <h2 style="display:inline;">Amount:</h2>
        <div class="bgr">
            <input style="width: 470px; height: 50px;" type="text" name="amount" id="amount" placeholder="Please enter an amount.." value="">
            <br><br><br>
            <!-- <h2 style="display:inline;">Txid:</h2> -->
            <!-- <input style="width: 470px; height: 50px; margin-left: 90px;" type="text" name="txid" id="txid" placeholder="" value=""> -->
            <input style="width: 470px; height: 50px; margin-left: 90px;" type="hidden" name="balance" id="balance" placeholder="" value="<?=$ID ?>">
        </div>
        <br><br>
        <button type="submit" id="send" name="send">SEND</button>
        <script type="text/javascript">
        $('#send').click(function(){
            var address = $('#address').val();
            var amount = $('#amount').val();
            $.ajax({
                type:'POST',
                url:'back-end/sendbtc.php',
                data: {address,amount},
                // dataType: "json",
                success: function (response){
                    //console.log("response");
                    //$("#feed").val(response);
                    // var parsed = JSON.parse(response);
                    // console.log(parsed);
                    // var txid = parsed["result"]["result"];
                    // $("#txid").val(txid);
                    var balance = $('#balance').val();
                    var address = $('#address').val();
                        $.ajax({
                            method: "POST",
                            url:"back-end/new-balance.php",
                            data: {amount, balance,txid,address},
                            success: function(response){
                              console.log(response);
                        }
                    });

                }
            });
        });
        </script>
    </body>
</html>
