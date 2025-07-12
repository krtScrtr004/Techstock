<?php

class Order implements Model
{
    private $id;
    private User $buyer;
    private array $orders;
    private string $status;
    private DateTime $expectedArrival;
    private DateTime $actualArrival;
    private DateTime $createdAt;

    public function __construct(
        $id,
        User $buyer,
        array $orders,
        string $status = 'pending',
        DateTime $expectedArrival = new DateTime(),
        DateTime $actualArrival = new DateTime(),
        DateTime $createdAt = new DateTime()
    ) {
        $this->id = $id;
        $this->buyer = $buyer;
        $this->orders = $orders;
        $this->status = $status;
        $this->expectedArrival = $expectedArrival;
        $this->actualArrival = $actualArrival;
        $this->createdAt = $createdAt;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getBuyer(): User
    {
        return $this->buyer;
    }

    public function getOrderItem($orderItemId): Product
    {
        return $this->orders[$orderItemId];
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getExpectedArrival(): DateTime
    {
        return $this->expectedArrival;
    }

    public function getActualArrival(): DateTime
    {
        return $this->actualArrival;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    // Setters
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setBuyer(User $buyer): void
    {
        $this->buyer = $buyer;
    }

    public function setOrderItem(OrderItem $orderItem): void
    {
        $this->orders[$orderItem->getId()] = $orderItem;
    }

    public function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setExpectedArrival(DateTime $expectedArrival): void
    {
        $this->expectedArrival = $expectedArrival;
    }

    public function setActualArrival(DateTime $actualArrival): void
    {
        $this->actualArrival = $actualArrival;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    // Utilities
    public function addOrderItem(OrderItem $orderItem): bool
    {
        $this->setOrderItem($orderItem);
        return true;
    }

    public function deleteOrderItem($orderItemId): bool
    {
        if (array_key_exists($orderItemId, $this->orders)) {
            unset($this->orders[$orderItemId]);
        }
        return true;
    }


    // Implemented Methods
    public static function all(): array
    {
        // TODO: Implement method logic
        return [];
    }

    public static function find($id): ?Model
    {
        // TODO: Implement method logic
        return null;
    }

    public static function create(array $data): Model
    {
        // TODO: Implement method logic
        return new self();
    }

    public function save(): bool
    {
        // TODO: Implement method logic
        return true;
    }

    public function delete(): bool
    {
        // TODO: Implement method logic
        return true;
    }

    public function fill(array $data): void
    {
        // TODO: Implement method logic
    }
}
