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
                <a href="cart.php">Shopping Cart</a>
            </li>
            <li id="list">
                <a href="login.html">Account Login</a>
            </li>
        </ul>
        <br>
        <br>
        <h1>Checkout</h1>
    </body>
</html>