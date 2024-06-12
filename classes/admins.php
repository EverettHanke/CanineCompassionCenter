<?php
/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: admins.php
 * PURPOSE: This file defines the Admins class, which extends the CanineUsers class.
 * The Admins class inherits all properties and methods from the CanineUsers class.
 */
/**
 * Class Admins
 * This class represents an Admin user and extends the CanineUsers class, inheriting its properties and methods.
 */

require_once ("users.php");

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
