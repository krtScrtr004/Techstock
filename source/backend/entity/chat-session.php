<?php

class ChatSession
{
    private $id;
    private array $participants; 
    private DateTime $createdAt;
    private array $messages;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->participants = $data['participants'];
        $this->createdAt = $data['created_at'] ?? new DateTime();
        $this->messages = $data['messages'];
    }

    // Getters 

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getParticipants(): array
    {
        return $this->participants;
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

    public function setReceiver(array $participants): void
    {
        $this->participants = $participants;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt;
    }

    // Utilities

    public function addParticipant(User|Store $participant): bool 
    {
        $this->participants[$participant->getId()] = $participant;
        return true;
    }

    public function deleteParticipant($id): bool {
        unset($this->participants[$id]);
        return true;
    }

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
