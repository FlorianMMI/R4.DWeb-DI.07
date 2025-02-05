<?php

// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;

use App\Entity\Lego;
use \PDO;

class LegoService
{
    private PDO $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=tp-symfony-mysql;dbname=lego_store';
        $username = 'root';
        $password = 'root';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        $this->pdo = new PDO($dsn, $username, $password, $options);
    }
    
    public function getLegos(): array
    {
        $query = 'SELECT * FROM lego ';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $legos = [];

        foreach ($results as $row) {
            $lego = new Lego($row['id'], $row['name'], $row['collection']);
            $lego->setDescription($row['description']);
            $lego->setPrice($row['price']);
            $lego->setPieces($row['pieces']);
            $lego->setboxImage($row['imagebox']);
            $lego->setlegoImage($row['imagebg']);
            $legos[] = $lego;
        }
        
        

        return $legos;
        

    }

    public function getLegosCat($cat) : array
    {
        $query = 'SELECT * FROM lego WHERE collection = :cat';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['cat' => $cat]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $legos = [];

        foreach ($results as $row) {
            $lego = new Lego($row['id'], $row['name'], $row['collection']);
            $lego->setDescription($row['description']);
            $lego->setPrice($row['price']);
            $lego->setPieces($row['pieces']);
            $lego->setboxImage($row['imagebox']);
            $lego->setlegoImage($row['imagebg']);
            $legos[] = $lego;
        }
        
        

        return $legos;
    }
}