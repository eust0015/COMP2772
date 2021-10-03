<?php
session_start();
include_once 'cart_functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <!-- <script src="scripts/script.js" defer></script> -->
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="description" content="Assignment02" />
        <title>Shopping Cart</title>
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
        <h1>Shopping Cart</h1>

        <div class='cart-container' id='cart-container'>
            <div id='cart-table' class='cart-table'>
                <table id='shopping-cart-table' class='shopping-cart-table'>
                    <div class='table-head'>
                        <thead>
                            <tr>
                                <th class='col-item'><span>Item</span></th>
                                <th class='col-item-description'><span>Description</span></th>
                                <th class='col-price'><span>Price</span></th>
                                <th class='col-quantity'><span>Quantity</span></th>
                                <th class='col-subtotal'><span>Sub Total</span></th>
                            </tr>
                        </thead>
                    </div>
                    <tbody>
                        <?php
                            include_once 'db_functions.php';
                            $conn = get_conn();
                            $total = 0;

                            if($conn){
                                if (isset($_SESSION["products"])) {
                                    foreach($_SESSION["products"] as $productId => $productQuantity) {
                                        $result = get_product_by_id($conn, htmlspecialchars($productId));
                                        if ($result) { 
                                            $subTotal = $productQuantity * $result["price"];
                                            $total += $subTotal;
                                            $gst = $total / 10;
                                            echo "<tr class='item-info'>";
                                            echo "<td class='col-item' data-th='Item'>";
                                            echo "<div class='product-item-details'>";
                                            echo "<img src='images/" . $result["image"] . "' alt='" . $result["name"] . "'></div>";
                                            echo "</td>";
                                            echo "<td class='col-item-description'><strong class='product-item-name'>" . $result["name"] . "</strong></td>";
                                            echo "<td class='col-price' data-th='Price' id='product-price'>$" . $result["price"] . "</td>";
                                            echo "<td class='col-quantity' data-th='Quantity'>";
                                            echo "<div class='quantity-control'>";
                                            echo "<form action='cart.php' id='formSubtractFromCart' name='formSubtractFromCart' method='POST'>";
                                            echo "<input type='hidden' id='cartProductId' name='cartProductId' value='".$result["id"]."'>";
                                            echo "<input type='hidden' id='cartProductQuantity' name='cartProductQuantity' value='-1'>";
                                            echo "<input type='hidden' id='cartAction' name='cartAction' value='update'>";
                                            echo "<input id='subtractFromCartButton' name='subtractFromCartButton' class='minusButton' type='submit' value='-'/>";   
                                            echo "</form>";
                                            echo $productQuantity;
                                            echo "<form action='cart.php' id='formAddToCart' name='formAddToCart' method='POST'>";
                                            echo "<input type='hidden' id='cartProductId' name='cartProductId' value='".$result["id"]."'>";
                                            echo "<input type='hidden' id='cartProductQuantity' name='cartProductQuantity' value='1'>";
                                            echo "<input type='hidden' id='cartAction' name='cartAction' value='update'>";
                                            echo "<input id='addToCartButton' name='addToCartButton' class='plusButton' type='submit' value='+'/>";   
                                            echo "</form>";
                                            echo "</div>";
                                            echo "</td>";
                                            echo "<td class='col-subtotal' data-th='Subtotal' id='displayProductSubtotal'>$" . number_format((float)$subTotal, 2, '.', '') ."</td>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class='cart-summary' id='cart-summary'>
                <div class='cart-buttons'>
                    <form action='cart.php' id='formAddToCart' name='formAddToCart' method='POST'>
                        <input type='hidden' id='cartAction' name='cartAction' value='clear'>
                        <input  type='submit' name='update-cart-action' id='empty-cart' value='Clear Cart'>
                    </form>
                    <!-- <input type="button" name='update-cart-action' id='update-cart' value='Update Cart'> -->
                </div>
                <div class='cart-totals' id='cart-totals'>
                    <table class='data-totals' id='summaryTotals'>
                    <tbody>
                        <tr class='sub-total'>
                            <th class='amount-label'>Sub Total</th>
                            <td class='amount'>
                                <span class='price' id='summarySubtotal'>$<?php echo number_format((float)$total, 2, '.', '') ?></span>
                            </td>
                        </tr>
                        <tr class='gst'>
                            <th class='amount-label'>GST Included</th>
                            <td class='amount'>
                                <span class='price' id='summaryGST'>$<?php echo number_format((float)$gst, 2, '.', '') ?></span>
                            </td>
                        </tr>
                        <tr class='total-amount'>
                            <th class='amount-label'>Total Amount</th>
                            <td class='amount'>
                                <span class='price' id='summaryTotal'>$<?php echo number_format((float)$total, 2, '.', '') ?></span>
                            </td>
                        </tr>
                    </tbody>  
                </table>
            </div>
            </div>
            <form action='checkout.php' method='POST' id='cart-form' class='cart-form'>
                <div id='proceed-to-checkout-button'>
                    <a href="checkout.php"><input type='submit' id='proceed-to-checkout' value='Proceed To Checkout'></a>
                </div>
            </form>
        </div>

    </body>
</html>
<script>
    // Prevent issues if the page is refreshed
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>