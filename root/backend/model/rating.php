<?php

class Rating implements Model 
{
    private $id;
    private int $rating;
    private ?string $comment;
    private int $like;
    private DateTime $createdAt;
    private ?RatingReply $reply;

    public function __construct(array $data = []) {
        $this->id = $data['id'];
        $this->rating = $data['rating'] ?? 0;
        $this->comment = $data['comment'] ?? null;
        $this->like = $data['like'] ?? 0;
        $this->createdAt = $data['created_at'] ?? new DateTime();
        $this->reply = $data['reply'] ?? null;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getRating(): int {
        return $this->rating;
    }

    public function getComment(): ?string {
        return $this->comment;
    }

    public function getLike(): int {
        return $this->like;
    }

    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }

    public function getReply(): ?RatingReply {
        return $this->reply;
    }

    // Setters
    public function setId($id): void {
        $this->id = $id;
    }

    public function setRating(int $rating): void {
        $this->rating = $rating;
    }

    public function setComment(?string $comment): void {
        $this->comment = $comment;
    }

    public function setLike(int $like): void {
        $this->like = $like;
    }

    public function setCreatedAt(DateTime $createdAt): void {
        $this->createdAt = $createdAt;
    }

    public function setReply(?RatingReply $reply): void {
        $this->reply = $reply;
    }

    // Implemented methods
	public static function all(): array
	{
		// TODO: Implement all() method.
		return [];
	}

	public static function create(array $data): Model
	{
		// TODO: Implement create() method.
		return new self();
	}

	public function delete(): bool
	{
		// TODO: Implement delete() method.
		return true;
	}

	public function fill(array $data): void
	{
		// TODO: Implement fill() method.
	}

	public static function find($id): ?Model
	{
		// TODO: Implement find() method.
		return null;
	}

	public function save(): bool
	{
		// TODO: Implement save() method.
		return true;
	}
}

