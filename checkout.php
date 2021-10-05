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
                // Billing Information

                echo "<h3>Billing Information</h3>";
                echo "<form action='payment.php' method='POST' name='customerDetails>";

                echo "<div name='customerDetails'>";
                echo "<ul class='customerDetails'>";
                echo "<li><label id='fname' for='fname'>First Name: <input type='text' fname='fname' placeholder='Required' required></label></li>";
                echo "<li><label id='lname' for='lname'>Last Name: <input type='text' fname='lname' placeholder='Required' required></label></li>";
                echo "<li><label id='mobilenumber' for='mobilenumber'>Mobile number: <input type='text' name='mobilenumber' placeholder='Required' required></label></li>";
                echo "<li><label id='email' for='email'>Email Address: <input type='email' name='email' placeholder='Required' required></label></li>";
                echo "<li><label id='streetAddress' for='streetAddress'>Street Address: <input type='text' name='streetAddress' placeholder='Required'></label></li>";
                echo "<li><label id='suburb' for='suburb'>Suburb: <input type='text' name='suburb' placeholder='Required'></label></li>";
                echo "<li><label id='postcode' for='postcode'>Post Code: <input type='text' postcode='postcode' placeholder='Required' required></label></li>";
                echo "<li><label id='state'for='state'> State: <select name='state'>
                <option value='QLD'>QLD</option>
                <option value='NSW'>NSW</option>
                <option value='ACT'>ACT</option>
                <option value='VIC'>VIC</option>
                <option value='TAS'>TAS</option>
                <option value='NT'>NT</option>
                <option value='SA'>SA</option>
                <option value='WA'>WA</option></select>";
                echo "</ul>";
                echo "</div>";

                // Shipping Information
                echo "<h3><br><br><br><br><br><br><br>Shipping Information</h3>";
                echo "<div name='shippingAddress'>";
                echo "<li><input type='checkbox' id='shippingAddress'><label id='shippingAddress' for='shippingAddress'>Shipping Address Same As Billing Address</li>";
                echo "<div name='customerDetails'>";
                echo "<ul class='customerDetails'>";
                echo "<li><label id='fname' for='fname'>First Name: <input type='text' fname='fname' placeholder='Required' required></label></li>";
                echo "<li><label id='lname' for='lname'>Last Name: <input type='text' fname='lname' placeholder='Required' required></label></li>";
                echo "<li><label id='mobilenumber' for='mobilenumber'>Mobile number: <input type='text' name='mobilenumber' placeholder='Required' required></label></li>";
                echo "<li><label id='email' for='email'>Email Address: <input type='email' name='email' placeholder='Required' required></label></li>";
                echo "<li><label id='streetAddress' for='streetAddress'>Street Address: <input type='text' name='streetAddress' placeholder='Required'></label></li>";
                echo "<li><label id='suburb' for='suburb'>Suburb: <input type='text' name='suburb' placeholder='Required'></label></li>";
                echo "<li><label id='postcode' for='postcode'>Post Code: <input type='text' postcode='postcode' placeholder='Required' required></label></li>";
                echo "<li><label id='state'for='state'> State: <select name='state'>
                <option value='QLD'>QLD</option>
                <option value='NSW'>NSW</option>
                <option value='ACT'>ACT</option>
                <option value='VIC'>VIC</option>
                <option value='TAS'>TAS</option>
                <option value='NT'>NT</option>
                <option value='SA'>SA</option>
                <option value='WA'>WA</option></select>";
                echo "</div>";
                echo "</ul>";

               
                
                // Postage Options

                echo "</form>";

                // Order Summary
                // Proceed To Payment
                }
            }
        ?>

    </body>
</html>
<script>
    // Prevent issues if the page is refreshed
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>