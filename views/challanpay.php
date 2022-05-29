<?php
    include_once('../php/functions.php');

    
    $vn = $_GET['q'];
    $query = "SELECT * FROM challans WHERE vehicle_number='$vn' AND status='NOT PAID'";
    $results = $conn->query($query);

    if($results){
        if($results->num_rows > 0){
            while ($row = $results->fetch_assoc()) {
                $id = $row['id'];
                $violation = $row['violation'];
                $number = $row['vehicle_number'];
                $vehicle = $row['vehicle_type'];
                $address = $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $zip = $row['zip'];
                $img = $row['image'];
                $time = $row['report_time'];
        
                print <<<END
                <div class="col mb-4">
                <div class="card">
                END;
                echo
                '<div class="card-header">
                <ul class="nav nav-pills card-header-pills justify-content-end">
                <li class="nav-item">
                <a class="nav-link active" href="pay.php?pay='.$id.'">Pay</a>                                
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
                    <p class="card-text p-3 mb-2 bg-primary text-white"><a href="../photos/$img" target="_blank" class="text-white">Image</a></p>
                    <p class="card-subtitle p-3 mb-2 bg-warning text-dark">Time: $time</p>
                </div>
                </div>
                </div>
                </div>
                END;}
        }else{
            print <<<END
                    <div class="col mb-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No Challans Found</h5>
                    </div>
                    </div>
                    </div>
                END;
        }
        
    } else {
        print <<<END
                    <div class="col mb-4">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No Challans Found</h5>
                    </div>
                    </div>
                    </div>
                END;
    }

?>    