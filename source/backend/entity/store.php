<?php

class Store implements Entity
{
	private $id;
	private string $name;
	private ?string $description;
	private ?string $logo;
	private ?string $siteLink;
	private string $email;
	private ?string $contact;
	private Address $location;
	private ?StoreCollection $collection;
	private int $productCount;
	private int $followerCount;
	private string $isVerified;
	private readonly DateTime $createdAt;

	public function __construct(array $data = [])
	{
		$this->id = $data['id'] ?? null;
		$this->name = $data['name'] ?? '';
		$this->description = $data['description'] ?? null;
		$this->logo = $data['logo'] ?? null;
		$this->siteLink = $data['siteLink'] ?? null;
		$this->email = $data['email'] ?? '';
		$this->contact = $data['contact'] ?? null;
		$this->location = $data['location'] ?? new Address();
		$this->collection = $data['collection'] ?? null;
		$this->productCount = $data['productCount'] ?? 0;
		$this->followerCount = $data['followerCount'] ?? 0;
		$this->isVerified = $data['isVerified'] ?? '0';
		$this->createdAt = isset($data['createdAt'])
			? ($data['createdAt'] instanceof DateTime ? $data['createdAt'] : new DateTime($data['createdAt']))
			: new DateTime();
	}

	// Getters
	public function getId()
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getLogo(): ?string
	{
		return $this->logo;
	}

	public function getSiteLink(): ?string
	{
		return $this->siteLink;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getContact(): string
	{
		return $this->contact;
	}

	public function getAddress(): Address
	{
		return $this->location;
	}

	public function getCollection(): StoreCollection
	{
		return $this->collection;
	}

	public function getProductCount(): int
	{
		return $this->productCount;
	}

	public function getFollowerCount(): int
	{
		return $this->followerCount;
	}

	public function getIsVerified(): string
	{
		return $this->isVerified;
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

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	public function setLogo(?string $logo): void
	{
		$this->logo = $logo;
	}

	public function setSiteLink(?string $siteLink): void
	{
		$this->siteLink = $siteLink;
	}

	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	public function setContact(string $contact): void
	{
		$this->contact = $contact;
	}

	public function setLocation(Address $location): void
	{
		$this->location = $location;
	}

	public function setCollection(StoreCollection $collection): void
	{
		$this->collection = $collection;
	}

	public function setProductCount(int $productCount): void
	{
		$this->productCount = $productCount;
	}

	public function setFollowerCount(int $followerCount): void
	{
		$this->followerCount = $followerCount;
	}

	public function setIsVerified(string $isVerified): void
	{
		$this->isVerified = $isVerified;
	}

	public function jsonSerialize(): array
	{
		return get_object_vars($this);
	}
}
