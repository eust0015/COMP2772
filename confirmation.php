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
        <title>Confirmation</title>
    </head>
    <body>
        <?php 
            include_once 'menu.php'; 
        ?>       
       <div id='heading'><h1>Payment Confirmation</h1></div>
        
        <br><br>
        <h3>THANK YOU FOR YOUR ORDER!!</h3>
        
        <br><br>
    
        WE NEED GENERATE AN ORDER CONFIRMATION NUMBER FROM DATABASE
    </body>
</html>
<script>
    // Prevent issues if the page is refreshed
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>