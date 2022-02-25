<?php
namespace App;
class Product{
    public $id;
    public $price;


    function __construct(int $id, int $price)
    {
        $this->id=$id;
        $this->price=$price;
    }
}
?>