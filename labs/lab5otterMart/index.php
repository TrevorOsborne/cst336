<?php

include 'dbConnection.php';

$conn = getDatabaseConnection("ottermart");

function displayCategories() {
    global $conn;
    
    $sql = "SELECT catID, catName from om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records); //can be used to veiw results
    
    foreach ($records as $record) {
        echo "<option value='" .$record["catId"]."' >" . $record["catName"] . "</option>";
    }
}

function displaySearchResults() {
    global $conn;
    
    if (isset($_GET['searchForm'])) { //Executes following commands once form has been submitted
        echo "<h3>Products Found: </h3>";
        //Query below prevents SQL injection
        $namedParameters = array();
        
        $sql = "SELECT * FROM om_product WHERE 1";
        
        if (!empty($_GET['product'])) { //checks whether user has typed in 'Product' text box
            $sql .= " AND productName LIKE :productName";
            $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
        }
        
        if (!empty($_GET['categry'])) { //checks whether user has selcted a category
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET['category'];
        }
        
        if (!empty($_GET['priceFrom'])) { //checks whether user has typed in "price From" box
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET['priceFrom'];
        }
        
        if (!empty($_GET['priceTo'])) { //checks whether user has typed in "price To" box
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET['priceTo'];
        }
        
        if (isset($_GET['orderBy']))  {
            if ($_GET['orderBy'] == "price") {
                $sql .= " ORDER BY price";
            } else {
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
            
            echo $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "<br /><br />";
        }
    }
}   

?>

<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
        <div>
            <h1> OtterMart Product Search </h1>
            
            <br>
            
            <form>
                Product: <input type="text" name="product" />
                <br />
                Category:
                <select name="category">
                    <option value="">Select One</option>
                    <?=displayCategories()?>
                </select>
                <br /><br/>
                Price: From <input type="text" name="priceFrom" size="7" />
                       To   <input type="text" name="priceTo" size="7" />
                       <br>
                       Order results by:
                       <br>
                       
                       <input type="radio" name="orderBy" value="price" /> Price <br>
                       <input type="radio" name="orderBy" size="name" /> Name
                       
                       <br><br>
                       <input type="submit" value="Search" name="searchForm" />
            </form>

            <br />
            
        </div>
       
        <hr>
        <?= displaySearchResults() ?>
        <footer>
            Disclaimer: Products non-refundable
        </footer>
    </body>
</html>