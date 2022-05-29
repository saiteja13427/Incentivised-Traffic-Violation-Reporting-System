<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="News Aggregator" content="">
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
                List of reports pending for approval or rejection!
            </div>
        </div>
    </div>
    <!-- Instruction -->
    
    <!-- Getting all the users in the database with a delete option -->
    <?php 
        $query = "SELECT * FROM reports";
        $results = $conn->query($query);
    
        if($results){
            while ($row = $results->fetch_assoc()) {
                // I used standard US date format and 12-hours time format, but you may set custom format, depending on location of visitor. See manual on PHP date() function.
                // You you prefer European and 24-hours format -- use 'd.m.Y G:i:s'.           
                $id = $row['id'];
                $violation = $row['violation'];
                $number = $row['vehicle_number'];
                $vehicle = $row['vehicle_type'];
                $address = $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $zip = $row['zip'];
                $image = $row['image'];
                $status = $row['status'];
                $time = $row['report_time'];

    
                if($status!='APPROVED' && $status!='REJECTED'){
                print <<<END
                <div class="col mb-4">
                <div class="card">
                END;
                echo
                '<div class="card-header">
                <ul class="nav nav-pills card-header-pills justify-content-end">
                <li class="nav-item">
                <a class="nav-link active" href="dashboard.php?approve='.$id.'">Approve</a>                                
                </li>
                <li class="nav-item">
                <a class="nav-link" href="dashboard.php?reject='.$id.'">Reject</a>                                
                </li>
                </div>';
                
                print<<<END
                <div class="card-body">
                    <h5 class="card-title p-3 mb-2 bg-dark text-white"><strong>Violation: $violation </strong><span class="badge badge-primary"> $number</span></h5> 
                    <p class="card-text p-3 mb-2 bg-primary text-white">Vehicle Type: $vehicle</p>
                    <p class="card-text p-3 mb-2 bg-primary text-white">Address: $address<br>
                    City: $city<br>
                    State: $state<br>
                    Zip: $zip</p>
                    <p class="card-text p-3 mb-2 bg-primary text-white"><a href="../photos/$image" target="_blank" class="text-white">Image</a></p>
                    <p class="card-subtitle p-3 mb-2 bg-warning text-dark">Time: $time</p>
                    <h6 class="card-subtitle p-3 mb-2 bg-warning text-dark">Status: $status</h6>
                </div>
                </div>
                </div>
                </div>
                END;
                }
            } 
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
