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
  <div class="first-header" id="first-header">
      <span class="first-header-information">orders are shipping weekly - please expect minor delays due to covid-19 safety restrictions</span>
    </div>

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
              <a id="menuCartLink" href="cart.php"><button class="my-cart-button">My Cart<?php echo (isset($_SESSION["products"]) ? " (" . count($_SESSION["products"]) . ")" : ""); ?></button></a>
            </li>
            <li class="second-header-links" id="list">
              <a id="menuCartLink" href="login.php"><button class="my-cart-button">Login</button></a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
  </body>
</html>

