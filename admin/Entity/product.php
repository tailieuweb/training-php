<?php

namespace SmartWeb\Models;

class EProduct
{
    private $id;
    private $name;
    private $id_category;
    private $id_manufacture;
    public function __construct($id, $name, $id_category, $id_manufacture)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->id_category = $id_category;
        $this->id_manufacture = $id_manufacture;
    }
    public function getID()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getID_Category()
    {
        return $this->id_category;
    }
    public function getID_Manufacture()
    {
        return $this->id_manufacture;
    }

    public function setID($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setID_Category($id_category)
    {
        $this->id_category = $id_category;
    }
    public function setID_Manufacture($id_manufacture)
    {
        $this->id_manufacture = $id_manufacture;
    }
}

class EPhone
{
    private  $id;
    private $id_product;
    private $image;
    private $price;
    private $quantity;
    private $description;

    public function __construct($id, $id_product, $image, $price, $quantity, $description)
    {
        $this->$id   = $id;
        $this->$id_product = $id_product;
        $this->image = $image;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
    }

    public function getID()
    {
        return $this->id;
    }
    public function getID_Product()
    {
        return $this->id_product;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setID($id)
    {
        $this->id = $id;
    }
    public function setID_Product($id_product)
    {
        $this->id_product = $id_product;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
