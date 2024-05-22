<?php

function validatePhone($phone)
{
    return preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $phone);
}
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validateUserName($name)
{
    return ctype_alpha($name);
}
function validatePassword($password1, $password2)
{
    return $password1->equals($password2);
}