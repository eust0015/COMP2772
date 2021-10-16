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

      <h3>Billing Details</h3>

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
        </div>
        <br><br><br>

        <h3>Payment Amount</h3>
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

                foreach($_SESSION["products"] as $productId => $productQuantity) {
                    $result = get_product_by_id($conn, htmlspecialchars($productId));
                    if ($result) {
                        $subTotal = $productQuantity * $result["price"];
                        $total += $subTotal;
                    }
                }
                echo "<ul class='paymentAmount'>";
                echo "<li>";
                echo "$" . number_format((float)$total + (float)$postageCost, 2, '.', '');
                echo "</li>";
                echo "</ul>";
            }
        ?>
        <br><br>
        <h3>Payment Details</h3>

        <form id='payment-form' name='paymentDetails' class='payment-form' action="confirmation.php" method="POST">

            <div name='paymentDetails'>
                <ul class='paymentDetails'>
                    <li><label id='name-on-card' for='name-on-card'>Name On Card: </label><input type='name' id='name-on-card' name='nameOnCard' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["name-on-card"]) ? $_SESSION["account"]["name-on-card"] : ""); ?>' required></li>
                    <li><label id='card-number' for='card-number'>Card Number: </label><input type='text' id='card-number' name='cardNumber' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["card-number"]) ? $_SESSION["account"]["card-number"] : ""); ?>'required></li>
                    <!-- <li><label id='expiration-month' for='expiration-month'>Expiration Month: </label><input type='text' id='expiration-month' name='expirationMonth' placeholder='Required' required></li>
                    <li><label id='expiration-year' for='expiration-year'>Expiration Year: </label><input type='text' id='expiration-year' name='expirationYear' placeholder='Required' required></li> -->
                    <li><label id='expiration-date' for='expiration-date'>Expiration Date: </label><input type='month' id='expiration-date' placeholder='Required' min='2021-10' value='<?php echo (isset($_SESSION["account"]["expiration-date"]) ? $_SESSION["account"]["expiration-date"] : ""); ?>'required></li>                    
                    <li><label id='cvc' for='cvc'>CVC: </label><input type='text' id='cvc' name='cvc' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["cvc"]) ? $_SESSION["account"]["cvc"] : ""); ?>'></li>
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