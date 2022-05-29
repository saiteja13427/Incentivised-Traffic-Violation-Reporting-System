<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home | PTVRS</title>
        <meta name="News Aggregator" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="icon" type="image/png" href="../images/favicon.ico">
        <script src="../js/jquery-3.5.1.min.js"></script>


    </head>
    <body>
        <!-- Session Start and Nav Bar -->
        <?php
            session_start();
            include 'header.php'
        ?> 
        <!-- Nav Bar -->

        <!-- A Famous news quote and the news button -->
        <div class="text-center">
            <blockquote class="blockquote text-center">
                <h1 class="mb-0">Save Lives | Report Violations</h1>
                <footer class="blockquote-footer"></footer>
            </blockquote>
            <button type="button" class="btn btn-primary" onclick="window.location.href='report.php'">Report Violation</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='pay.php'">Pay Challan</button>
        </div>
        <!-- A Famous news quote and the news button -->

        <!-- Footer -->
            <?php
                include "footer.php";
            ?>
        <!-- Footer -->

        <script src="../js/bootstrap.js" async defer></script>
    </body>
</html>
