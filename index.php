<?php
/*
 * AUTHORS: Everett, Pedro, Nathan
 */

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Import what we require here!
require_once ('vendor/autoload.php');


//Instantiate Fat-Free
$f3 = Base::instance();

//Instantiate Controller
$con = new Controller($f3);

//Reroute to home Page @BASE
$f3->route('GET|POST /', function ($f3){

    $GLOBALS['con']->home();
});

// NTR 5/7 Reroute to Our Dogs page
$f3->route('GET|POST /ourDogs', function ($f3){
    $GLOBALS['con']->ourDogs($f3);
});

// EAH login reroute
$f3->route('GET|POST /login', function ($f3)
{
    $GLOBALS['con']->login($f3);
});

// EAH SignUp reroute
$f3->route('GET|POST /signUp', function ($f3)
{
    $GLOBALS['con']->signUp($f3);
});

// PVR 5/9 reroute to scheduling
// Will change later, quick tester for now
$f3->route('GET|POST /schedule', function ($f3){
   $GLOBALS['con']->schedule($f3);
});

//EAH Admin page routing
$f3->route('GET|POST /admin', function ($f3)
{
    $GLOBALS['con']->admin($f3);
});

//run Fat Free
$f3->run();