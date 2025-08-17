<?php

class CheckoutSession implements Entity, JsonSerializable
{
	private $id;
	private string $paymentLink;
	private DateTime $createdAt;

	public function __construct(array $data)
	{
		$this->id = $data['id'] ?? null;
		$this->paymentLink = $data['paymentLink'] ?? '';
		$this->createdAt = isset($data['createdAt'])
			? ($data['createdAt'] instanceof DateTime ? $data['createdAt'] : new DateTime($data['createdAt']))
			: new DateTime();
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
		return [
			'id' => $this->id,
			'paymentLink' => $this->paymentLink,
			'createdAt' => $this->createdAt->format(DateTime::ATOM),
		];
	}
}
