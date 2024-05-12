<?php
/*
 * AUTHORS: Everett, Pedro, Nathan
 */

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Import what we require here!
require_once ('vendor/autoload.php');
require_once ('model/data-layers.php');
require_once ('model/validation.php');
require_once ('model/pets.php');
require_once ('model/dogs.php');


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
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        var_dump($_POST);
    }

    //testing for now
    //Instantiate some dog classes to fill our cards
    $personality1 = array("Friendly", "Social Butterfly");
    $dog1 = new Dogs("Libby", "1 - 3 years", "German Shepherd", "Female", $personality1, 200);
    $dog2 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 150);
    $dog3 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 250);
    $dog4 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 50);
    $dogDataBase = array($dog1, $dog2, $dog3, $dog4);
    $f3->set('dogDataBase', $dogDataBase);
    var_dump($dogDataBase);

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

// EAH login reroute
$f3->route('GET|POST /login', function ()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        var_dump($_POST);
    }
    $view = new Template();
    echo $view->render('views/login.html');
});

// EAH SignUp reroute
$f3->route('GET|POST /signUp', function ($f3)
{
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $userName = "";
        $password = "";
        $email = "";
        $phone = "";
        if (validateUserName($_POST['userName']))
        {
            $userName = $_POST['userName'];
        }
        else
        {
            $f3->set('errors["userName"]', 'Please enter at valid username with no numbers');
        }
        if (validateEmail($_POST['userEmail']))
        {
            $email = $_POST['userEmail'];
        }
        else
        {
            $f3->set('errors["userEmail"]', 'Please enter a valid email');
        }
        if (validatePhone($_POST['phoneNum']))
        {
            $phone = $_POST['phoneNum'];
        }
        else
        {
            $f3->set('errors["phoneNum"]', 'Please enter at valid phone number');
        }
        if (validatePassword($_POST['password'],$_POST['confirmPassword']))
        {
            $password = $_POST['password'];
        }
        else
        {
            $f3->set('errors["password"]', 'Please enter a matching password');
        }
        if (empty($f3->get('errors')))
        {
            //create profile object

            //pass profile over to data base

            //if user send them back to home page

            //if admin send them onto admin screen

            //test var_dump for now
            var_dump($userName, $password, $email, $phone);
        }
    }
    $view = new Template();
    echo $view->render('views/signUp.html');
});

// PVR 5/9 reroute to scheduling
// Will change later, quick tester for now
$f3->route('GET|POST /schedule', function (){
    $view = new Template();
    echo $view->render('views/schedule.html');
});


//run Fat Free
$f3->run();