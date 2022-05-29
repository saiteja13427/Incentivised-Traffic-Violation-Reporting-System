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
        if (!isAdmin()) {
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
                All Challans
            </div>
        </div>
    </div>
    <!-- Instruction -->
    
    <?php 
        $query = "SELECT * FROM challans";
        $results = $conn->query($query);
        $reward = 0;
    
        if($results){
            print <<<END
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Vehicle Number</th>
                    <th scope="col">Violation</th>
                    <th scope="col">Fine</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
            END;

            while ($row = $results->fetch_assoc()) {
                         
                $challanAmount = $row['challan_amount'];
                $vehicleNumber = $row['vehicle_number'];
                $violation = $row['violation'];
                $status = $row['status'];
                print <<<END
                <tr>
                  <th scope="row">$vehicleNumber</th>
                  <td>$violation</td>
                  <td>$challanAmount</td>
                  <td>$status</td>
                </tr>
                END;
            } 
            print <<<END
            </tbody> 
            </table>
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
