<?php

class Pets
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
        return $this->_name;
    }
    function getAge()
    {
        return $this->_age;
    }
    function getGender()
    {
        return $this->_gender;
    }

    function getBreed()
    {
        return $this->_breed;
    }
    function getPersonality()
    {
        return $this->_personality;
    }
}
