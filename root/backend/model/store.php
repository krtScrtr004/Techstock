<?php

class Store implements Model
{
	private $id;
	private string $name;
	private string $description;
	private ?string $logo;
	private ?string $site_link;
	private string $email;
	private string $contact;
	private Address $location;
	private string $is_verified;
	private readonly DateTime $created_at;

	public function __construct(array $data = [])
	{
		$this->id = $data['id'] ?? null;
		$this->name = $data['name'] ?? '';
		$this->description = $data['description'] ?? '';
		$this->logo = $data['logo'] ?? null;
		$this->site_link = $data['site_link'] ?? null;
		$this->email = $data['email'] ?? '';
		$this->contact = $data['contact'] ?? '';
		$this->location = $data['location'] ?? new Address();
		$this->is_verified = $data['is_verified'] ?? '0';
		$this->created_at = isset($data['created_at'])
			? (is_a($data['created_at'], DateTime::class) ? $data['created_at'] : new DateTime($data['created_at']))
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
		return $this->site_link;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getContact(): string
	{
		return $this->contact;
	}

	public function getLocation(): Address
	{
		return $this->location;
	}

	public function getIsVerified(): string
	{
		return $this->is_verified;
	}

	public function getCreatedAt(): DateTime
	{
		return $this->created_at;
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

	public function setSiteLink(?string $site_link): void
	{
		$this->site_link = $site_link;
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

	public function setIsVerified(string $is_verified): void
	{
		$this->is_verified = $is_verified;
	}

	public static function all(): array
	{
		// TODO: Implement method logic
		return [];
	}

	public static function create(array $data): Model
	{
		// TODO: Implement method logic
		return new self();
	}

	public static function find($id): ?Model
	{
		// TODO: Implement method logic
		return null;
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
