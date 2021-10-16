<!-- Header - Top and Bottom -->
<!-- <div class="first-header" id="first-header"></div>
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
</div> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/menufinal.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="first-header" id="first-header"></div>

    <header>
      <div class="second-header-container">
        <a class="header-logo-link" href="index.php"><img class="header-logo" src="images/header-logo.png" alt="" /></a>
        <nav>
          <ul class="nav--links">
            <li class="second-header-links" id="list"><a href="products.php">Products</a></li>

            <li id="list">
              <form action="products.php" id="formSearch" name="formSearch" method="POST">
                <input class="second-header-search-field" type="text" id="textSearch" name="search" placeholder="Search" />
               
                <select id="selectCategory" name="category">
                  <option value="all categories">All Categories</option>
                  <option value="computers">Computers</option>
                  <option value="tvs">TVs</option>
                  <option value="headphones">Headphones</option>
                  <option value="mobile-phones">Mobile Phones</option>
                  <option value="gaming">Gaming</option>
                  <option value="cameras">Cameras</option>
                  <option value="dcgha">Drones / Car Gear / Home Appliances</option>
                  dcgha = drones / car gear / home appliances
                  <option value="hfw">Health Fitness & Wearables</option>
                  hfw = health fitness & wearables
                </select>
                <input class="second-header-search-button" type="submit" value="Search" />
              </form>
            </li>

            <li class="second-header-links" id="list">
              <a id="menuCartLink" href="cart.php"><?php echo (isset($_SESSION["products"]) ? " (" . count($_SESSION["products"]) . ")" : ""); ?><button class="my-cart-button">My Cart</button></a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
  </body>
</html>

