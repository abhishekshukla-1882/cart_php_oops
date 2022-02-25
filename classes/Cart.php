<?php
namespace App;

class Cart{
    public array $cart = array();
/** 
 * define cunstructur
 */
    function __construct(){

    }
    public function addcart(Product $product){
        if($this->isProduct($product)){
            $product->qnty =1;
            array_push($this->cart, $product);

        }
    }
    public function isProduct(Product $product){
        foreach ($this->cart as $key => $val) {

            if ($val->id == $product->id) {

                // $product->id=$product->id+1;
                $this->cart[$key]->qnty += 1;
                return false;
            }
        }
        return true;
    }
    public function deleteFromCart($id)
    {
        foreach ($this->cart as $key => $val) {

            if ($val->id == $id) {

                // $product->id=$product->id+1;
                array_splice($this->cart, $key, 1);
                return;
            }
        }
    }
    public function setCart($carrt)
    {

        $this->cart = json_decode($carrt);
    }
    public function getCart()
    {
        return $this->cart;
        # code...
    }
}
        
    

?>