<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>About</title>
        <meta name="News Aggregator" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="icon" type="image/png" href="../images/favicon.ico">
        <script src="../js/jquery-3.5.1.min.js"></script>


    </head>
    <body>
        <!-- Starting session and Adding NavBar -->
        <?php 
            session_start();
            include("header.php");
        ?>
        <!-- Nav -->

        <!-- About Block -->
        <div class="jumbotron container center_div">
            <h1>About PTVRS</h1>
            <hr class="my-4">
            <p>Public Traffic Violations Reporting System is a system which lets general public to report traffic violations and get rewarded in return.</p>
            <p class="lead">We are bringing more updates!! Stay tuned &#128512;</p>
            <a class="btn btn-primary" href="report.php" role="button">Report Violation</a>
        </div>
        <!-- About Block -->
        
        <!-- Footer -->
        <?php
            include "footer.php";
        ?>
        <!-- Footer -->

        <script src="../js/bootstrap.js" async defer></script>

    </body>
</html>