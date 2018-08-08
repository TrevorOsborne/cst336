<?php
session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection("final");

function displayHero() {
    $random = rand(1, 15);
    global $conn;
    $sql="SELECT image
          FROM superhero
	      WHERE id = $random";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    if ($random == 1 || $random == 11 ) {
        return "spiderman";
    } else if ($random == 2 || $random == 8 || $random == 12 ) {
        return "superman";
    } else if ($random == 3 || $random == 13 ) {
        return "batman";
    } else if ($random == 4 || $random == 9 ) {
        return "wonder_woman";
    } else if ($random == 5 || $random == 14 ) {
        return "iron_man";
    } else if ($random == 6 || $random == 15 ) {
        return "captain_america";
    } else {
        return "hulk";
    }
}

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

function checkAnswer() {
    global $conn;
    
    if (isset($_GET['searchForm'])) { //Executes following commands once form has been submitted
        echo "<h3>Your results: </h3>";
        
        if (empty($_GET['categry']))  {
            echo "<h4>Error: Make a selection please.</h4>";
        } 
    }
}   


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Final Project: Superhero Select </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <h1> Superhero Select!</h1>
        </header>
        
        <br /><br />
        
        <!--Display Quiz Content-->
        <div>
            <div id="quiz">
                <h1>Super Hero Quiz</h1>
                <figure>
                        <img src="img/superheroes/<?=displayHero()?>.png" />
                </figure>
        
                <br />
                    <h3>What is the name of the superhero?</h3>
                <div>
                   <form>
                        <br />
                        Superheros:
                        <select name="category">
                            <option value="">Select One</option>
                            <?=displayCategories()?>
                        </select> <br />
                        <div id="question1-feedback" class="answer"></div><br />
                        
                        <input type="submit" value="Check Answer" name="searchForm" />
                        
                        <div id="waiting"></div>
                    </form>
                <!--Will display the quiz score-->
                <div id="scores"></div>
                
                </div> <br />
                <hr>
                <?= checkAnswer() ?>
                <div id="feedback">
                    <h2>Your final score is <span id="score"> score </span> </h2>
                    
                    You've taken this quiz <strong id="times"></strong> time(s). <br /><br />
                    
                    Your average score was <strong id="average"></strong>
                </div>
                
                <table border="1" width="600" cellpadding="10px">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:green">
      <td>1</td>
      <td>A random image of a superhero is displayed when refreshing the page <br></td>
      <td width="20" align="center">15</td>
     </tr>     
     <tr style="background-color:green">
      <td>2</td>
      <td><p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
        </p></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:white">
      <td>3</td>
      <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:white">
      <td>4</td>
      <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:white">
      <td>5</td>
      <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
      <td width="20" align="center">15</td>
    </tr>     

     <tr style="background-color:white">
      <td>6</td>
      <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
      <td width="20" align="center">15</td>
    </tr>
     
     <tr style="background-color:white">
      <td>7</td>
      <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
      <td width="20" align="center">5</td>
    </tr> 

     <tr style="background-color:#99E999">
      <td>8</td>
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