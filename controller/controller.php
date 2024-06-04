<?php
/**
 * Class Controller
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: controller.php
 * PURPOSE: This class handles the routing and business logic for the Dog Adoption Center application.
 */
class Controller
{
    private $_f3; //Fat-Free Router
    private $_validator;

    /**
     * Controller constructor.
     *
     * @param $f3 The Fat-Free Framework instance.
     */
    function __construct($f3, $validator)
    {
        $this->_f3 = $f3;
        $this->_validator = $validator;
    }

    /**
     * Render the home page.
     */
    function home()
    {
        //Render a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * Render the Our Dogs page and handle filtering and displaying dog data.
     */
    function ourDogs()
    {
        // DB connection
        $path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
        require_once $path;
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        //POST will be when we filter and refilter for certain Dogs
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {

            $this->_f3->set('SESSION.scheduleDogID', $_POST['id']);
            var_dump($_SESSION);


            //stmt for getting dog of equal id
            //set the data we get to the constructor of a dog object in session
            //and we will re route to schedule
            $this->_f3->reroute("schedule");

        }
        $dogDataBase = array();
        //Get the dog cards ready
        $sql = 'SELECT * FROM Pets ORDER BY PetID ASC ';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row)
        {
            array_push($dogDataBase, new Dogs($row['PetID'], $row['Name'], $row['Age'], $row['Breed'], $row['Gender'], $row['Personality'], $row['Price'], $row['Image']));
        }
        //Populate Cards
        $this->_f3->set('dogDataBase', $dogDataBase);


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

    /**
     * Render the login page and handle login logic.
     */
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


    /**
     * Render the sign-up page and handle sign-up logic.
     */
    function signUp()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //$validator = new Validators();
            $userName = "";
            $password = "";
            $email = "";
            $phone = "";
            $admin = 0;
            if ($this->_validator->validateUserName($_POST['userName']))
            {
                $userName = $_POST['userName'];
            }
            else
            {
                $this->_f3->set('errors["userName"]', 'Please enter at valid username with no numbers');
            }
            if ($this->_validator->validateEmail($_POST['userEmail']))
            {
                $email = $_POST['userEmail'];
            }
            else
            {
                $this->_f3->set('errors["userEmail"]', 'Please enter a valid email');
            }
            if ($this->_validator->validatePhone($_POST['phoneNum']))
            {
                $phone = $_POST['phoneNum'];
            }
            else
            {
                $this->_f3->set('errors["phoneNum"]', 'Please enter at valid phone number');
            }
            if ($this->_validator->validatePassword($_POST['password'],$_POST['confirmPassword']))
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

                // DB connection
                $path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
                require_once $path;
                try {
                    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
                // define query
                $sql = 'INSERT INTO CanineUsers (UserName,Email,PhoneNumber,Password,Admin)
                    VALUES (:UserName, :Email,:PhoneNumber ,:Password, :Admin)';
                // prepare query
                $statement = $dbh->prepare($sql);
                // binding data
                $statement->bindParam(':UserName', $userName);
                $statement->bindParam(':Email', $email);
                $statement->bindParam(':PhoneNumber', $phone);
                $statement->bindParam(':Password', $password);
                $statement->bindParam(':Admin', $admin);
                // Execute the query
                if ($statement->execute()) {
                    echo "<p>User $userName was inserted successfully!</p>";
                } else {
                    $errorInfo = $statement->errorInfo();
                    echo "<p>Error inserting User $userName. Error: " . $errorInfo[2] . "</p>";
                }
            } // End of Server request_method = post

        $view = new Template();
        echo $view->render('views/signUp.html');
        }

    }

    /**
     * Render the schedule page and display the selected dog's details.
     */
    function schedule()
    {
        // DB connection
        $path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
        require_once $path;
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        var_dump($_SESSION);
        //Call request
        $sql = "SELECT * FROM Pets WHERE PetID = :PetID";
        $stmt = $dbh->prepare($sql);
        $id = $this->_f3->get('SESSION.scheduleDogID');
        $stmt->bindParam(':PetID', $id, PDO::PARAM_INT);
        $stmt->execute();

        //Create Dog object based on results
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $scheduleDog = new Dogs($result['PetID'], $result['Name'], $result['Age'], $result['Breed'], $result['Gender'], $result['Personality'], $result['Price'], $result['Image']);
        $this->_f3->set('scheduleDog', $scheduleDog);
        $view = new Template();
        echo $view->render('views/schedule.html');
    }

    /**
     * Render the admin page and handle adding new dogs to the database.
     */
    function admin()
    {

        // DB connection
        $path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
        require_once $path;
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }



        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            var_dump($_POST);
            var_dump($_FILES);

            /*//Potentially grab this and upload it to userImages later once we have dbConnect set up??
                $file_name = $_FILES['image']['name'];
                $folder = 'userImages/'.$file_name;
                $query = mysqli_query($stmt, "Insert into userImages (file) values ('$file_name')");
                if (move_uploaded_file($file_name, $folder))
                {
                    //success
                }*/

            // Get data from the form
            $Name = $_POST['dogName'];
            $Age = $_POST['dogAge'];
            $Breed = $_POST['dogBreed'];
            $Gender = $_POST['dogGender'];
            $Personality = $_POST['dogPersonality'];
            $Price = $_POST['dogPrice'];

            // Handle file upload
            if (isset($_FILES['dogProfile']) && $_FILES['dogProfile']['error'] == 0) {
                $file_name = $_FILES['dogProfile']['name'];
                $tempName = $_FILES['dogProfile']['tmp_name'];
                $folder = 'userImages/'.$file_name;
                $file_path = $folder . $file_name;

                if (move_uploaded_file($tempName, $file_path)) {
                    echo "<h1>SUCCESS</h1>";
                } else {
                    echo "<p>Failed to move uploaded file.</p>";
                }
                //$this->_f3->reroute("admin"); do not use but good working theory for refresh bug.
            }


            // define query
            $sql = 'INSERT INTO Pets (Name,Age,Breed,Gender,Personality,Price,Image)
                    VALUES (:Name, :Age, :Breed, :Gender, :Personality, :Price, :Image)';
            // prepare query
            $statement = $dbh->prepare($sql);
            // binding data
            $statement->bindParam(':Name', $Name);
            $statement->bindParam(':Age', $Age);
            $statement->bindParam(':Breed', $Breed);
            $statement->bindParam(':Gender', $Gender);
            $statement->bindParam(':Personality', $Personality);
            $statement->bindParam(':Price', $Price);
            $statement->bindParam(':Image', $file_path);
            // Execute the query
            if ($statement->execute()) {
                echo "<p>Dog $Name was inserted successfully!</p>";
            } else {
                $errorInfo = $statement->errorInfo();
                echo "<p>Error inserting dog $Name. Error: " . $errorInfo[2] . "</p>";
            }
        } // End of Server request_method = post


        // define the query
        $sql = "SELECT * FROM Pets ORDER BY `PetID` ASC";
        // prepare the statement
        $statement = $dbh->prepare($sql);
        // execute the statement
        $statement->execute();
        // process the result in the html form
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->_f3->set('dbDogs', $result);
        /*NTR 5/23 Doing DB connectivity to see realtime DB data END*/

        // providing data to offer for html form
        $breed = DataLayers::getFilterBreeds();
        $this->_f3->set('breed', $breed);
        //set personality below
        $personality = DataLayers::getFilterPersonality();
        $this->_f3->set('personality', $personality);
        //set age group below - NTR: I edit this to offer integers since the Pets table is INT when it would return strings
        $age = DataLayers::getAgeInYears();
        $this->_f3->set('age', $age);

        $view = new Template();
        echo $view->render('views/admin.html');
    }
}