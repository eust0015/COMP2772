<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <script src="scripts/script.js" defer></script>
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
                <a href="cart.html">Shopping Cart</a>
            </li>
            <li id="list">
                <a href="login.html">Account Login</a>
            </li>
        </ul>
        <br>
        <br>
        <h1>Shopping Cart</h1>

        <div class='cart-container' id='cart-container'>
            <form action='checkout.php' method='POST' id='cart-form' class='cart-form'>
                <div id='cart-table' class='cart-table'>
                    <table id='shopping-cart-table' class='shopping-cart-table'>
                        <div class='table-header'>
                            <thead class='table-head'>
                                <tr>
                                    <th class='col-item'><span>Item</span></th>
                                    <th class='col-price'><span>Price</span></th>
                                    <th class='col-quantity'><span>Quantity</span></th>
                                    <th class='col-subtotal'><span>Sub Total</span></th>
                                </tr>
                            </thead>
                        </div>
                        <tbody>
                            <tr class='item-info'> <!-- THIS WILL NEED TO BE DYNAMIC PENDING NUMBER OF ITEMS IN CART-->
                                <td class='col-item' data-th='Item'>
                                    <div class='product-item-details'> <!-- PULL THIS FROM DB -->
                                        <img src="images/Headphones.png" alt="Headphones">
                                        <strong class='product-item-name'>Headphones</strong>
                                    </div>
                                </td>
                                <td class='col-price' data-th='Price' id='product-price'>349.00</td> <!-- PULL THIS FROM DB -->
                                <td class='col-quantity' data-th='Quantity'>
                                    <div class='quantity-control'>
                                    <input type="number" size='4' class='quantity-amount' id='quantity-amount' min='0'>
                                    </div>
                                </td>
                                <td class='col-subtotal' data-th='Subtotal' id='diaplayProductSubtotal'>Product Subtotal</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class='cart-actions'>
                    <input type="button" name='update-cart-action' id='empty-cart' value='Clear Cart'>
                    <input type="button" name='update-cart-action' id='update-cart' value='Update Cart'>
                </div>
                
                <div class='cart-summary'>
               <div class='cart-totals'>
                   <table class='data-totals'>
                      <tbody>
                          <tr class='sub-total'>
                              <th class='amount-label'>Sub Total</th>
                              <td class='amount'>
                                  <span class='price' id='summarySubtotal'>JS to generate</span>
                              </td>
                          </tr>
                          <tr class='gst'>
                              <th class='amount-label'>GST Included</th>
                                <td class='amount'>
                                    <span class='price' id='summaryGST'>$0</span>
                                </td>
                          </tr>
                          <tr class='total-amount'>
                                <th class='amount-label'>Total Amount</th>
                                <td class='amount'>
                                    <span class='price' id='summaryTotal'>$0</span>
                                </td>
                          </tr>
                      </tbody>  
                   </table>
               </div>
            </div>
            <input type='submit' value='Proceed To Checkout'>
            </form>
        </div>
        <?php 
        
        // php here
        
        
        ?>
    </body>
</html>