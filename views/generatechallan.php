<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Generate Challan</title>
    <meta name="News Aggregator" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" type="image/png" href="../images/favicon.ico">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.js" async defer></script>
    
    <script>
        function getChallan(str) {
        if (str.length == 0) {
            $('#challan').find(":selected").text() = 'None';
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("generatechallan").innerHTML = this.responseText;
            }
            }
            xmlhttp.open("GET", "challan.php?q="+str, true);
            xmlhttp.send();
        }
        }

        function validateFineAmount(){
                var number = document.forms["challanForm"]["fineamount"].value;
                if(number==""){
                    alert("Please enter the Fine Amount");
                    return false;
                }else{
                    var re = /^\d$/;
                    var x=re.test(number);
                    if(x){
                        document.getElementById("fineamount").classList.remove("is-invalid");
                        return true;
                    }else{
                        document.getElementById("fineamounts").classList.add("is-invalid");
                        return false;
                } 
            }
        }
        function validate(){
            if(validateFineAmount()){
                return true;
            }else{
                return false;
            }
        }

    </script>


</head>

<body>
    <?php
        include('../php/functions.php');
        if (!isAdmin()) {
            $_SESSION['msg'] = "Access Denied to this page";
            header("location: login.php");
        }
    ?>

    <!-- Nav Bar -->
    <?php
        include('header.php')
    ?> 
    <!-- Nav Bar -->

    <div><?php echo $message;?></div>

    
    <div style="text-align:center; margin-top: 20px;">   
    <label for="challan">Choose a Violation:</label>

    <select name="challan" id="challan" onchange="getChallan(this.value)">
        <option value="None">None</option>
        <?php 
            $query = "SELECT * FROM reports WHERE status='APPROVED' AND id NOT IN (SELECT report_id FROM challans)";
            $results = $conn->query($query);

            if($results){
                while ($row = $results->fetch_assoc()) {
                    $number = $row['vehicle_number'];
                    $vehicle = $row['vehicle_type'];
                    $id = $row['id'];
                    $time = $row['report_time'];
                    print <<<END
                    <option value="$id">$number | $time</option>                    
                    END;
    
            }}
        ?>
    </select> 
    </div>
    <div id="generatechallan">

    </div>
    

    <!-- Footer -->
    <?php
        include "footer.php";
    ?>
    <!-- Footer -->

    <script src="../js/functions.js" async defer></script>
</body>
</html>