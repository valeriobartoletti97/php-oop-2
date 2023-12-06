<?php

class Product
{
    protected $image;
    protected $overview;
    protected $title;

    protected $price;

    public function __construct($image, $overview, $title, $price){
        $this->image = $image;
        $this->overview = $overview;
        $this->title = $title;
        $this->price = $price;
    }

    public function getPrice(){
        $rndPrice = rand(10,50). '€';
        return $rndPrice;
    }
}

?>