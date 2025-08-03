<?php

class User
{
    private $id;
    private string $firstName;
    private string $lastName;
    private ?string $profileImage;
    private string $email;
    private ?string $contact;
    private ?Address $address;
    private string $isVerified;
    private DateTime $createdAt;

    public function __construct(array $data = []) 
    {
        $this->id = $data['id'];
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->profileImage = $data['profile_image_link'] ?? ICON_PATH . 'user-profile_b.svg';
        $this->email = $data['email'];
        $this->contact = $data['contact'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->isVerified = $data['is_verified'] ?? 'pending';
        $this->createdAt = $data['created_at'] ?? new DateTime();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getProfileImage(): ?string
    {
        return $this->profileImage;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function isVerified(): string
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

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setProfileImage(?string $profileImage): void
    {
        $this->profileImage = $profileImage;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setContact(?string $contact): void
    {
        $this->contact = $contact;
    }

    public function setAddress(?Address $address): void
    {
        $this->address = $address;
    }

    public function setIsVerified(string $isVerified): void
    {
        $this->isVerified = $isVerified;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }


}