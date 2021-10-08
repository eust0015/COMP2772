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
        <a href="index.php">Home</a>
    </li>
    <li id="list">
        <a href="products.php">Products</a>
    </li>
    <li id="list">
        <a href="about.php">About</a>
    </li>
    <li id="list">
        <a id="menuCartLink" href="cart.php">Shopping Cart<?php echo (isset($_SESSION["products"]) ? " (" . count($_SESSION["products"]) . ")" : ""); ?></a>
    </li>
    <li id="list">
        <a href="login.php">Account Login</a>
    </li>
</ul>
