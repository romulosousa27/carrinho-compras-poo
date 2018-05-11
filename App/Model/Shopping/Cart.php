<?php

namespace App\Model\Shopping;


interface Cart {

    public function add(CartItem $item);
    public function update(CartItem $item);
    public function delete($id);
    public function hasItem($id);
    public function getTotal();
    public function getCartItems();
}