<?php

function getProductInfo() {
    global $connection;
    $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $record;
}

function getCategories($catId) {
    global $connection;
    
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option ";
        echo ($record["catId"] == $catId)? "selected": "";
        echo " value='".$record["catId"] ."'>". $record['catName'] ." </option>";
    }
}

if (isset($_GET['updateProduct'])) {
    $sql = "UPDATE om_product
        SET productName = :productName,
            productDescription = :productDescription,
            productImage = :productImage,
            price = :price,
            catId = :catId
        WHERE productId = :productId";
    $np = array();
    $np[":productName"] = $_GET['productName'];
    $np[":productDescription"] = $_GET['description'];
    $np[":productImage"] = $_GET['productImage'];
    $np[":price"] = $_GET['price'];
    $np[":catId"] = $_GET['catId'];
    $np[":productId"] = $_GET['productId'];
    
    $statement = $connection->prepare($sql);
    $statement ->execute($np);
    echo "Product has been updated!";
    
}

if (isset ($_GET['productId'])) {
    $product = getProductInfo();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
         <form>
            <input type="hidden" name="productId" value= "<?=$product['productId']?>"/>
            <strong>Product name</strong> <input type="text" class="form-control" value = "<?=$product['productName']?>" name="productName"><br>
            <strong>Description</strong> <textarea name="description" class="form-control" cols = 50 rows = 4><?=$product['productDescription']?></textarea><br>
            <strong>Price</strong> <input type="text" class="form-control" name="price" value = "<?=$product['price']?>"><br>
            
            <strong>Category</strong> <select name="catId" class="form-control">
                <option>Select One</option>
                <?php getCategories( $product['catId'] ); ?>
            </select> <br />
            <strong>Set Image Url</strong> <input type = "text" class="form-control" name = "productImage" value = "<?=$product['productImage']?>"><br>
            <input type="submit" class='btn btn-primary' name="updateProduct" value="Update Product">
        </form>
    </body>
</html>