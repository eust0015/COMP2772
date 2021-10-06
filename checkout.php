<?php
session_start();
include_once 'cart_functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="products" content="Assignment02" />
        <title>Checkout</title>
    </head>
    <body>       
        <ul id="menu">
            <li id="list">
                <form action="products.php" id="formSearch" name="formSearch" method="POST">
                    <input type="text" id="textSearch" name="search" placeholder="Search">
                    <select id="selectCategory" name="category">
                        <option value="all categories">All Categories</option>
                        <option value="cable">Cable</option>
                        <option value="case">Case</option>
                        <option value="charger">Charger</option>
                        <option value="earphone">Earphone</option>
                        <option value="headphone">Headphone</option>
                        <option value="holder">Holder</option>
                        <option value="power bank">Power Bank</option>
                        <option value="screen protector">Screen Protector</option>
                    </select>
                    <input type="submit" value="Search"/>
                </form>
            </li>
            <li id="list">
                <a href="index.html">Home</a>
            </li>
            <li id="list">
                <a href="products.php">Products</a>
            </li>
            <li id="list">
                <a href="about.html">About</a>
            </li>
            <li id="list">
                <a id="menuCartLink" href="cart.php">Shopping Cart<?php echo ((isset($_SESSION["products"])) ? " (" . count($_SESSION["products"]) . ")" : "") ?></a>
            </li>
            <li id="list">
                <a href="login.html">Account Login</a>
            </li>
        </ul>
        <br>
        <br>
        <h1>Checkout</h1>

        <?php 
        include_once 'db_functions.php';
        $conn = get_conn();

        if($conn){
            if(isset($_SESSION["products"])){
                
                // Billing Information - fix BR with styling
                echo "<h3>Billing Information</h3>";
                echo "<form action='payment.php' method='POST' name='customerDetails>";

                echo "<div name='customerDetails'>";
                echo "<ul class='customerDetails'>";
                echo "<li><label id='billing-fname' for='billing-fname'>First Name: <input type='text' name='billing-fname' placeholder='Required' required></label></li>";
                echo "<li><label id='billing-lname' for='billing-lname'>Last Name: <input type='text' name='billing-lname' placeholder='Required' required></label></li>";
                echo "<li><label id='billing-mobilenumber' for='billing-mobilenumber'>Mobile number: <input type='text' name='billing-mobilenumber' placeholder='Required' required></label></li>";
                echo "<li><label id='billing-email' for='billing-email'>Email Address: <input type='email' name='billing-email' placeholder='Required' required></label></li>";
                echo "<li><label id='billing-streetAddress' for='billing-streetAddress'>Street Address: <input type='text' name='billing-streetAddress' placeholder='Required'></label></li>";
                echo "<li><label id='billing-suburb' for='billing-suburb'>Suburb: <input type='text' name='billing-suburb' placeholder='Required'></label></li>";
                echo "<li><label id='billing-postcode' for='billing-postcode'>Post Code: <input type='text' name='billing-postcode' placeholder='Required' required></label></li>";
                echo "<li><label id='billing-state'for='billing-state'> State: <select name='billing-state'>
                <option value='NSW'>NSW</option>
                <option value='ACT'>ACT</option>
                <option value='VIC'>VIC</option>
                <option value='QLD'>QLD</option>
                <option value='TAS'>TAS</option>
                <option value='NT'>NT</option>
                <option value='SA'>SA</option>
                <option value='WA'>WA</option></select>";
                echo "</ul>";
                echo "</div>";

                // Shipping Information - fix BR with styling
                echo "<h3><br><br><br><br><br><br>Shipping Information</h3>";
                echo "<div name='shippingAddress'>";
                echo "<li><input type='checkbox' name='shippingAddress' onclick='fillShippingDetails(this.form)'><label id='shippingAddress' for='shippingAddress'>Shipping Address Same As Billing Address</li>";
                echo "<div name='customerDetails'>";
                echo "<ul class='customerDetails'>";
                echo "<li><label id='shipping-fname' for='shipping-fname'>First Name: <input type='text' name='shipping-fname' placeholder='Required' required id='1'></label></li>";
                echo "<li><label id='shipping-lname' for='shipping-lname'>Last Name: <input type='text' name='shipping-lname' placeholder='Required' required id='2'></label></li>";
                echo "<li><label id='shipping-mobilenumber' for='shipping-mobilenumber'>Mobile number: <input type='text' name='shipping-mobilenumber' placeholder='Required' required id='3'></label></li>";
                echo "<li><label id='shipping-email' for='shipping-email'>Email Address: <input type='email' name='shipping-email' placeholder='Required' required id='4'></label></li>";
                echo "<li><label id='shipping-streetAddress' for='shipping-streetAddress'>Street Address: <input type='text' name='shipping-streetAddress' placeholder='Required' required id='5'></label></li>";
                echo "<li><label id='shipping-suburb' for='shipping-suburb'>Suburb: <input type='text' name='shipping-suburb' placeholder='Required' required id='6'></label></li>";
                echo "<li><label id='shipping-postcode' for='shipping-postcode'>Post Code: <input type='text' name='shipping-postcode' placeholder='Required' required id='7'></label></li>";
                echo "<li><label id='shipping-state'for='state'> State: <select name='shipping-state' id='8'>
                <option value='NSW'>NSW</option>
                <option value='ACT'>ACT</option>
                <option value='VIC'>VIC</option>
                <option value='QLD'>QLD</option>
                <option value='TAS'>TAS</option>
                <option value='NT'>NT</option>
                <option value='SA'>SA</option>
                <option value='WA'>WA</option></select>";
                echo "</div>";
                echo "</ul>";

                // Postage Options - fix BR with styling
                echo "<h3><br><br><br><br><br><br>Postage Option</h3>";
                echo "<div name='postageOptions'>";
                echo "<input id='expressPost' type='radio' name='postage'>";
                echo "<label for='expressPost'> Express Delivery: <span>$</span><span id='expressPrice'>12.00<br><br></span></label>";
                echo "<input id='standardPost' type='radio' name='postage'>";
                echo "<label for='standardPost'> Standard Delivery: <span>$</span><span id='standardPrice'>9.00</span></label>";
                echo "</div>";

                // Order Summary - inc updated total with postage option
                echo "<h3><br>Order Summary</h3>";
                

                echo "</form>";
                }
            }
        ?>
        <form action='payment.php' method='POST' id='checkout-form' class='checkout-form'><br><br><br><br>
            <div id='proceed-to-checkout-button'>
                <a href="payment.php"><input type='submit' id='proceed-to-payment' value='Proceed To Payment'></a>
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

<script>
    function fillShippingDetails(f){
        if(f.shippingAddress.checked == true){
            document.getElementById("1").disabled = true;
            document.getElementById("2").disabled = true;
            document.getElementById("3").disabled = true;
            document.getElementById("4").disabled = true;
            document.getElementById("5").disabled = true;
            document.getElementById("6").disabled = true;
            document.getElementById("7").disabled = true;
            document.getElementById("8").disabled = true;
        }
    }
</script>