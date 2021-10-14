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
        <br><br>
        <h3>Customer Details</h3>

        <div name='customerDetails'>
            <ul class='customerDetails'>
                <li>First Name: <?php echo $_POST["billing-fname"] ?></li>
                <li>Last Name: <?php echo $_POST["billing-lname"] ?></li>
                <li>Mobile Number: <?php echo $_POST["billing-mobilenumber"] ?></li>
                <li>Email Address: <?php echo $_POST["billing-email"] ?></li>
                <li>Street Address: <?php echo $_POST["billing-streetAddress"] ?></li>
                <li>Suburb: <?php echo $_POST["billing-suburb"] ?></li>
                <li>State: <?php echo $_POST["billing-state"] ?></li>
                <li>Post Code: <?php echo $_POST["billing-postcode"] ?></li>
            </ul>
        </div><br><br><br><br>

        <h3>Payment Details</h3>

        <form id='payment-form' name='paymentDetails' class='payment-form' action="confirmation.php" method="POST">

        <div name='paymentDetails'>
            <ul class='paymentDetails'>
                <li><label id='name-on-card' for='name-on-card'>Name On Card: </label><input type='name' id='name-on-card' placeholder='Required' value='<?php echo (isset($_SESSION["account"]["name-on-card"]) ? $_SESSION["account"]["name-on-card"] : ""); ?>'></li>
                <li><label id='card-number' for='card-number'>Card Number: </label><input type='text' id='card-number' placeholder='Required' value='<?php echo (isset($_SESSION["account"]["card-number"]) ? $_SESSION["account"]["card-number"] : ""); ?>'></li>
                <li><label id='expiration-date' for='expiration-date'>Expiration Date: </label><input type='date' id='expiration-date' placeholder='Required' value='<?php echo (isset($_SESSION["account"]["expiration-date"]) ? $_SESSION["account"]["expiration-date"] : ""); ?>'></li>
                <li><label id='cvc' for='cvc'>CVC: </label><input type='text' id='cvc' placeholder='Required' value='<?php echo (isset($_SESSION["account"]["cvc"]) ? $_SESSION["account"]["cvc"] : ""); ?>'></li>
            </ul>
        </div>

        <br><br><br><br>
        <div id='confirm-payment'>
                <input type='hidden' id='accountAction' name='accountAction' value='update'>
                <input type='submit' id='confirm-payment' value='Confirm Payment'>            
            </div>
        </form>
    </body>
</html>
<script>
    // Prevent issues if the page is refreshed
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>