<?php

class ChatMessage implements Entity
{
    private $id;
    private User|Store $sender;
    private ChatContentType $type;
    private string $content;
    private bool $amISender; // README: Used only for frontend
    private bool $isRead;
    private bool $isReacted;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(array $data)
    {
        global $me; 

        $this->id = $data['id'];
        $this->sender = $data['sender'];
        $this->type = $data['type'];
        $this->content = $data['content'];
        $this->isRead = $data['isRead'] ?? false;
        $this->isReacted = $data['isReacted'] ?? false;
        $this->createdAt = $data['createdAt'] ?? new DateTime();
        $this->updatedAt = $data['updatedAt'] ?? new DateTime();
        
        $this->amISender = $me->getId() === $this->getSender()->getId();
    }

    // Getters

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getSender(): User|Store
    {
        return $this->sender;
    }

    public function getType(): ChatContentType
    {
        return $this->type;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getIsRead(): bool
    {
        return $this->isRead;
    }

    public function getIsReacted(): bool
    {
        return $this->isReacted;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    // Setters

    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    public function setSender(User|Store $sender): void
    {
        $this->sender = $sender;
    }

    public function setType(ChatContentType $type): void
    {
        $this->type = $type;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setIsRead(bool $isRead): void
    {
        $this->isRead = $isRead;
    }

    public function setIsReacted(bool $isReacted): void
    {
        $this->isReacted = $isReacted;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
