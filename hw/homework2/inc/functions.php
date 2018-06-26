<?php
    
    /*
     *The main() function
     *Chooses weapons randomly for players
     */
     function play() {
         
         for ($i=1; $i<4; $i++){
             ${"randomValue" . $i} = rand(0,7);
             displaySymbol(${"randomValue" . $i}, $i);
         }
         displayPoints($randomValue1, $randomValue2, $randomValue3);
     }
    
    
     /*
    *Takes a random number parameter
    *Displays a corresponding game symbol
    **/
    function displaySymbol($randomValue, $pos) {
                switch ($randomValue) {
                    case 0: $symbol = "dissappeares";
                        break;
                    case 1: $symbol = "teddybear";
                        break;
                    case 2: $symbol = "sniperrifle";
                        break;
                    case 3: $symbol = "dualpistols";
                        break;
                    case 4: $symbol = "cymbalsmonkey";
                        break;
                    case 5: $symbol = "chinalake";
                        break;
                    case 6: $symbol = "ak47";
                        break;
                    case 7: $symbol = "alienblaster";
                }
                echo "<img id = 'reel$pos' src='img/$symbol.jpeg' alt='$symbol' title='". ucfirst($symbol) . "' width='70' />";
    }
            
    /*
     *Displays win/loss based off worthiness of guns in arsenal
     *
    **/
    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
        
        echo "<div id='output'>";
        $arsenal = array($randomValue1, $randomValue2, $randomValue3);
        for ($p = 1; $p <= count($arsenal); $p++) {
            if (${"randomValue" . $p} == 7) {
                 rsort($arsenal);
                 echo nl2br("<h2>Alien Blaster!</h2><h4>Kindly, you trade guns\n\nwith the newb.</h4>"); 
                 $p = 3;
                 break;
            }
        }
        if (array_sum($arsenal) <= 7) {
            echo nl2br("<h3>\nNot enough firepower.\n\nYour team was slaughtered by\n\nthe zombie horde.</h3>");
        } else if (array_sum($arsenal) <= 15) {
            echo nl2br("<h3>\nThe box was unpredictable.\n\nBoth teammates are\n\ndown. You're on your own...</h3>"); 
        } else {
            echo nl2br("<h3>\nThe box has been gracious. \n\n Bring on the zombies!</h3>");
        }
        echo "</div>";
    }
?>
