<?php
/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: dataCommands.php
 * PURPOSE: This script connects to the database and retrieves data from the `Pets` table.
 * It then displays the name, age, breed, gender, personality, price, and image of each pet.
 */
ini_set('display_errors',1);
error_reporting(E_ALL);
$path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
require_once $path;
try
    {
        $dbh = new PDO(DB_DSN, DB_USERNAME,DB_PASSWORD);
        $sql = "SELECT * FROM `Pets`";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = mysqli_query(DB_DSN, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<h1>" . $row['Name'] . $row['Age'] . $row['Breed'] .
                $row['Gender'] .  $row['Personality'] .  $row['Price'] .  $row['Image'] . " </h1>";
        }
    }
catch (PDOException $e)
    {
        die($e->getMessage());
    }