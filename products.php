<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="products" content="Assignment02" />
        <title>Products</title>
    </head>
    <body>       
        <ul id="menu">
            <li id="list">
                <form action="products.html" id="formSearch" name="formSearch" method="GET">
                    <input type="text" id="textSearch" name="textSearch" placeholder="Search" >
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
                $results = get_products_with_keyWord($conn, "case usb");
                if ($results) { 
                    foreach ($results as $row) {
                        echo $row["id"]."<br/>";
                        echo $row["name"]."<br/>";
                        echo $row["description"]."<br/>";
                        echo $row["image"]."<br/>";
                        echo $row["price"]."<br/>";
                        echo $row["recommendedRetailPrice"]."<br/>";
                        echo $row["category"]."<br/>";
                        echo $row["keyWord"]."<br/>";
                      }
                }
            } 
        ?>
    </body>
</html>
