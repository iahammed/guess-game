<?php

function generate_guess($type, $min, $max) {

    if ($type === 'number') {
        $guess = rand($min, $max);
        setcookie('guess', $guess);
        return $guess;

    } else {
        $guess = rand($min, $max);
        setcookie('guess', $guess);
        // return $GLOBALS['letter'][$guess];
        return $guess;
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $type = $_POST['type'];
    if ($type === 'letter'){
        $max = 25;
    } else {
        $max = $_POST['max'];
    }
    $min = 0;
    $try = 1;
    $GLOBALS['letter'] = range('a','z');
    // for try count
    setcookie('try', $try);
    setcookie('type', $type);
    setcookie('max', $max);
    setcookie('min', 0);

    $guess = generate_guess($type, $min, $max);
    setcookie('guess', $guess);
    header("Location:index.php?try=". $try);
} else {
    if(!empty($_GET['todo'])){
        $min = $_COOKIE['min'];
        $max = $_COOKIE['max'];
        if($_GET['todo'] === 'more'){
            $min = $_COOKIE['guess'];
            $max = $_COOKIE['max'];
            setcookie('min', $min);
        } else {
            $max = $_COOKIE['guess'];
            $min = $_COOKIE['min'];
            setcookie('max', $max);
        }
        $guess = generate_guess($_COOKIE['type'], $min, $max);
        $try = $_GET['try'] + 1;
        setcookie('guess', $guess);
        setcookie('try', $try);
        header("Location:index.php?try=". $try);
    } else {
        header("Location:index.php");
    }
}