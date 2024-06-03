<?php
/**
 * Class DataLayers
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: data-layers.php
 * PURPOSE: This class provides static methods to retrieve data layers for filters used in the application.
 * It includes methods to get filter options for breeds, personality traits, and age groups.
 */
class DataLayers
{
    /**
     * Get a list of dog breeds for filtering.
     *
     * @return array An array of dog breeds.
     */
    static function getFilterBreeds()
    {
        return array('beagle', 'boxer', 'bulldog', 'dachshund','german Shepherd',
            'golden Retriever', 'labrador Retriever', 'poodle', 'shih Tzu', 'siberian Husky');
    }

    /**
     * Get a list of personality traits for filtering.
     *
     * @return array An array of personality traits.
     */
    static function getFilterPersonality()
    {
        return array('Couch Potato', 'Cuddle Bug', 'Elderly Companion', 'Gentle Giant', 'Guardian', 'Independent Explorer',
            'Playful Pup', 'Social Butterfly', 'Smarty Pants', 'Special Needs Superstar');
    }

    /**
     * Get a list of age groups for filtering.
     *
     * @return array An array of age groups.
     */
    static function getFilterAge()
    {
        return array('8 weeks - 6 months', '7 months - 1 year', '1 - 3 years', '4 - 7 years', ' 8 years+');
    }

    /**
     * Get a list of ages in years.
     * Used for admin.html form to insert a new dog in the database.
     *
     * @return array An array of ages in years.
     */
    static function getAgeInYears()
    {
        return array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
    }
}
