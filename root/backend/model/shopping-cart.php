<?php

class ShoppingCart implements IteratorAggregate
{
    private array $cart;

    public function __construct() {}

    // Getters

    public function get($productId, $storeId = null): ?Product
    {
        if ($storeId) {
            return $this->cart[$storeId][$productId];
        } else {
            foreach ($this->cart as $store => $products) {
                foreach ($products as $id => $product) {
                    if ($productId === $id) return $product;
                }
            }
        }
        return null;
    }

    public function getAll(): array
    {
        $flattened = [];
        foreach ($this->cart as $store) {
            foreach ($store as $item) {
                array_push($flattened, $item);
            }
        }
        return $flattened;
    }

    // Utilities

    public function add(ShoppingCartItem $item): bool
    {
        $storeId    =   $item->getStore()->getId();
        $productId  =   $item->getId();

        if (!isset($this->cart[$storeId]) || !is_array($this->cart[$storeId])) {
            $this->cart[$storeId] = [];
        }
        $this->cart[$storeId][$productId] = $item; // TODO: Cast the id to string in key

        return true;
    }

    public function delete($productId, $storeId = null): bool
    {
        if (isset($storeId)) {
            $item = $this->cart[$storeId][$productId];
            if (isset($item)) {
                $item->delete();
                unset($this->cart[$storeId][$productId]);
            }
        } else {
            foreach ($this->cart as $sid => $list) {
                foreach ($list as $pid => $item) {
                    if ($productId === $pid) {
                        $item->delete();
                        unset($this->cart[$sid][$pid]);
                    }
                }
            }
        }

        return true;
    }

    public function deleteMultiple(): bool
    {
        $ids = [];
        foreach ($this->cart as $store) {
            foreach ($store as $item) {
                array_push($ids, $item->getId());
            }
        }
        $this->cart = [];

        return ShoppingCartItem::deleteMultiple($ids);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->cart);
    }
}
