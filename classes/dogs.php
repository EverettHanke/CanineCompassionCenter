<?php
/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: dogs.php
 * PURPOSE: This file defines the Dogs class, which extends the Pets class.
 * The Dogs class inherits all properties and methods from the Pets class.
 */
require_once ("pets.php");
/**
 * Class Dogs
 * This class represents a dog and extends the Pets class, inheriting its properties and methods.
 */
class Dogs extends Pets
{
    /**
     * Dogs constructor.
     *
     * @param int|null $id The ID of the dog.
     * @param string $_name The name of the dog.
     * @param string $_age The age of the dog.
     * @param string $_breed The breed of the dog.
     * @param string $_gender The gender of the dog.
     * @param string $_personality The personality traits of the dog.
     * @param float $_price The price of the dog.
     * @param string|null $_image The image URL of the dog.
     */
    public function __construct($id=NULL,$_name="Name Error", $_age="Age Error",$_breed="Breed Error",$_gender="Gender Error"
        ,$_personality="Array Personality Error", $_price=0, $_image=NULL)
    {
        // Call the parent constructor from the Pets class
        parent::__construct($id,$_name, $_age, $_breed, $_gender, $_personality, $_price,$_image);
    }

}