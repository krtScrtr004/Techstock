<?php

class CheckoutSession implements Entity
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

	public function jsonSerialize(): array 
    {
        return get_object_vars($this);
    }
}
