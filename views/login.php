<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="News Aggregator" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="icon" type="image/png" href="../images/favicon.ico">
        <script src="../js/jquery-3.5.1.min.js"></script>


    </head>
    <body>
        <?php
            include("../php/functions.php"); 
        ?>

        <!-- Nav Bar -->
       <?php
            include("header.php");
       ?>
        <!-- Nav Bar -->

        <!-- Checking for any attempt to access non-accessible pages -->
        <?php
            $access = '';
            if(isset($_SESSION['msg'])){
                $access = "<div class='alert alert-warning' role='alert'>"
                .$_SESSION['msg'] ."    
                </div>";
                unset($_SESSION['msg']);
            } 
        ?>
        <!-- Checking for any attempt to access non-accessible pages -->

        <!-- Displaying possible errors -->
        <div><?php echo $message; echo $access?></div>
        <!-- Displaying possible errors -->
        

        <!-- Login Form -->
        <div class="container center_div">
        <form style="margin:30px;" action="login.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">UserName</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" required="required">
                <small id="emailHelp" class="form-text text-muted">We'll never share any of your details with anyone</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary" name='Login'>Login</button>
        </form>
        </div>
        <!-- Login Form -->

        
        <!-- Footer -->
        <?php
            include "footer.php";
        ?>
        <!-- Footer -->


        <script src="../js/bootstrap.js" async defer></script>
    </body>
</html>