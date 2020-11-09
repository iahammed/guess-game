<?php
   
?>

<html>
    <body>
        <?php
        if(empty($_GET['try'])){

            if (isset($_SERVER['HTTP_COOKIE'])) {
                $cookies = explode(';', $_SERVER['HTTP_COOKIE']);

                foreach($cookies as $cookie) {
                    $parts = explode('=', $cookie);
                    $name = trim($parts[0]);
                    setcookie($name, null,  -1 ,'/');
                }
            }            
        ?>
        <h1>Hi Welcome to Guessing Game</h1>
            <hr />
        <h4>Please enter max value if it is number</h4>
        <form action="process.php" method="POST"><br />
            <hr />
            <div>
                <input type="radio" name="type" value="number"
                    checked>
                    <label>Number</label>
                    <div>
                        <label>Max Value : </label>
                        <input type="text" name="max" value="10">
                    </div>
            </div>
            <hr />
            <div>
                <input type="radio" name="type" value="letter">
                <label>letter</label>
                
            </div>
            <hr />
            <div>
                <input type="submit" value="Start Game">
            </div>

        </form>

        <?php 
        } else {
            
            if($_COOKIE['type'] === 'letter') {
                $GLOBALS['letter'] = range('a','z');
                echo "<h1>" . $GLOBALS['letter'][$_COOKIE['guess']] . '</h1>';
            } else {
                echo "<h1>" . $_COOKIE['guess'] . '</h1>';

            }

            echo '<h3>No of try : ' . $_COOKIE['try'] .'</h3>';

        ?>
            <form method = "get" action ="process.php">
                <div>
                    <input type = "hidden" name = "try" value = <?=$_COOKIE['try']?> >
                    <button name = "todo" value = "more">More than this</button>
                    <button name = "todo" value = "less">Less than this</button>
                </div>
            </form>

            <a href="index.php">Home</a>


        <?php

            }
        ?>

    </body>
</html>