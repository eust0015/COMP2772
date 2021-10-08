<?php
    session_start();
    include_once 'account_functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/menu.css">
        <link rel="stylesheet" href="styles/style.css">
        <!-- <script src="scripts/script.js" defer></script> -->
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="description" content="Assignment02" />
        <title>Payment</title>
    </head>
    <body>
        <?php 
            include_once 'menu.php'; 
        ?>       
        <br>
        <br>
        <h1>Payment</h1>
        <?php 
            echo $_POST["billing-fname"];
        ?> 
    </body>
</html>
<script>
    // Prevent issues if the page is refreshed
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>