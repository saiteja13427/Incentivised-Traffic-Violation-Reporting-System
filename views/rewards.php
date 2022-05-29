<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rewards</title>
    <meta name="PTVRS" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" type="image/png" href="../images/favicon.ico">
    <script src="../js/jquery-3.5.1.min.js"></script>

</head>


<body>
    <?php
        include("../php/functions.php");
        if (!isLoggedIn()) {
            $_SESSION['msg'] = "Access Denied to this page";
            header("location: login.php");
        }
    ?>    
    <!-- Nav Bar -->
    <?php
        include("header.php");
    ?> 
    <!-- Nav Bar -->
    <!-- All Messages -->
    <?php echo $message?>
    <!-- All Messages -->

    <!-- Instruction -->
    <div class=" col mb-4">
        <div class="card">
            <div class="card-body">
                Your Rewards!!
            </div>
        </div>
    </div>
    <!-- Instruction -->
    
    <!-- Getting all the users in the database with a delete option -->
    <?php 
        $query = "SELECT * FROM challans WHERE user_id = ".$_SESSION['id']." AND status = 'PAID'";
        $results = $conn->query($query);
        $reward = 0;
    
        if($results){
            print <<<END
                <div class="col mb-4">
                <div class="card">
                <div class="card-body">
                <h5 class="card-title p-3 mb-2 bg-dark text-white"><strong>Completed Challan Vehicle Numbers </strong></h5>
                END;
            while ($row = $results->fetch_assoc()) {
                // I used standard US date format and 12-hours time format, but you may set custom format, depending on location of visitor. See manual on PHP date() function.
                // You you prefer European and 24-hours format -- use 'd.m.Y G:i:s'.           
                $challanAmount = $row['challan_amount'];
                $vehicleNumber = $row['vehicle_number'];
                $reward = $reward + ($challanAmount*0.1);
                print <<<END
                    <p class="card-title p-3 mb-2 bg-white text-dark"><strong>$vehicleNumber</strong></h5> 
                END;
            } 
            print <<<END
                </div>
                </div>
                </div>
                </div>
                END;
            print <<<END
                <div class="col mb-4">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title p-3 mb-2 bg-dark text-white"><strong>My Reward: $reward </strong></h5> 
                </div>
                </div>
                </div>
                </div>
                END;
        } else {
            return NULL;
        }
    ?>
    <!-- Getting all the users in the database with a delete option -->

    <!-- Footer -->
        <?php
            include "footer.php";
        ?>
    <!-- Footer -->
    
    <script src="../js/bootstrap.js" async defer></script>
</body>
</html>
