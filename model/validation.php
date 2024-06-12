<?php
/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: validation.php
 * PURPOSE: This file contains validation functions for user input, including phone number, email, username, and password.
 */

/**
 * Validate a phone number.
 *
 * @param string $phone The phone number to validate.
 * @return bool Returns true if the phone number is valid, false otherwise.
 */
class Validators
{
    function validatePhone($phone)
    {
        return preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $phone);
    }

    /**
     * Validate an email address.
     *
     * @param string $email The email address to validate.
     * @return bool Returns true if the email address is valid, false otherwise.
     */
    function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Validate a username.
     *
     * @param string $name The username to validate.
     * @return bool Returns true if the username contains only alphabetic characters, false otherwise.
     */
    function validateUserName($name)
    {
        return ctype_alpha($name);
    }

    /**
     * Validate that two passwords match.
     *
     * @param string $password1 The first password.
     * @param string $password2 The second password.
     * @return bool Returns true if the passwords match, false otherwise.
     */
    function validatePassword($password1, $password2)
    {
        return $password1 == $password2;
    }

    /**
     * validateLogin
     * @param $userName String userName
     * @param $email String userEmail
     * @param $password String userPassword
     * @return bool|void on whether our login was valid
     */
    function validateLogin($userName, $email, $password)
    {

        // DB connection
        $path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
        require_once $path;
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "<h1>CONNECTED</h1>";
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        $sql = "SELECT * FROM CanineUsers WHERE UserName = :userName AND Email = :email";
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':userName', $userName);
        $statement->bindParam(':email', $email);

        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['Password'])) {
            if($result['Admin'] == 1)
            {
                $profile = 1;
            }
            else
            {
                $profile = 0;

            }
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * retrieveUserStatus method
     * @param $userName String UserName
     * @param $email String UserEmail
     * @param $password String UserPassword
     * @return int admin Status
     */
    function retrieveUserStatus($userName, $email, $password)
    {
        // DB connection
        $path = $_SERVER['DOCUMENT_ROOT'] . '/../config.php';
        require_once $path;
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "<h1>CONNECTED</h1>";
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        $sql = "SELECT * FROM CanineUsers WHERE UserName = :userName AND Email = :email";
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':userName', $userName);
        $statement->bindParam(':email', $email);

        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['Password'])) {
            if ($result['Admin'] == 1) {
                $profile = 1;
            } else {
                $profile = 0;

            }
            return $profile;
        }
        return null;
    }

    /**
     * validateDogName method
     * @param $name String name of dog
     * @return bool if our dogs name is valid
     */
    function validateDogName($name)
    {
        return ctype_alpha($name);
    }

    /**
     * validateDogPrice method
     * @param $price int price of dog
     * @return bool if our dogs price is a valid int
     */
    function validateDogPrice($price)
    {
        return ctype_alnum($price);
    }

    /**
     * getDBH method allows us to retrieve dbh
     * helps make our code dry
     * @return PDO dbh
     */
    function getDBH()
    {
        // DB connection
        $path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
        require_once $path;
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            return $dbh;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
