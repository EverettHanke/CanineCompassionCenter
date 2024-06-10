<?php
/*
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: index.php
 * PURPOSE: This is the main entry point for the Dog Adoption Center webpage.
 * It sets up routing for various pages using the Fat-Free Framework (F3).
 */

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Import what we require here!
require_once ('vendor/autoload.php');


//Instantiate Fat-Free
$f3 = Base::instance();

//Instantiate Controller
$con = new Controller($f3, new Validators());

//Reroute to home Page @BASE
$f3->route('GET|POST /', function (){

    $GLOBALS['con']->home();
});

// NTR 5/7 Reroute to Our Dogs page
$f3->route('GET|POST /ourDogs', function (){
    $GLOBALS['con']->ourDogs();
});

// EAH login reroute
$f3->route('GET|POST /login', function ()
{
    $GLOBALS['con']->login();
});

// EAH SignUp reroute
$f3->route('GET|POST /signUp', function ()
{
    $GLOBALS['con']->signUp();
});

// PVR 5/9 reroute to scheduling
// Will change later, quick tester for now
$f3->route('GET|POST /schedule', function (){
   $GLOBALS['con']->schedule();
});

//EAH Admin page routing
$f3->route('GET|POST /admin', function ()
{
    $GLOBALS['con']->admin();
});

// Route for updating admin status
$f3->route('POST /updateAdminStatus', function () {
    $GLOBALS['con']->updateAdminStatus();
});

//run Fat Free
$f3->run();