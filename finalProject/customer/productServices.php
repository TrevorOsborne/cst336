<?php

include '../dbConnection.php';

$conn = getDatabaseConnection("channel_islands");
/*    
    function displaySearchResults() 
    {
        global $conn;
        
        if (isset($_GET['searchForm'])) 
        {
            echo "<h3>Products Found: </h3>";
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM aircraft";
            $sql = "SELECT * FROM certificates";
            
            if (!empty($_GET['product'])) 
            {
                $sql .= " AND productName LIKE :productName";
                $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
            }
            if (!empty($_GET['priceFrom'])) 
            {
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] = $_GET['priceFrom'];
            }
            
            if (!empty($_GET['priceTo'])) 
            {
                $sql .= " AND price <= :priceTo";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }
            
            if(isset($_GET['orderBy'])) 
            {
                if ($_GET['orderBy'] == "price") {
                    $sql .= " ORDER BY price";
                } 
                else 
                {
                    $sql .= " ORDER BY productName";
                }
            }
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($records as $record) 
            {
                
                echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
                
                echo "<p>" . $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "</p><br /><br />";
            }
        }
    }
    */
    
    function displayAllCertificates() 
    {
        global $conn;
        $sql="SELECT * FROM certificates";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $records;
    }
    function displayAllAirplanes() 
    {
        global $conn;
        $sql="SELECT * FROM aircraft";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $records;
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>C.I.A Product & Certificate Search</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        <div class="container">
            <h1>C.I.A Product & Certificate Search</h1>
            
            <nav class='navbar navbar-default - navbar-fixed-top'>
                    <div class='container-fluid'>
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='#'>C.I.A. Products and Services</a>
                        </div>
                        <ul class='nav navbar-nav'>
                            <li><a href='productServices.php'>Products & Services</a></li>
                            <li><a href='cart.php'>Cart</a></li>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                            
                        </ul>
                    </div>
                </nav>
        
            <div class="form-container">
            <form>
                
                Product: <input type="text" name="product"/>
                <br />
                Price: From <input type="text" name="priceFrom" size="7"/>
                       To   <input type="text" name="priceTo" size="7"/>
                <br>
                Order result by:
                <br>
                
                <input type="radio" name="orderBy" value="price"/> Price <br>
                <input type="radio" name="orderBy" value="name"/> Name
                
                <br><br>
                <input type="submit" value="Search" name="searchForm"/>
            </form>
            </div>
            <br>
        </div>
        <hr>
        <?= displaySearchResults() ?>
    </body>
</html>