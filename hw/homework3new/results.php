<!DOCTYPE html>
<html>
    <head>
        <title> Snow Mountain Ski Shop </title>
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1> Results </h1>
        </header>
        
        <br/> <br />
        
         <?php
            if (empty($_GET['nametext']) || (empty($_GET['phonenumber'])) || (empty($_GET['addresstext']))  
                || (empty($_GET['category'])))  { //If form wasn't submitted
                
                echo "<h2> Please fill out all areas of this form before submitting. </h2>";
                
            } else if ((!isset($_GET['activity'])) && (!isset($_GET['activity']))) {
                echo "<h2> Please select Ski or Snowboard. </h2>";
            } else {  //If form was submitted
                  
         ?>       
                  <h3>Welcome <?php echo $_GET["nametext"]; ?></h3>
                  <h3>Your Home address is: <?php echo $_GET["addresstext"]; ?></h3>
                  <h3><?php 
                  $choice = $_GET["activity"]; 
                  if ($choice == "ans1") {
                      echo Ski ;
                  } else if ($choice == "ans2") {
                     echo Snowboard ;
                  }
                  ?> 
                  safely!!</h3>
        <?php 
            } //End Else
        ?>
        
        <br/> <br />
        
        <div id="main">   
          <form action="results.php" method="get">
            <label for =="name">Name:</label> 
            <input id="name" type="text" name="nametext" value="<?=$_GET['nametext']?>"/>
            <label for =="phone">Phone Number:</label>
            <input id="phone" type="text" name="phonenumber" value="<?=$_GET['phonenumber']?>"/>
            <br/> <br />
            <label for="address">Enter your Home address:</label>
            <textarea id ="address" name="addresstext" value="addresstext"><?=$_GET['addresstext']?></textarea>
            
            <br/> <br />
            
            <fieldset>
                <legend>Choose type of activitity</legend>
                <?php   
                    if ($_GET["activity"] == "ans1") { ?>
                        <input id = "ski" type = "radio" name="activity" value="ans1" checked>
                        <label for = "ski">Ski</label><br>
                    <?php } else { ?>
                        <input id = "ski" type = "radio" name="activity" value="ans1">
                        <label for = "ski">Ski</label><br>
                    <?php }
                    
                    if ($_GET["activity"] == "ans2") { ?>
                        <input id = "snowboard" type = "radio" name="activity" value="ans2" checked>
                        <label for = "snowboard">Snow Board</label><br>
                    <?php } else { ?>
                        <input id = "snowboard" type = "radio" name="activity" value="ans2">
                        <label for = "snowboard">Snow Board</label><br>
                    <?php } ?>
            </fieldset>
            
            <br />
            
             <?php
                if (isset($_GET["extragear"])) { ?>
                    <input type = "radio" id = "poles" name = "extragear" value="ans3" checked>
                    <label for = "Poles"></label><label for="poles"> Poles </label>
                <?php } else { ?>
                    <input type = "radio" id = "poles" name = "extragear" value="ans3">
                    <label for = "Poles"></label><label for="poles"> Poles </label>
                <?php } ?>
            
            <br/> <br />
            
            <select name = "category">
                <?php
                if ($_GET["category"] == "") { ?>
                    <option value="" selected>Select One</option>
                    <option value = "beg">Begginner</option>
                    <option value = "int">Intermediate</option>
                    <option value = "adv">Advanced</option>
                    <option value = "exp">Expert</option>
                <?php } else if ($_GET["category"] == "beg") { ?>
                    <option value="" selected>Select One</option>
                    <option value="beg" selected>Begginner</option>
                    <option value = "int">Intermediate</option>
                    <option value = "adv">Advanced</option>
                    <option value = "exp">Expert</option>
                <?php } else if ($_GET["category"] == "int") { ?>
                    <option value="" selected>Select One</option>
                    <option value = "beg">Begginner</option>
                    <option value="int" selected>Intermediate</option>
                    <option value = "adv">Advanced</option>
                    <option value = "exp">Expert</option>
                <?php } else if ($_GET["category"] == "adv") { ?>
                    <option value="" selected>Select One</option>
                    <option value = "beg">Begginner</option>
                    <option value = "int">Intermediate</option>
                    <option value="adv" selected>Advanced</option>
                    <option value = "exp">Expert</option>
                <?php } else if ($_GET["category"] == "exp") { ?>
                    <option value="" selected>Select One</option>
                    <option value = "beg">Begginner</option>
                    <option value = "int">Intermediate</option>
                    <option value = "adv">Advanced</option>
                    <option value="exp" selected>Expert</option>
                <?php } ?>
            </select>
            <input type="submit" value="Submit" />
          </form>
        </div>
            
        <br/> <br />
        <br/> <br />
        
    </body>
</html>