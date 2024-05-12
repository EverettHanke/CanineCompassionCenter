<?php
require_once ("pets.php");
class Dogs extends Pets
{
    public function __construct($_name="Name Error", $_age="Age Error",$_breed="Breed Error",$_gender="Gender Error"
        ,$_personality="Array Personality Error", $_price=0)
    {
        parent::__construct($_name, $_age, $_breed, $_gender, $_personality, $_price);
    }

}