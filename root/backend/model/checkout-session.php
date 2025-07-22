<?php

class CheckoutSession implements Model 
{
    private $id;
    private string $paymentLink;
    private DateTime $createdAt;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->paymentLink = $data['payment_link'];
        $this->createdAt = $data['created_at'] ?? new DateTime();
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getPaymentLink(): string
    {
        return $this->paymentLink;
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

	public function setPaymentLink(string $paymentLink): void
	{
		$this->paymentLink = $paymentLink;
	}

	public function setCreatedAt(DateTime $createdAt): void
	{
		$this->createdAt = $createdAt;
	}

	// Implemented methods

	public static function all(): array
	{
		// TODO: Implement all() method.
		return [];
	}

	public static function find($id): ?Model
	{
		// TODO: Implement find() method.
		return null;
	}

	public static function create(array $data): Model
	{
		// TODO: Implement create() method.
		return new self([]);
	}

	public function save(): bool
	{
		// TODO: Implement save() method.
		return true;
	}

	public function delete(): bool
	{
		// TODO: Implement delete() method.
		return true;
	}

	public function fill(array $data): void
	{
		// TODO: Implement fill() method.
	}
}