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
require_once ('model/data-layers.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Reroute to home Page @BASE
$f3->route('GET|POST /', function ($f3){

    //var_dump($f3->get('SESSION'));

    //No clue if we will need post here but better safe than sorry


    //Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// NTR 5/7 Reroute to Our Dogs page
$f3->route('GET|POST /ourDogs', function ($f3){
    //Render a view page

    //POST will be when we filter and refilter for certain Dogs

    //set breed below
    $breed = getFilterBreeds();
    $f3->set('breed', $breed);
    //set personality below
    $personality = getFilterPersonality();
    $f3->set('personality', $personality);
    //set age group below
    $age = getFilterAge();
    $f3->set('age', $age);
    $view = new Template();
    echo $view->render('views/ourDogs.html');
});


//run Fat Free
$f3->run();