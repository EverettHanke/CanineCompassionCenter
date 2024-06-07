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

    function validateLogin($userName, $email, $password)
    {
        // DB connection
        $path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
        require_once $path;
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        $sql = "SELECT * FROM CanineUsers WHERE UserName = :userName AND Email = :email AND Password = :password";
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':userName', $userName);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        var_dump($statement);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        return (!empty($result));
    }
}
