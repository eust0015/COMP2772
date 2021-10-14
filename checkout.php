<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/menu.css">
        <link rel="stylesheet" href="styles/style.css">
        <script src="scripts/checkout.js" defer></script>
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="products" content="Assignment02" />
        <title>Checkout</title>
    </head>
    <body>
        <?php 
            include_once 'menu.php'; 
        ?>     
        
        <div id='heading'><h1>Checkout</h1></div>

        <?php 
            include_once 'db_functions.php';
            $conn = get_conn();

            if($conn){
                if(isset($_SESSION["products"])){
                
                // Billing Information - fix BR with styling
        ?>
                <h3>Billing Information</h3>
                <form id='checkout-form' name='customerDetails' class='checkout-form' action='payment.php' method='POST'>

                    <div name='customerDetails'>
                        <ul class='customerDetails'>
                            <li><label id='billing-fname' for='billing-fname'>First Name: </label><input type='text' name='billing-fname' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-fname"]) ? $_SESSION["account"]["billing-fname"] : ""); ?>'></li>
                            <li><label id='billing-lname' for='billing-lname'>Last Name: </label><input type='text' name='billing-lname' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-lname"]) ? $_SESSION["account"]["billing-lname"] : ""); ?>'></li>
                            <li><label id='billing-mobilenumber' for='billing-mobilenumber'>Mobile number: </label><input type='text' name='billing-mobilenumber' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-mobilenumber"]) ? $_SESSION["account"]["billing-mobilenumber"] : ""); ?>'></li>
                            <li><label id='billing-email' for='billing-email'>Email Address: </label><input type='email' name='billing-email' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-email"]) ? $_SESSION["account"]["billing-email"] : ""); ?>'></li><br><br><br><br>
                            <li><label id='billing-streetAddress' for='billing-streetAddress'>Street Address: </label><input type='text' name='billing-streetAddress' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-streetAddress"]) ? $_SESSION["account"]["billing-streetAddress"] : ""); ?>'></li>
                            <li><label id='billing-suburb' for='billing-suburb'>Suburb: </label><input type='text' name='billing-suburb' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-suburb"]) ? $_SESSION["account"]["billing-suburb"] : ""); ?>'></li>
                            <li><label id='billing-state'for='billing-state'> State: </label><select name='billing-state' class='billing-address' value='<?php echo (isset($_SESSION["account"]["billing-state"]) ? $_SESSION["account"]["billing-state"] : ""); ?>'>
                            <option value='NSW'>NSW</option>
                            <option value='ACT'>ACT</option>
                            <option value='VIC'>VIC</option>
                            <option value='QLD'>QLD</option>
                            <option value='TAS'>TAS</option>
                            <option value='NT'>NT</option>
                            <option value='SA'>SA</option>
                            <option value='WA'>WA</option></select>
                            <li><label id='billing-postcode' for='billing-postcode'>Post Code: <input type='text' name='billing-postcode' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-postcode"]) ? $_SESSION["account"]["billing-postcode"] : ""); ?>'></label></li>
                        </ul>
                    </div>

                <!-- Shipping Information - fix BR with styling -->
                <br><br><br>
                <h3>Shipping Information</h3>
                <li><input type='checkbox' id='shippingAddressCheckBox' name='shipToBillingAddress' <?php echo (isset($_SESSION["account"]["shipToBillingAddress"]) && $_SESSION["account"]["shipToBillingAddress"] ? "checked" : ""); ?>><label id='shippingAddress' for='shippingAddress'>Shipping Address Same As Billing Address</li><br><br><br>
                <div id='shippingAddressDiv' name='shippingAddressDiv'>
                    <div name='customerDetails'>
                        <ul class='customerDetails'>
                        <li><label id='shipping-fname' for='shipping-fname'>First Name: </label><input type='text' name='shipping-fname' class='shipping-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-fname"]) ? $_SESSION["account"]["shipping-fname"] : ""); ?>'></li>
                        <li><label id='shipping-lname' for='shipping-lname'>Last Name: </label><input type='text' name='shipping-lname' class='shipping-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-lname"]) ? $_SESSION["account"]["shipping-lname"] : ""); ?>'></li>
                        <li><label id='shipping-mobilenumber' for='shipping-mobilenumber'>Mobile number: </label><input type='text' class='shipping-address' name='shipping-mobilenumber' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-mobilenumber"]) ? $_SESSION["account"]["shipping-mobilenumber"] : ""); ?>'></li>
                        <li><label id='shipping-email' for='shipping-email'>Email Address: </label><input type='email' name='shipping-email' class='shipping-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-email"]) ? $_SESSION["account"]["shipping-email"] : ""); ?>'></li><br><br><br><br>
                        <li><label id='shipping-streetAddress' for='shipping-streetAddress'>Street Address: </label><input type='text' name='shipping-streetAddress' class='shipping-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-streetAddress"]) ? $_SESSION["account"]["shipping-streetAddress"] : ""); ?>'></li>
                        <li><label id='shipping-suburb' for='shipping-suburb'>Suburb: </label><input type='text' name='shipping-suburb' class='shipping-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-suburb"]) ? $_SESSION["account"]["shipping-suburb"] : ""); ?>'></li>
                        <li><label id='shipping-state'for='state'> State: <select name='shipping-state' class='shipping-address' value='<?php echo (isset($_SESSION["account"]["shipping-state"]) ? $_SESSION["account"]["shipping-state"] : ""); ?>'>
                        <option value='NSW'>NSW</option>
                        <option value='ACT'>ACT</option>
                        <option value='VIC'>VIC</option>
                        <option value='QLD'>QLD</option>
                        <option value='TAS'>TAS</option>
                        <option value='NT'>NT</option>
                        <option value='SA'>SA</option>
                        <option value='WA'>WA</option></select>
                        <li><label id='shipping-postcode' for='shipping-postcode'>Post Code: <input type='text' name='shipping-postcode' class='shipping-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-postcode"]) ? $_SESSION["account"]["shipping-postcode"] : ""); ?>'></label></li>
                        </ul>
                    </div>
                </div>

                <!-- Postage Options - fix BR with styling -->
                <br><br><br>
                <h3>Postage Option</h3>
                <div name='postageOptions'>
                    <input id='expressPost' type='radio' name='postage' value='express' <?php echo (isset($_SESSION["account"]["postage"]) && $_SESSION["account"]["postage"] === 'express' ? "checked" : ""); ?>>
                    <label for='expressPost'> Express Delivery: <span>$</span><span id='expressPrice'>12.00<br><br></span></label>
                    <input id='standardPost' type='radio' name='postage' value='standard'  <?php echo (!isset($_SESSION["account"]["postage"]) || $_SESSION["account"]["postage"] === 'standard' ? "checked" : ""); ?>>
                    <label for='standardPost'> Standard Delivery: <span>$</span><span id='standardPrice'>9.00</span></label>
                </div>

                <br>
                <h3>Order Summary</h3>
                <?php 
                // Order Summary - inc updated total with postage option
                foreach($_SESSION["products"] as $productId => $productQuantity) {
                    $result = get_product_by_id($conn, htmlspecialchars($productId));
                    if ($result) {
                        echo "<div id='checkoutSummary>";
                        $subTotal = $productQuantity * $result["price"];
                        $total += $subTotal; // need to add postage to this
                        echo "<div id=checkoutProductDetails>";
                        echo "<div class='product-item-details'>";
                        echo "<img src='images/" . $result["image"] . "' alt='" . $result["name"] . ">";
                        echo "</div>";
                        echo "<div id='productItemName>";
                        echo "<strong class='product-item-name'><br>" . $result["name"] . "</strong><br>";
                        echo "<strong>Item Price: $" . $result["price"];
                        echo "<div id='checkoutQuantity'>";
                        echo "<strong>Quantity: </strong>" . $productQuantity;
                        echo "</div>";
                        echo "<strong>Subtotal: </strong>$" . number_format((float)$subTotal, 2);
                    }
                }
                echo "<div id='totalAmount'>";
                echo "<br><br><strong>Total Amount: $</strong>";
                echo "<strong>" . number_format((float)$total, 2, '.', '') . "</strong> // NOTE: i need to add postage to this //";
                echo "</div>";
                }
            }
        ?>
        <br><br>
            <div id='proceed-to-checkout-button'>
                <input type='hidden' id='accountAction' name='accountAction' value='update'>
                <input type='submit' id='proceed-to-payment' value='Proceed To Payment'>
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
