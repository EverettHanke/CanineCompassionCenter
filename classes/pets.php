<?php

/**
 * Class Pets
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: pets.php
 * PURPOSE: This class represents a pet with various attributes such as id, name, age, gender, breed, personality, price, and image.
 */
class Pets
{
    private $_id;
    private $_name;
    private $_age;
    private $_gender;
    private $_breed;
    private $_personality;
    private $_price;
    private $_image;

    /**
     * Pets constructor.
     *
     * @param int|null $id The ID of the pet.
     * @param string $_name The name of the pet.
     * @param string $_age The age of the pet.
     * @param string $_breed The breed of the pet.
     * @param string $_gender The gender of the pet.
     * @param string $_personality The personality traits of the pet.
     * @param float $_price The price of the pet.
     * @param string|null $_image The image URL of the pet.
     */
    public function __construct($id=NULL,$_name="Name Error", $_age="Age Error",$_breed="Breed Error",$_gender="Gender Error"
        ,$_personality="Array Personality Error", $_price=0, $_image=NULL)
    {
        $this->_id = $id;
        $this->_name = $_name;
        $this->_age = $_age;
        $this->_breed = $_breed;
        $this->_gender = $_gender;
        $this->_personality = $_personality;
        $this->_price = $_price;
        $this->_image = $_image;
    }

    /**
     * Get the ID of the pet.
     *
     * @return int|null The ID of the pet.
     */
    function getId()
    {
        return $this->_id;
    }

    /**
     * Get the name of the pet.
     *
     * @return string The name of the pet.
     */
    function getName()
    {
        return $this->_name;
    }

    /**
     * Get the age of the pet.
     *
     * @return string The age of the pet.
     */
    function getAge()
    {
        return $this->_age;
    }

    /**
     * Get the gender of the pet.
     *
     * @return string The gender of the pet.
     */
    function getGender()
    {
        return $this->_gender;
    }

    /**
     * Get the breed of the pet.
     *
     * @return string The breed of the pet.
     */
    function getBreed()
    {
        return $this->_breed;
    }

    /**
     * Get the personality traits of the pet.
     *
     * @return string The personality traits of the pet.
     */
    function getPersonality()
    {
        return $this->_personality;
    }

    /**
     * Get the price of the pet.
     *
     * @return float The price of the pet.
     */
    function getPrice()
    {
        return $this->_price;
    }

    /**
     * Get the image URL of the pet.
     *
     * @return string|null The image URL of the pet.
     */
    function getImage()
    {
        return $this->_image;
    }
}
