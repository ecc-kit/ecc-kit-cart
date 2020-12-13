<?php

namespace EccKit\Cart;

use EccKit\Money\Money;
use EccKit\Product\Product;

/**
 * Interface Item.
 */
class Item
{
    /** @var Product */
    protected Product $product;
    /** @var Quantity */
    protected Quantity $quantity;
    
    /**
     * Item constructor.
     *
     * @param Product  $product  Product
     * @param Quantity $quantity Quantity
     */
    public function __construct(Product $product, Quantity $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
    
    /**
     * Product.
     *
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
    
    /**
     * Quantity.
     *
     * @return Quantity
     */
    public function getQuantity(): Quantity
    {
        return $this->quantity;
    }
    
    /**
     * Price.
     *
     * @return Money
     */
    public function getPrice(): Money
    {
        return new Money(
            //@todo: money calculator?
            $this->getProduct()->getPrice()->getValue() * $this->getQuantity()->getValue(),
            $this->getProduct()->getPrice()->getCurrency()
        );
    }
}
