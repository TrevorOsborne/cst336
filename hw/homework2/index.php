<!DOCTYPE html>
<?php
    include 'inc/functions.php';
?>
<!--
Homework 2: Array and Loops
-->
<html>
    <head>
        <title> Call of Duty: Mystery Box </title>
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
         <header>
            <h1> Call of Duty -BlackOps2- Mystery Box </h1>
        </header>
        
        <br /><br />
        
        <main>
        
        <figure id="box">
            <img src="img/mysteryBox.jpg" alt="Picture of Mystery Box" />
        </figure>
        
            <div id="main">   
               <?php  
                play();
               ?> 
          
              <form>
                  <input type="Submit" vlue="Open"/>
              </form>
            </div>
        
        </main>
        
        <footer>
            <br /><br />
            <br /><br />
            <br /><br />
            <br /><br />
            <br /><br />
            <br /><br />
            <br /><br />
            You're fighting against endless zombies and have finally found the mystery box.
            It costs quite a bit of cash to chance the box, but you've been severing zombie heads with your knife
            and saving up. Time to equip your team of three with the firepower you'll need
            to survive.
        </footer>
        <!-- closing footer -->
    </body>
</html>