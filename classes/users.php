<?php

class CanineUsers
{
    private $_userName;
    private $_email;
    function __construct($userName = "N/A", $email = "N/A")
    {
        $this->_email = $email;
        $this->_userName = $userName;
    }
    function getEmail()
    {
        return $this->_email;
    }

    function getUserName()
    {
        return $this->_userName;
    }
}