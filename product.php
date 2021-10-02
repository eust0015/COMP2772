<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="description" content="Assignment02" />
        <title>Product</title>
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
                <a href="products.html">Products</a>
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
        <h1>Product</h1>
        <?php
            include_once 'db_functions.php';
            $conn = get_conn();
            if($conn){
                $result = get_product_by_name($conn, htmlspecialchars($_GET["name"]));
                if ($result) { 
                    echo $result["id"]."<br/>";
                    echo $result["name"]."<br/>";
                    echo $result["description"]."<br/>";
                    echo $result["image"]."<br/>";
                    echo $result["price"]."<br/>";
                    echo $result["recommendedRetailPrice"]."<br/>";
                    echo $result["category"]."<br/>";
                    echo $result["keyWord"]."<br/>";
                }
            } 
        ?>
    </body>
</html>
