<?php

class ProductCategory 
{
    private SplDoublyLinkedList $container;

    public function __construct(array $array)
    {
        $this->container = new SplDoublyLinkedList();
        $this->fromArray($array);
    }
    
    public function fromArray(array $array): void 
    {
        foreach ($array as $category) {
            $this->container->push($category);
        }
    }

    public function next(): void
    {
        $this->container->next();
    }

    public function hasNext(): bool
    {
        $this->next();
        $hasNextNode = $this->container->valid();
        $this->previous();

        return $hasNextNode;
    }

    public function previous(): void
    {
        $this->container->prev();
    }

    public function hasPrevious(): bool
    {
        $this->previous();
        $hasNextNode = $this->container->valid();
        $this->next();

        return $hasNextNode;
    }

    public function first(): void
    {
        $this->container->rewind();
    }

    public function current(): mixed
    {
        return $this->container->current();
    }
}