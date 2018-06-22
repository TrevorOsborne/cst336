<!DOCTYPE html>
<?php
    include 'inc/functions.php';
?>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id="main">   
          <?php  
            /*$randomValue1 = rand(0, 2);
            displaySymbol($randomValue1);
            $randomValue2 = rand(0, 2);
            displaySymbol($randomValue2);
            $randomValue3 = rand(0, 2);
            displaySymbol($randomValue3);*/
            play();
           ?> 
          
          <form>
              <input type="submit" vlue="Spin"/>
          </form>
        </div>
            
    </body>
</html>