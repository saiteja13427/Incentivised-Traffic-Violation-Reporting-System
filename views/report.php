<?php
            include_once('../php/functions.php');
            if (!isLoggedIn()) {
                $_SESSION['msg'] = "You must log in first";
                header('location: login.php');
            }
        ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Report Violation</title>
        <meta name="News Aggregator" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="icon" type="image/png" href="../images/favicon.ico">
        <script src="../js/functions.js"></script>
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script>

            function validateVehicleNumber(){
                var number = document.forms["reportform"]["number"].value;
                if(number==""){
                    alert("Please enter the Vehicle Number");
                    return false;
                }else{
                    var re = /^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/;
                    var x=re.test(number);
                    if(x){
                        document.getElementById("number").classList.remove("is-invalid");
                        return true;
                    }else{
                        document.getElementById("number").classList.add("is-invalid");
                        return false;
                    } 
                }
            }

            function validateZIP(){
                var zip = document.forms["reportform"]["zip"].value;
                if(zip==""){
                    alert("Please enter the zip");
                    return false;
                }else{
                    var re = /^[1-9]{1}[0-9]{5}$/;
                    var x=re.test(zip);
                    if(x){
                        document.getElementById("zip").classList.remove("is-invalid");
                        return true;
                    }else{
                        document.getElementById("zip").classList.add("is-invalid");
                        return false;
                    } 
                }
            }


            function validateCity(){
                var city = document.forms["reportform"]["city"].value;
                if(city==""){
                    alert("Please enter the city");
                    return false;
                }else{
                    var re = /^[a-zA-Z][a-zA-Z\\s]+$/;
                    var x=re.test(city);
                    if(x){
                        document.getElementById("city").classList.remove("is-invalid");
                        return true;
                    }else{
                        document.getElementById("city").classList.add("is-invalid");
                        return false;
                    } 
                }
            }



            function validateState(){
                var state = document.forms["reportform"]["state"].value;
                if(state==""){
                    alert("Please enter the state");
                    return false;
                }else{
                    var re = /^[a-zA-Z][a-zA-Z\s]+$/;
                    var x=re.test(state);
                    if(x){
                        document.getElementById("state").classList.remove("is-invalid");
                        return true;
                    }else{
                        document.getElementById("state").classList.add("is-invalid");
                        return false;
                    } 
                }
            }

            function validate(){
                if(validateVehicleNumber() && validateCity() && validateState() && validateZIP()){
                    return true;
                }else{
                    return false;
                }
            }


            </script>
    </head>
    <body>
        <!-- Denying access if the user is not logged in -->
             
        <!-- Denying access if the user is not logged in -->

        <!-- Nav -->
        <?php
            include('header.php')
        ?> 
        <!-- Nav -->

        <!-- Printing out errors -->
        <div><?php echo $message;?></div>
        <!-- Printing out errors -->


        <div class="container center_div">

            <form enctype="multipart/form-data" onsubmit="return validate()" style="margin:50px;" action="report.php" method="post" id="reportform">
                <div class="form-group">
                <label for="violation">Violation</label>
                <select class="form-control" id="violation" name="violation" required>
                    <option value="No Helmet">No Helmet</option>
                    <option value="Signal Jump">Signal Jump</option>
                    <option value="No Parking">No Parking</option>
                    <option value="Triple Riding">Triple Riding</option>
                    <option value="Wrong Side Driving">Wrong Side Driving</option>
                </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Vehicle Number</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="TS08EZ1234" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="vehicle">Type pf vehicle</label>
                        <select class="form-control" id="vehicle" name="vehicle" required>
                            <option value="Bike">Bike</option>
                            <option value="Auto">Auto</option>
                            <option value="Car">Car</option>
                            <option value="Truck">Truck</option>
                            <option value="Bus">Bus</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address & Landmark</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <input type="text" id="state" class="form-control" name="state" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>
                </div>    
                
                <!-- <div class="form-row">
                    <label class="ml-1" for="customeFile">Violation Image</label>
                    <div class="input-group mb-3 ml-1 mr-1 mt-1 custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>  -->
                <div class="form-group">
                <label for="exampleFormControlFile1">Violation Image</label>
                <input type="file" class="form-control-file" name="image" accept="image/*" required>
                </div>
            
                <input type="submit" class="btn btn-primary" value="Report" name='addreport'>
            </form>
        </div> 
       

        <!-- Footer -->
        <?php
            include "footer.php";
        ?>
        <!-- Footer -->
        
        
        <script src="../js/bootstrap.js" async defer></script>
    </body>
</html>
