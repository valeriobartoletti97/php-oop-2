<?php

class Product
{
    protected $image;
    protected $overview;
    protected $title;

    protected $discount = 0;
    protected $price;

    public function __construct($image, $overview, $title, $price){
        $this->image = $image;
        $this->overview = $overview;
        $this->title = $title;
        $this->price = $price;
    }

    public function getPrice(){
        $rndPrice = rand(10,50);
        return $rndPrice;
    }

    public function setDiscount($perc){
        if($perc > 5 && $perc < 95){
            $this->discount = $perc;
        } else {
            throw new Exception('This product is not in sale');
        }
    }

    public function getDiscount(){
        return $this->discount;
    }
}

?>