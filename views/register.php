<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="News Aggregator" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="icon" type="image/png" href="../images/favicon.ico">
    <script src="../js/jquery-3.5.1.min.js"></script>

    <script>

    function validateEmail(){
        var email = document.forms["registerform"]["email"].value;
        if(email==""){
            alert("Please enter the email");
            return false;
        }else{
            var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
            var x=re.test(email);
            if(x){
                document.getElementById("email").classList.remove("is-invalid");
                return true;
            }else{
                document.getElementById("email").classList.add("is-invalid");
                return false;
            } 
        }
    }

    function validateZIP(){
        var zip = document.forms["registerform"]["zip"].value;
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
        var city = document.forms["registerform"]["city"].value;
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
        var state = document.forms["registerform"]["state"].value;
        if(state==""){
            alert("Please enter the state");
            return false;
        }else{
            var re = /^[a-zA-Z][a-zA-Z\\s]+$/;
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
        if(validateEmail() && validateCity() && validateState() && validateZIP()){
            return true;
        }else{
            return false;
        }
    }

    
</script>

</head>

<body>
    <?php
        include("../php/functions.php");
    ?>


    <!-- Nav Bar -->
    <?php
        include('header.php')
    ?> 
    <!-- Nav Bar -->

    <!-- Printing out errors -->
    <div><?php echo $message;?></div>
    <!-- Printing out errors -->

    <!-- Registration Form -->
    <div class="container center_div">

        <form style="margin:50px;" onSubmit="return validate()" action="register.php" method="post" id="registerform">
            <div class="form-row">
                <label for="username">Username</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
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
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                </div>
            </div>
           
            <input type="submit" class="btn btn-primary" value="Register" name='Register' id="Register">
        </form> 
    </div>
    <!-- Registration Form -->

    <!-- Footer -->
    <?php
        include "footer.php";
    ?>
    <!-- Footer -->
    

<script src="../js/bootstrap.js" async defer></script>
</body>

</html>