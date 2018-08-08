<?php
session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection("final");


function displayCategories() {
    global $conn;
    
    $sql = "SELECT concat(firstName, ' ', lastName) as name
            FROM superhero
            WHERE id < 8
            ORDER BY lastName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records); //can be used to veiw results
    
    foreach ($records as $record) {
        echo "<option value='" .$record["name"]."' >" . $record["name"] . "</option>";
    }
}

function displaySearchResults() {
    global $conn;
    
    if (isset($_GET['searchForm'])) { //Executes following commands once form has been submitted
        echo "<h3>Movies Found: </h3>";
        //Query below prevents SQL injection
        $namedParameters = array();
        
        $sql = "SELECT * FROM final WHERE 1";
        
        
        if (!empty($_GET['categry'])) { //checks whether user has selcted a category
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET['category'];
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
        <title>Final Project: Superhero Program 2 </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
       
        <br /><br />
        
        <!--Display Quiz Content-->
        <div>
            <div id="quiz">
                <h1>Super Hero Movie</h1>
                
        
                <br />
                    <h3>What superhero would you like to search for movies?</h3>
                <div>
                   <form>
                        <br />
                        Superheros:
                        <select name="category">
                            <option value="">Select One</option>
                            <?=displayCategories()?>
                        </select> <br /><br />
                        
                        
                        <input type="submit" value="Search Movies" name="searchForm" />
                        
                    </form>
                
                </div> <br />
                <hr>
    
                <?= displaySearchResults() ?>
                <br /><br />
                 
   <table border="1" width="600" cellpadding="10">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:green">
      <td>1</td>
      <td>The list of the superheroes in the dropdown menu is retrieved from the database (ordered alphabetically, no duplicates)<br></td>
      <td width="20" align="center">10</td>
    </tr> 
    <tr style="background-color:white">
      <td>2</td>
      <td>When clicking on the "Search Movies" button, the OMDB API is used to display the list of movies (<strong>poster</strong> and <strong>title</strong>) for the superhero selected<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td> When clicking on the "Search Movies" button, the superhero selected is stored in a Session variable using AJAX<br></td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:white">
      <td>4</td>
      <td> When clicking on the "See Search History" link, the superheroes whose movies have been searched are displayed within an iFrame</td>
      <td width="20" align="center">15</td>
    </tr>   
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td> When clicking on the "Superhero Details" button, an AJAX call is made to display all corresponding info (name, image, and pob)<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>When clicking on the "Superhero Details" button, the name and images of the superhero's enemies are displayed<br></td>
      <td width="20" align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>       
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
   
            </div>
        </div>
            <br /><br />
        
        <br />
  
        <!--Javascript files-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/gradeQuiz2.js"></script>
    </body>
</html>