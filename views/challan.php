 <?php
    include_once('../php/functions.php');

    
    $id = $_GET['q'];
    $query = "SELECT * FROM reports WHERE id=$id";
    $results = $conn->query($query);
    
    if($results){
        $row = $results->fetch_assoc();
        $id = $row['id'];
        $user_id = $row['user_id'];
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
        <div class="container center_div">

            <form enctype="multipart/form-data" onsubmit="return validateFineAmount()" style="margin:50px;" action="generatechallan.php" method="post" id="challanForm">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Report Id</label>
                        <input type="text" class="form-control" value="$id" id="report_id" name="report_id" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">User Id</label>
                        <input type="text" class="form-control" value="$user_id" id="user_id" name="user_id" readonly>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputPassword4">Fine Amount</label>
                    <input type="text" class="form-control" id="fineamount" name="fineamount" required>
                </div>
                
                <div class="form-row">
                    <label class="ml-1" for="username">Violation</label>
                    <div class="input-group mb-2 ml-1 mr-1">
                        <input type="text" class="form-control" value="$violation" id="violation4" name="violation" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Vehicle Number</label>
                        <input type="text" class="form-control" value="$number" id="number" name="number" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Type of vehicle</label>
                        <input type="text" class="form-control" value="$vehicle" id="vehicle" name="vehicle" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address & Landmark</label>
                    <input type="text" class="form-control" id="inputAddress" value="$address" placeholder="1234 Main St" name="address" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" value="$city" id="inputCity" name="city" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <input type="text" id="inputState" value="$state" class="form-control" name="state" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" value="$zip" id="inputZip" name="zip" readonly>
                    </div>
                </div>    
                
                
                <div class="form-group">
                    <label for="inputPassword4">Report Time</label>
                    <input type="text" class="form-control" value="$time" id="time" name="time" readonly>
                </div>

                
                <div class="form-group">
                    <label for="inputPassword4">Image</label>
                    <input type="text" class="form-control" value="$img" id="image" name="image" readonly>
                </div>
                
                <div class="form-group">
                <label for="exampleFormControlFile1">Violation Image</label>
                <a href="../photos/$img" target="_blank">Violation Image</a>
                </div>
            
                <input type="submit" class="btn btn-primary" value="Generate Challan" name='addchallan'>
            </form>
        </div>
        END;
               
    }
?>    