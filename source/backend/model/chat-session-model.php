<?php
include_once ENUM_PATH . 'chat-content-type.php';

class ChatSessionModel implements Model
{
	public static function all(): array
	{
		global $me;
		// TODO: Dumps

		$chatSessions = [];
		$stores = StoreModel::all();

		for ($i = 0; $i < 5; $i++) {
			$randomStore = $stores[array_rand($stores)];

			$messages = [];
			for ($j = 0; $j < 20; $j++) {
				array_unshift($messages, new ChatMessage([
					'id' => uniqid(),
					'sender' => ($j % 2 === 0) ? $me : $randomStore,
					'type' => ChatContentType::Text,
					'content' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non odio eius explicabo? Eum est explicabo exercitationem quibusdam eius deleniti optio iusto facere sint nobis, saepe voluptate error voluptas ea blanditiis. $j",
				]));
			}
			array_unshift($messages, new ChatMessage([
				'id' => uniqid(),
				'sender' => $me,
				'type' => ChatContentType::Image,
				'content' => IMAGE_PATH . 'controller-1.jpg'
			]));
			array_unshift($messages, new ChatMessage([
				'id' => uniqid(),
				'sender' => $me,
				'type' => ChatContentType::Video,
				'content' => VIDEO_PATH . 'sample.mp4'
			]));

			$csession = new ChatSession([
				'id' => $i,
				'otherParty' => $randomStore,
				'messages' => $messages
			]);
			$chatSessions[$csession->getId()] = $csession;
		}
		return $chatSessions;
	}

	public static function create(array $data): mixed
	{
		// TODO: Implement method logic
		return null;
	}

	public function delete(): bool
	{
		// TODO: Implement method logic
		return false;
	}

	public function fill(array $data): void
	{
		// TODO: Implement method logic
	}

	public static function find($id): mixed
	{
		// TODO: Implement method logic
		return null;
	}

	public function save(): bool
	{
		// TODO: Implement method logic
		return false;
	}
}
