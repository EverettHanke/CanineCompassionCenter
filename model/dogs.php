<?php
require_once ("pets.php");
class Dogs extends Pets
{
    function getName()
    {
        return $this->getName();
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