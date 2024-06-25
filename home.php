<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>HOME</title>
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
        margin-left: 90px;
    }

    </style>
    <body>
        <br><br><br><br>
        <a class="active" href="home.php">Overview</a>
        <a href="send.php">Send</a>
        <a href="receive.php">Recevie</a>
        <a href="transaction.php">Transaction</a>
        <hr>
        <h3 style="display:inline; margin-left: 650px; margin-top:250px; ">Recent transactions</h3>
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
                  <td><?php echo $ID; ?></td>
        </div>
        <br>
        <br><br>

        <h2 style="display:inline;">Pending:</h2>
        <div class="bg">
                    <?php
                    if (!$open=mysqli_connect("127.0.0.1","root","root-password","bgwallet")) {
                        exit("veritabanına bağlanamadı");
                    }

                    $table=mysqli_query($open, "SELECT * FROM `balance`");
                    foreach ($table as $result) {
                        $pen=$result["Pending"];
              ?>
            <td><?php echo $pen; ?></td>
        </div>
        <?php } ?>
        <br>
        <br><br> <hr style="width:500px; margin-left: -3px;" >
        <br><br>
        <h2 style="display:inline;">Total:</h2>
        <div class="bgr">
            <?php
            if (!$open=mysqli_connect("127.0.0.1","root","root-password","bgwallet")) {
                exit("veritabanına bağlanamadı");
            }

            $table=mysqli_query($open, "SELECT * FROM `balance`");
            foreach ($table as $result) {
                $ID=$result["Balance"];
      ?>
            <td><?php echo $ID; ?></td>
        </div>
        <?php } ?>

    </body>
    <?php } ?>
</html>
