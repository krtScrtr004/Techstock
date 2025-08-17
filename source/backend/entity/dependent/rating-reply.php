<?php

class RatingReply implements Entity, JsonSerializable
{
    private $id;
    private string $reply;
    private DateTime $createdAt;

    public function __construct(array $data = [])
    {
        $this->id        = $data['id']        ?? null;
        $this->reply     = $data['reply']     ?? '';
        $this->createdAt = $data['createdAt'] ?? new DateTime();
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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'reply' => $this->reply,
            'createdAt' => $this->createdAt->format(DateTime::ATOM),
        ];
    }
}
