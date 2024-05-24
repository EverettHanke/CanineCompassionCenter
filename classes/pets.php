<?php

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

    function getId()
    {
        return $this->_id;
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
    function getPrice()
    {
        return $this->_price;
    }

    function getImage()
    {
        return $this->_image;
    }
}
