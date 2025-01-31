<?php

namespace App\Entity;

class Lego {
    private $id;
    private $name;
    private $collection;
    private $description;
    private $price;
    private $pieces;    
    private $boxImage;
    private $legoImage;

    public function __construct($id, $name, $collection)
    {
        $this->id = $id;
        $this->name = $name;
        $this->collection = $collection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($prix)
    {
        $this->price = $prix;
    }

    public function getPieces()
    {
        return $this->pieces;
    }

    public function setPieces($pieces)
    {
        $this->pieces = $pieces;
    }

    public function getboxImage()
    {
        return $this->legoImage;
    }

    public function setboxImage($image)
    {
        $this->legoImage = $image;
    }

    public function getlegoImage()
    {
        return $this->boxImage;
    }

    public function setlegoImage($bg_image)
    {
        $this->boxImage = $bg_image;
    }


}

?>