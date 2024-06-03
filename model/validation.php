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
    return $password1->equals($password2);
}