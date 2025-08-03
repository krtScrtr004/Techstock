<?php

class ChatSession
{
    private $id;
    private User|Store $otherParty; 
    private DateTime $createdAt;
    private array $messages;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->otherParty = $data['other_party'];
        $this->createdAt = $data['created_at'] ?? new DateTime();
        $this->messages = $data['messages'];
    }

    // Getters 

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getOtherParty(): User|Store
    {
        return $this->otherParty;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    // Setters 

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setOtherParty(User|Store $otherParty): void
    {
        $this->otherParty = $otherParty;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt;
    }

    // Utilities

    public function addMessage(ChatMessage $message): bool
    {
        // TODO: Sort insert
        $this->messages[$message->getId()] = $message;
        return true;
    }

    public function deleteMessage($id): bool
    {
        unset($this->messages[$id]);
        return true;
    }
}
