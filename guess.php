<?php

function generate_guess($type, $min = 0, $max = 25) {
    
    if ($type === 'number') {
        $guess = rand($min, $max);
        setcookie('guess', $guess);
        return $guess;

    } else {
        $guess = rand($min, $max);
        setcookie('guess', $guess);
        return $GLOBALS['letter'][rand($min, $max)];
    }

}

function justifyForm()
{
    echo '
    <form action ="guess.php" method = "get">
        <div>

            <button name = "todo" value = "more">More than this</button>
            <button name = "todo" value = "less">Less than this</button>
        </div>
    </form>
    ';
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $type = $_POST['type'];
    $max = $_POST['max'];
    $min = 0;
    
    $GLOBALS['match'] = false;
    $GLOBALS['try'] = 1;
    $GLOBALS['letter'] = range('a','z');
    // for try count
    setcookie('try', $GLOBALS['try']);
    setcookie('type', $type);

    setcookie('max', $max);
    setcookie('min', 0);

    $guess = generate_guess($type, $min, $max);
    echo 'Computer Guess is : ';
    echo generate_guess($type, $min, $max);
    justifyForm();

} else {
    if ($_GET['todo'] === 'more') {
        setcookie('min', $_COOKIE['guess']); 
    } else {
        setcookie('max',  $_COOKIE['guess']);
    }
    $type = $_COOKIE['type'];
    $min = $_COOKIE['min'];
    $max = $_COOKIE['max'];

    echo 'Computer Guess is : ';
    echo generate_guess($type, $min, $max);

    justifyForm();
}








