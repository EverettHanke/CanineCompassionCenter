<?php

class Admins extends CanineUsers
{
    private int $_admin;

    /**
     * Constructor for Admin Class
     * @param $userName String Name of Admin
     * @param $email String Email of Admin
     * @param $admin int Admin Status
     */
    function __construct($userName = "N/A", $email = "N/A", $admin = "0")
    {
        parent::__construct($userName, $email);
        $this->_admin = $admin;
    }

    /**
     * Getter for Admin Status
     * @return int Admin Status
     */
    function getAdmin()
    {
        return $this->_admin;
    }
}
