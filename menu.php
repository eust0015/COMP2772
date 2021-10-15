<!-- Header - Top and Bottom -->
<div class="first-header" id="first-header"></div>
<div class="second-header" id="second-header">
    <header class="header-second">
    <a href="index.php"> <img class="header2-logo" src="images/header-logo.png" alt="logo" /> </a>
    <nav>
        <ul class="nav-links">
        <li><a href="index.php">Home</a></li>  
        <li><a href="products.php">Products</a></li>
        </ul>
    </nav>
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


    <a id="menuCartLink" href="cart.php">
        <button class="header-second-my-cart-button">    
            My Cart<?php echo (isset($_SESSION["products"]) ? " (" . count($_SESSION["products"]) . ")" : ""); ?>
        </button>
    </a>
    </header>
</div>

