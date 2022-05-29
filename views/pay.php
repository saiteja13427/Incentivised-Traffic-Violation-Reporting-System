<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pay Challan</title>
        <meta name="News Aggregator" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="icon" type="image/png" href="../images/favicon.ico">
        <script src="../js/functions.js"></script>
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script>
        function challanDetails(str) {
            if (str.length == 0) {
                $('#challan').find(":selected").text() = 'None';
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("challandetails").innerHTML = this.responseText;
                }
                }
                xmlhttp.open("GET", "challanpay.php?q="+str, true);
                xmlhttp.send();
            }
        }
    </script>



    </head>
    <body>
       
        <!-- Nav -->
        <?php
            include_once('../php/functions.php');
            include('header.php')
        ?> 
        <!-- Nav -->

        <!-- Printing out errors -->
        <div><?php echo $message;?></div>
        <!-- Printing out errors -->


        <div class="container center_div">

            <form style="margin:50px;" method="POST">                
                <div class="form-group">
                    <label for="inputPassword4">Vehicle Number</label>
                    <input type="text" class="form-control" onChange="challanDetails(this.value)" id="vehiclenumber" name="vehiclenumber" required>
                </div>
            </form>
            </div>

        <div id="challandetails"></div>

        <!-- Footer -->
        <?php
            include "footer.php";
        ?>
        <!-- Footer -->
        
        <script src="../js/bootstrap.js" async defer></script>
    </body>
</html>
