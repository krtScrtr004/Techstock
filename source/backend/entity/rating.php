<?php

class Rating implements Entity
{
    private $id;
    private User $rater;
    private int $rating;
    private ?string $comment;
    private ?array $images;
    private int $like;
    private DateTime $createdAt;
    private ?RatingReply $reply;
    private bool $isLike;

    public function __construct(array $data = [])
    {
        $this->id        = $data['id'] ?? null;
        $this->rater     = $data['rater'] ?? null;
        $this->rating    = $data['rating'] ?? 0;
        $this->comment   = $data['comment'] ?? null;
        $this->images    = $data['images'] ?? null;
        $this->like      = $data['like'] ?? 0;
        $this->createdAt = $data['createdAt'] ?? new DateTime();
        $this->reply     = $data['reply'] ?? null;
        $this->isLike    = $data['isLike'] ?? false;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getRater(): User
    {
        return $this->rater;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function getLike(): int
    {
        return $this->like;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getReply(): ?RatingReply
    {
        return $this->reply;
    }

    public function getIsLike(): bool
    {
        return $this->isLike;
    }

    // Setters
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setRater($rater): void
    {
        $this->rater = $rater;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    public function setLike(int $like): void
    {
        $this->like = $like;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setReply(?RatingReply $reply): void
    {
        $this->reply = $reply;
    }

    public function setIsLike(bool $isLike): void
    {
        $this->isLike = $isLike;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
