<?php
    session_start();
    
    if (isset($_POST['removeId'])) 
    {
        foreach ($_SESSION['cart'] as $itemKey => $item) 
        {
            if ($item['id'] == $_POST['removeId']) 
            {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    if (isset($_POST['itemId'])) 
    {
        foreach ($_SESSION['cart'] as &$item) 
        {
            if ($item['id'] == $_POST['itemId']) 
            {
                $item['quantity'] = $_POST['update'];
            }
        }
    }
    
    function displayCart() 
    {
        
        if(isset($_SESSION['cart'])) 
        {
            echo "<table class='table'>";
            foreach ($_SESSION['cart'] as $item) 
            {
                $itemId = $item['id'];
                $itemQuant = $item['quantity'];
                
                echo '<tr>';
                
                echo "<td><img src='" . $item['img'] . "'><td>";
                echo "<td><h4>" . $item['name'] . "</h4></td>";
                echo "<td><h4>$". $item['price'] . "</h4></td>";
                
                echo '<form method="post">';
                echo "<input type='hidden' name='itemId' value='$itemId'>";
                echo "<td><input type='text' name='update' class='form-control' placeholder='$itemQuant'></td>";
                echo'<td><button class="btn btn-danger">Remove</button></td>';
                echo '</form>';
                
                echo "<form method='post'>";
                echo "<input type='hidden' name='removeId' value='$itemId'>";
                echo '<td><button class="btn btn=danger">Remove</button></td>';
                
                echo '</tr>';
            }
            echo "</table>";
        }
    }
    
    function displayCartCount() 
    {
        echo count($_SESSION['cart']);
    }
    //Create an array in the Session to hold our cart items 
    if(!isset($_SESSION['cart'])) 
    {
        $_SESSION['cart'] = array();
    }
    
    //Checks to see if the search form has been submitted
    if (isset($_GET['query']))
    {
        //Get access to our API function
        include 'wmapi.php';
        $items = getProducts($_GET['query']);
    }
    
    //If the 'itemName' is set, put it in the session cart and irect the user to the shopping cart
    if (isset($_POST['itemName'])) 
    {
        //Create associative array for item properties
        $newItem = array();
        $newItem['name'] = $_POST['itemName'];
        $newItem['price'] = $_POST['itemPrice'];
        $newItem['img'] = $_POST['itemImg'];
        $newItem['id'] = $_POST['itemId'];
        
        //Check to see if other items with this id are in the array
        //If so, this item isn't new. Only update quantity
        //Must e passed by reference so that each item can be updated!
        foreach($_SESSION['cart'] as &$item) 
        {
            if ($newItem['id'] == $item['id']) 
            {
                $item['quantity'] += 1;
                $found = true;
            }
        }
        //else add it to array 
        if($found != true) 
        {
            $newItem['quantity'] = 1;
            array_push($_SESSION['cart'], $newItem);
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title> Cart </title>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                
                <!-- Bootstrap Navagation Bar -->
                <nav class='navbar navbar-default - navbar-fixed-top'>
                    <div class='container-fluid'>
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='#'>Shopping Land</a>
                        </div>
                        <ul class='nav navbar-nav'>
                            <li><a href='productServices.php'>Products & Services</a></li>
                            <li><a href='cart.php'>Cart</a></li>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                            </span> Cart: <?php displayCartCount(); ?> </a></li>
                        </ul>
                    </div>
                </nav>
                <br /> <br /> <br />
                <h2>Shopping Cart</h2>
                <!-- Cart Items -->
                <?php displayCart(); ?>
            </div>
        </div>
    </body>
</html>