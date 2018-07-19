<!--Final Project - Channel Islands Aviation-->

<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Channel Islands Aviation - Company Website</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    </head>
    <body>
        <h1>Channel Islands Aviation</h1>
        
        <br /><br />
        
        <form method="POST" action ="loginProcess.php">
            Last Name: <input type="text" name="lastname"/> <br />
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" class = 'btn btn-primary' name="submitForm" value="Login!" />
            <br /><br />
            <?php
                if($_SESSION['incorrect']) {
                    echo "<p class = 'lead' id = 'error' style ='color:red'>";
                    echo "<strong>Incorrect Last Name or Password!</strong></p>";
                }
            ?>
        </form>
    </body>
</html>