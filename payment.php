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
      
      <div id='heading'><h1>Payment</h1></div>

      <h3 id='billing-header'>Billing Details</h3>

        <div name='customerDetails'>
            <ul class='customerDetails'>
                <li>First Name: <?php echo (isset($_POST["billing-fname"]) ? $_POST["billing-fname"] : "") ?></li>
                <li>Last Name: <?php echo (isset($_POST["billing-lname"]) ? $_POST["billing-lname"] : "") ?></li>
                <li>Mobile Number: <?php echo (isset($_POST["billing-mobilenumber"]) ? $_POST["billing-mobilenumber"] : "") ?></li>
                <li>Email Address: <?php echo (isset($_POST["billing-email"]) ? $_POST["billing-email"] : "") ?></li>
                <li>Street Address: <?php echo (isset($_POST["billing-streetAddress"]) ? $_POST["billing-streetAddress"] : "") ?></li>
                <li>Suburb: <?php echo (isset($_POST["billing-suburb"]) ? $_POST["billing-suburb"] : "") ?></li>
                <li>State: <?php echo (isset($_POST["billing-state"]) ? $_POST["billing-state"] : "") ?></li>
                <li>Post Code: <?php echo (isset($_POST["billing-postcode"]) ? $_POST["billing-postcode"] : "") ?></li>
            </ul>
        </div>
        <br>
        <h3 id='paymentAmount-header'>Payment Amount</h3><br>
        <?php
            include_once 'db_functions.php';
            $conn = get_conn();
            $postageCost = 0;
            $total = 0;
            if($conn){
                
                $result = get_postage_by_id($conn, htmlspecialchars($_SESSION["account"]["postage"]));
                if ($result) { 
                    $postageCost = $result["cost"];
                }

                if(isset($_SESSION["products"])){
                    foreach($_SESSION["products"] as $productId => $productQuantity) {
                        $result = get_product_by_id($conn, htmlspecialchars($productId));
                        if ($result) {
                            $subTotal = $productQuantity * $result["price"];
                            $total += $subTotal;
                        }
                    }
                }

                echo "<ul class='paymentAmount'>";
                echo "<li>";
                echo "$" . number_format((float)$total + (float)$postageCost, 2, '.', '');
                echo "</li>";
                echo "</ul>";
            }
        ?>
        <h3 id='paymentDetails-header'>Payment Details</h3>

        <form id='payment-form' name='paymentDetails' class='payment-form' action="confirmation.php" method="POST">
            <div name='paymentDetails'>
                <ul class='paymentDetails'>
                    <li><label id='name-on-card' for='name-on-card'>Name On Card: </label><input type='name' id='name-on-card' name='nameOnCard' placeholder='Required' value='' required></li>
                    <li><label id='card-number' for='card-number'>Card Number: </label><input type='text' id='card-number' name='cardNumber' minlength='16' maxlength='16' placeholder='Required' value=''required></li>
                    <li><label id='expiration-date' for='expiration-date'>Expiration Date: </label><input type='month' id='expiration-date' name='expirationDate' placeholder='Required' min='2021-10' onkeydown='return false' value=''required></li>                    
                    <li><label id='cvc' for='cvc'>CVC: </label><input type='text' id='cvc' name='cvc' placeholder='Required' minlength='3' maxlength='3' value='' required></li>
                </ul>
            </div>

            <br><br><br><br>
            <div id='confirm-payment'>
                <input type='hidden' id='orderAction' name='orderAction' value='insert'>
                <input type='hidden' id='cartAction' name='cartAction' value='clear'>
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