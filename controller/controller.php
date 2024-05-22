<?php

class Controller
{
    private $_f3; //Fat-Free Router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }
    function home()
    {
        //Render a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }
    function ourDogs()
    {
        //Render a view page

        //POST will be when we filter and refilter for certain Dogs
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            var_dump($_POST);
        }
        //testing for now
        //Instantiate some dog classes to fill our cards
        //these manually made cards will be replaced once we have things connected to a database
        $personality1 = array("Friendly", "Social Butterfly");
        $dog1 = new Dogs("Libby", "1 - 3 years", "German Shepherd", "Female", $personality1, 200);
        $dog2 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 150);
        $dog3 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 250);
        $dog4 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 50);
        $dogDataBase = array($dog1, $dog2, $dog3, $dog4);
        $this->_f3->set('dogDataBase', $dogDataBase);
        //var_dump($this->_f3->get('dogDataBase'));

        //set breed below
        $breed = DataLayers::getFilterBreeds();
        $this->_f3->set('breed', $breed);
        //set personality below
        $personality = DataLayers::getFilterPersonality();
        $this->_f3->set('personality', $personality);
        //set age group below
        $age = DataLayers::getFilterAge();
        $this->_f3->set('age', $age);
        $view = new Template();
        echo $view->render('views/ourDogs.html');
    }
    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            var_dump($_POST);
            $this->_f3->reroute("admin");
        }
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function signUp()
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
                $this->_f3->set('errors["userName"]', 'Please enter at valid username with no numbers');
            }
            if (validateEmail($_POST['userEmail']))
            {
                $email = $_POST['userEmail'];
            }
            else
            {
                $this->_f3->set('errors["userEmail"]', 'Please enter a valid email');
            }
            if (validatePhone($_POST['phoneNum']))
            {
                $phone = $_POST['phoneNum'];
            }
            else
            {
                $this->_f3->set('errors["phoneNum"]', 'Please enter at valid phone number');
            }
            if (validatePassword($_POST['password'],$_POST['confirmPassword']))
            {
                $password = $_POST['password'];
            }
            else
            {
                $this->_f3->set('errors["password"]', 'Please enter a matching password');
            }
            if (empty($this->_f3->get('errors')))
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
    }

    function schedule()
    {
        $view = new Template();
        echo $view->render('views/schedule.html');
    }

    function admin()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            var_dump($_POST);
            var_dump($_FILES);
            //Potentially grab this and upload it to userImages later once we have dbConnect set up??
            $file_name = $_FILES['image']['name'];
            $folder = 'userImages/'.$file_name;
            /*$query = mysqli_query($stmt, "Insert into userImages (file) values ('$file_name')");
            if (move_uploaded_file($file_name, $folder))
            {
                //success
            }*/

        }

        $personality1 = array("Friendly", "Social Butterfly");
        $dog1 = new Dogs("Libby", "1 - 3 years", "German Shepherd", "Female", $personality1, 200);
        $dog2 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 150);
        $dog3 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 250);
        $dog4 = new Dogs("Marq", "1 - 3 years", "Dahcshund", "Male", $personality1, 50);
        $dogDataBase = array($dog1, $dog2, $dog3, $dog4);

        $this->_f3->set('dogDataBase', $dogDataBase);

        $breed = DataLayers::getFilterBreeds();
        $this->_f3->set('breed', $breed);
        //set personality below
        $personality = DataLayers::getFilterPersonality();
        $this->_f3->set('personality', $personality);
        //set age group below
        $age = DataLayers::getFilterAge();
        $this->_f3->set('age', $age);

        $view = new Template();
        echo $view->render('views/admin.html');
    }
}