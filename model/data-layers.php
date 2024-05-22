<?php

class DataLayers
{
    static function getFilterBreeds()
    {
        return array('beagle', 'boxer', 'bulldog', 'dachshund','german Shepherd',
            'golden Retriever', 'labrador Retriever', 'poodle', 'shih Tzu', 'siberian Husky');
    }

    static function getFilterPersonality()
    {
        return array('Couch Potato', 'Cuddle Bug', 'Elderly Companion', 'Gentle Giant', 'Guardian', 'Independent Explorer',
            'Playful Pup', 'Social Butterfly', 'Smarty Pants', 'Special Needs Superstar');
    }
    static function getFilterAge()
    {
        return array('8 weeks - 6 months', '7 months - 1 year', '1 - 3 years', '4 - 7 years', ' 8 years+');
    }
}
