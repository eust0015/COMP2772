<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
        <link rel="stylesheet" href="styles/menu.css">
        <link rel="stylesheet" href="styles/checkouttest.css" />
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
        
        <?php 
            include_once 'db_functions.php';
            $conn = get_conn();

            if($conn){
                if(isset($_SESSION["products"])){
                    $postageCost = 0;
                    $total = 0;
                
        ?>
        
        <!-- Billing informormation -->
        <form id='checkout-form' name='customerDetails' class='checkout-form' action='payment.php' method='POST'>
            <div class="first-section-checkout-container">
              <div class="first-section-shipping-information">
                <div class="first-section-checkout-container-heading">
                  <span class="first-section-checkout-heading">Getting your order </span>
                </div>
                <div class="first-section-shipping">
                  <div class="first-section-shipping-details">
                    <span class="section-subheadings">Billing Information </span>
                    <span class="first-section-shipping-form">First Name </span>
                    <input class="billing-address" type="text" name='billing-fname' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-fname"]) ? $_SESSION["account"]["billing-fname"] : ""); ?>' />
                    <span class="first-section-shipping-form">Last Name </span>
                    <input class="billing-address" type="text" name='billing-lname' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-lname"]) ? $_SESSION["account"]["billing-lname"] : ""); ?>' />
                    <span class="first-section-shipping-form">Email Address </span>
                    <input type='email' name='billing-email' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-email"]) ? $_SESSION["account"]["billing-email"] : ""); ?>' />
                    <span class="first-section-shipping-form">Mobile Number </span>
                    <input type='number' name='billing-mobilenumber' class='billing-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-mobilenumber"]) ? $_SESSION["account"]["billing-mobilenumber"] : ""); ?>' />
                    
                    <span class="first-section-shipping-form">Address </span>
                    <input class="billing-address" type="text" name='billing-streetAddress' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-streetAddress"]) ? $_SESSION["account"]["billing-streetAddress"] : ""); ?>' />
                    <span class="first-section-shipping-form">Suburb </span>
                    <input class="billing-address" type="text" name='billing-suburb' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-suburb"]) ? $_SESSION["account"]["billing-suburb"] : ""); ?>' />
                    <span class="first-section-shipping-form">State </span>
                    <select class="billing-address" name='billing-state' value='<?php echo (isset($_SESSION["account"]["billing-state"]) ? $_SESSION["account"]["billing-state"] : ""); ?>' >
                      <option value="NSW">NSW</option>
                      <option value="ACT">ACT</option>
                      <option value="VIC">VIC</option>
                      <option value="QLD">QLD</option>
                      <option value="TAS">TAS</option>
                      <option value="NT">NT</option>
                      <option value="SA">SA</option>
                      <option value="WA">WA</option>
                    </select>
                    <span class="first-section-shipping-form">Postcode </span>
                    <input class="billing-address" type="text" name='billing-postcode' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["billing-postcode"]) ? $_SESSION["account"]["billing-postcode"] : ""); ?>' />
                    <input type='checkbox' id='shippingAddressCheckBox' name='shipToBillingAddress' <?php echo (isset($_SESSION["account"]["shipToBillingAddress"]) && $_SESSION["account"]["shipToBillingAddress"] ? "checked" : ""); ?>><label id='shippingAddressBoxLabel' for='shippingAddress'> Shipping Address Same As Billing Address</label>
                  </div>
                  
                  <!-- Postage options -->
                  <div class="first-section-shipping-information-postage-options">
                    <span class="section-subheadings">Postage Options</span>
                    <?php
                        $results = get_postages($conn);
                        if ($results) { 
                            $alreadyChecked = false;
                            $lengthOfResults = count($results);
                            $lastResult = $lengthOfResults - 1;
                            for ($row = 0; $row < $lengthOfResults; $row++) {
                                if (($postageCost === 0 && $row + 1 === $lastResult) || (isset($_SESSION["account"]["postage"]) && $_SESSION["account"]["postage"] === $results[$row]["id"])){
                                    echo "<input id='" . $results[$row]["id"] . "' type='radio' name='postage' value='" . $results[$row]["id"] . "' checked>";
                                    $postageCost = $results[$row]["cost"];
                                }
                                else{
                                    echo "<input id='" . $results[$row]["id"] . "' type='radio' name='postage' value='" . $results[$row]["id"] . "'>";
                                }
                                echo "<label class='postageName' for='" . $results[$row]["id"] . "'>" . $results[$row]["name"] . ": $" . $results[$row]["cost"] . "</label>";
                                echo "<input type='hidden' id='cost_" . $results[$row]["id"] . "' value='" . $results[$row]["cost"] . "'>";
                                echo "<br><br>";
                            }
                        }
                    ?>
                  </div>
                </div>
              </div>
              <!-- Order summary -->
              <div class="first-section-order-summary">
                  <?php
                    foreach($_SESSION["products"] as $productId => $productQuantity) {
                        $result = get_product_by_id($conn, htmlspecialchars($productId));
                        if ($result) {
                          echo "<div class='checkoutSummary'>";
                            $subTotal = $productQuantity * $result["price"];
                            $total += $subTotal;
                            echo "<img src='images/" . $result["image"] . "' alt='" . $result["name"] . ">";
                            echo "<span class='checkoutSummaryFields'><br>" . $result["name"] . "</span><br>";
                            echo "<span class='checkoutSummaryFields'>Item Price: $" . $result["price"] . "</span>";
                            echo "<span class='checkoutSummaryFields'>Quantity: " . $productQuantity . "</span>";
                            echo "<span class='checkoutSummaryFields'>Total Price: " . number_format((float)$subTotal, 2) . "</span>";
                            echo "</div>";
                        }
                    }
                    echo "<div id='totalAmount'>";
                    echo "<input type='hidden' id='cartTotalCost' name='cartTotalCost' value='" . $total . "'>";
                    echo "<br><br><strong id='grandTotalCost'>Total Amount: $" . number_format((float)$total + (float)$postageCost, 2, '.', '') . "</strong>";
                    echo "</div>";
                    }
                }
                ?>
              </div>
            </div>

            <!-- Shipping information -->
            <div class="second-section-checkout-container">
              <div class="second-section-billing-information" id="shippingAddressDiv" name="shippingAddressDiv">
                <span class="section-subheadings">Shipping Information </span>
                <span class="first-section-shipping-form">First Name </span>
                <input class="shipping-address" type="text" name='shipping-fname' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-fname"]) ? $_SESSION["account"]["shipping-fname"] : ""); ?>' />
                <span class="first-section-shipping-form">Last Name </span>
                <input class="shipping-address" type="text" name='shipping-lname' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-lname"]) ? $_SESSION["account"]["shipping-lname"] : ""); ?>' />
                <span class="first-section-shipping-form">Email Address </span>
                <input type='email' name='shipping-email' class='shipping-address' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-email"]) ? $_SESSION["account"]["shipping-email"] : ""); ?>' />
                <span class="first-section-shipping-form">Mobile Number Name </span>
                <input type='number' class='shipping-address' name='shipping-mobilenumber' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-mobilenumber"]) ? $_SESSION["account"]["shipping-mobilenumber"] : ""); ?>' />
                
                <span class="first-section-shipping-form">Address </span>
                <input class="shipping-address" type="text" name='shipping-streetAddress' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-streetAddress"]) ? $_SESSION["account"]["shipping-streetAddress"] : ""); ?>' />
                <span class="first-section-shipping-form">Suburb </span>
                <input class="shipping-address" type="text" name='shipping-suburb' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-suburb"]) ? $_SESSION["account"]["shipping-suburb"] : ""); ?>' />
                <span class="first-section-shipping-form">State </span>
                <select class="shipping-address" name='shipping-state' value='<?php echo (isset($_SESSION["account"]["shipping-state"]) ? $_SESSION["account"]["shipping-state"] : ""); ?>' >
                  <option value="NSW">NSW</option>
                  <option value="ACT">ACT</option>
                  <option value="VIC">VIC</option>
                  <option value="QLD">QLD</option>
                  <option value="TAS">TAS</option>
                  <option value="NT">NT</option>
                  <option value="SA">SA</option>
                  <option value="WA">WA</option>
                </select>
                <span class="first-section-shipping-form">Postcode </span>
                <input class="shipping-address" type="text" name='shipping-postcode' placeholder='Required' required value='<?php echo (isset($_SESSION["account"]["shipping-postcode"]) ? $_SESSION["account"]["shipping-postcode"] : ""); ?>' />
              </div>

            <!-- Contact information -->
            <div class="third-section-checkout-container">
              <div class="third-section-billing-information" id="shippingAddressDiv" name="shippingAddressDiv">
                <input type="hidden" id="accountAction" name="accountAction" value="update" />
                <input class="section-section-button-proceed-to-payment" type="submit" id="proceed-to-payment" value="Proceed To Payment" />
              </div>

            <!-- <div class="fourth-section-proceed-to-payment" >
            <input type="hidden" id="accountAction" name="accountAction" value="update" />
              <input class="section-section-button-proceed-to-payment" type="submit" id="proceed-to-payment" value="Proceed To Payment" />
            </div> -->
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
    
    <!-- <div class="first-header"></div>
    <div class="second-header"></div>

    <div class="first-section-checkout-container">
      <div class="first-section-shipping-information">
        <div class="first-section-checkout-container-heading">
          <span class="first-section-checkout-heading">Getting your order </span>
        </div>
        <div class="first-section-shipping">
          <div class="first-section-shipping-details">
            <span class="section-subheadings">Shipping Information </span>
            <span class="first-section-shipping-form">First Name </span>
            <input class="first-section-shipping-form-input-fields" type="text" />
            <span class="first-section-shipping-form">Last Name </span>
            <input class="first-section-shipping-form-input-fields" type="text" />
            <span class="first-section-shipping-form">Address </span>
            <input class="first-section-shipping-form-input-fields" type="text" />
            <span class="first-section-shipping-form">City </span>
            <input class="first-section-shipping-form-input-fields" type="text" />
            <span class="first-section-shipping-form">State </span>
            <select class="first-section-shipping-form-input-fields" name="" id="">
              <option value="NSW">NSW</option>
              <option value="ACT">ACT</option>
              <option value="VIC">VIC</option>
              <option value="QLD">QLD</option>
              <option value="TAS">TAS</option>
              <option value="NT">NT</option>
              <option value="SA">SA</option>
              <option value="WA">WA</option>
            </select>
            <span class="first-section-shipping-form">Zipcode </span>
            <input class="first-section-shipping-form-input-fields" type="text" />
          </div>
          <div class="first-section-shipping-information-postage-options">
            <span class="section-subheadings">Postage Options</span>
          </div>
        </div>
      </div>
      <div class="first-section-order-summary"></div>
    </div>

    <div class="second-section-checkout-container">
      <div class="second-section-billing-information">
        <span class="section-subheadings">Billing Information </span>
        <span class="first-section-shipping-form">First Name </span>
        <input class="first-section-shipping-form-input-fields" type="text" />
        <span class="first-section-shipping-form">Last Name </span>
        <input class="first-section-shipping-form-input-fields" type="text" />
        <span class="first-section-shipping-form"> Address </span>
        <input class="first-section-shipping-form-input-fields" type="text" />
        <span class="first-section-shipping-form">City </span>
        <input class="first-section-shipping-form-input-fields" type="text" />
        <span class="first-section-shipping-form">State </span>
        <select class="first-section-shipping-form-input-fields" name="" id="">
          <option value="NSW">NSW</option>
          <option value="ACT">ACT</option>
          <option value="VIC">VIC</option>
          <option value="QLD">QLD</option>
          <option value="TAS">TAS</option>
          <option value="NT">NT</option>
          <option value="SA">SA</option>
          <option value="WA">WA</option>
        </select>
        <span class="first-section-shipping-form">Zipcode </span>
        <input class="first-section-shipping-form-input-fields" type="text" />
        <input type="hidden" id="accountAction" name="accountAction" value="update" />
        <input class="section-section-button-proceed-to-payment" type="submit" id="proceed-to-payment" value="Proceed To Payment" />
      </div>
    </div> -->






  </body>
</html>
