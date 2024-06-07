<?php

class CanineUsers
{
    private $_userName;
    private $_email;

    /**
     * Constructor for User Class
     * @param $userName String name of User
     * @param $email String email of user
     */
    function __construct($userName = "N/A", $email = "N/A")
    {
        $this->_email = $email;
        $this->_userName = $userName;
    }

    /**
     * Getter for email
     * @return String email of user
     */
    function getEmail()
    {
        return $this->_email;
    }

    /**
     * Getter for userName
     * @return String userName of user
     */
    function getUserName()
    {
        return $this->_userName;
    }
}