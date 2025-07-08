<?php

class RatingReply
{
    private $id;
    private string $reply;
    private DateTime $createdAt;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'];
        $this->reply =  $data['reply'];
        $this->createdAt = $data['created_at'] ?? new DateTime();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getReply(): string
    {
        return $this->reply;
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

    public function setReply(string $reply): void
    {
        $this->reply = $reply;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {            
        $this->createdAt = $createdAt;
    }
}
