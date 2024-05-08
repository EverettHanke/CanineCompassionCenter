<?php
/*
 * Everett
 * Pedro
 * Nathan
 */

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Import what we require here!
require_once ('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Reroute to home Page @BASE
$f3->route('GET /', function ($f3){

    //var_dump($f3->get('SESSION'));



    //Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// NTR 5/7 Reroute to Our Dogs page
$f3->route('GET /ourDogs', function (){
    //Render a view page
    $view = new Template();
    echo $view->render('views/ourDogs.html');
});


//run Fat Free
$f3->run();