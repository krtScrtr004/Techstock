<?php

class Order implements Model
{
    private $id;
    private User $buyer;
    private Store $store;
    private array $orders;
    private ?string $message;
    private string $status;
    private ?CheckoutSession $checkoutSession;
    private DateTime $expectedArrival;
    private DateTime $actualArrival;
    private DateTime $createdAt;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'];
        $this->buyer = $data['buyer'];
        $this->buyer = $data['store'];
        $this->orders = $data['orders'];
        $this->message = $data['message'] ?? null;
        $this->status = $data['status'] ?? 'pending';
        $this->checkoutSession = $data['checkout_session'] ?? null;
        $this->expectedArrival = $data['expected_arrival'] ?? new DateTime();
        $this->actualArrival = $data['actual_arrival'] ?? new DateTime();
        $this->createdAt = $data['created_at'] ?? new DateTime();
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

    public function getStore(): Store
    {
        return $this->store;
    }

    public function getOrderItem($orderItemId): OrderItem
    {
        return $this->orders[$orderItemId];
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCheckoutSession(): ?CheckoutSession
    {
        return $this->checkoutSession;
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

    public function setStore(Store $store): void
    {
        $this->store = $store;
    }

    public function setOrderItem(OrderItem $orderItem): void
    {
        $this->orders[$orderItem->getId()] = $orderItem;
    }

    public function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setCheckoutSession(CheckoutSession $checkoutSession): void
    {
        $this->checkoutSession = $checkoutSession;
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
