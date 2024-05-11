<?php

class Pets
{
    private $_name;
    private $_age;
    private $_gender;
    private $_breed;
    private $_personality;

    public function __construct($_name="Error", $_age="Error",$_breed="Error",$_gender="Error",$_personality="Error" )
    {
        $this->_name = $_name;
        $this->_age = $_age;
        $this->_breed = $_breed;
        $this->_gender = $_gender;
        $this->_personality = $_personality;
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
