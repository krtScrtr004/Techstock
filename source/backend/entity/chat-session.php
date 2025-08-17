<?php

class ChatSession implements Entity
{
    private $id;
    private User|Store $otherParty; 
    private DateTime $createdAt;
    private array $messages = [];

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        if (isset($data['otherParty'])) {
            $this->otherParty = $data['otherParty'];
        }
        $this->createdAt = $data['createdAt'] ?? new DateTime();
        if (isset($data['messages'])) {
            foreach ($data['messages'] as $message) {
                $this->addMessage($message);
            }
        }
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
        $this->createdAt = $createdAt;
    }

    // Utilities

    public function addMessage(ChatMessage $message): bool
    {
        $this->messages[$message->getId()] = $message;
        return true;
    }

    public function deleteMessage($id): bool
    {
        unset($this->messages[$id]);
        return true;
    }

    public function jsonSerialize(): array 
    {
        return get_object_vars($this);
    }
}
