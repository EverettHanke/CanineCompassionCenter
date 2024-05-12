<?php
require_once ("pets.php");
class Dogs extends Pets
{
    private $_name;
    private $_age;
    private $_gender;
    private $_breed;
    private $_personality;
    private $_price;

    public function __construct($_name="Name Error", $_age="Age Error",$_breed="Breed Error",$_gender="Gender Error"
        ,$_personality="Array Personality Error", $_price=0)
    {
        $this->_name = $_name;
        $this->_age = $_age;
        $this->_breed = $_breed;
        $this->_gender = $_gender;
        $this->_personality = $_personality;
        $this->_price = $_price;
    }

    function getName()
    {
        return $this->_name();
    }

    function getAge()
    {
        return $this->getAge();
    }

    function getBreed()
    {
        return $this->getBreed();
    }
    function getGender()
    {
        return $this->getGender();
    }
    function getPersonality()
    {
        return $this->getPersonality();
    }
    function getPrice()
    {
        return $this->getPrice();
    }
}