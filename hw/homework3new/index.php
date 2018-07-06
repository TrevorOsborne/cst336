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
            <h1> Snow Mountain Rentals & Lessons </h1>
        </header>
        
        <br/> <br />
        
        <div id="main">   
          <form action="results.php" method="get">
            <label for =="name">Name:</label> 
            <input id="name" type="text" name="nametext" value="<?=$_GET['nametext']?>"/>
            <label for =="phone">Phone Number:</label>
            <input id="phone" type="text" name="phonenumber" value="<?=$_GET['phonenumber']?>"/>
            <br/> <br />
            <label for="address">Enter your Home address:</label>
            <textarea id ="address" name="addresstext" value="<?=$_GET['addresstext']?>"></textarea>
            
            <br/> <br />
            
            <fieldset>
                <legend>Choose type of activitity</legend>
                <input id = "ski" type = "radio" name="activity" value="ans1">
                <label for = "ski">Ski</label><br>
                <input id = "snowboard" type = "radio" name="activity" value="ans2">
                <label for = "snowboard">Snow Board</label><br>
            </fieldset>
            
            <br />
            
            <input type = "radio" id = "poles" name = "extragear" value = "ans3">
            <label for = "Poles"></label><label for="poles"> Poles </label>
            
            <br/> <br />
            
            <select name = "category">
                <option value = "">Select One</option>
                <option value = "beg">Begginner</option>
                <option value = "int">Intermediate</option>
                <option value = "adv">Advanced</option>
                <option value = "exp">Expert</option>
            </select>
            
            <input type="submit" value="Submit" />
          </form>
        </div>
            
        <br/> <br />
        <br/> <br />
        
        <footer>
            Disclaimer: By submitting this form you agree to Snow Mountain's terms and condition.
            <br/>
            Snow Mountain is not responsible for any injuries incurred while using the resort.
        </footer>
    </body>
</html>