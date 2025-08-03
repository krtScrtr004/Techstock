<?php

class ChatSessionModel implements Model 
{
	public static function all(): array
	{
        global $me;
		// TODO: Dumps

        $chatSessions = [];
        $stores = StoreModel::all();

        for ($i = 0; $i < 5; $i++) {
            $randomStore = $stores[rand(0, count($stores))];

            $messages = [];
            for ($j = 0; $j < 20; $j++) {
                array_push($messages, new ChatMessage([
                    'id' => uniqid(),
                    'sender' => ($j % 2 === 0) ? $me : $randomStore,
                    'type' => ChatContentType::Text,
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non odio eius explicabo? Eum est explicabo exercitationem quibusdam eius deleniti optio iusto facere sint nobis, saepe voluptate error voluptas ea blanditiis.',
                ]));
            }
            array_push($messages, new ChatMessage([
                    'id' => uniqid(),
                    'sender' => $me,
                    'type' => ChatContentType::Image,
                    'content' => IMAGE_PATH . 'controller-1.jpg'
            ]));

            array_push($chatSessions, new ChatSession([
                'id' => uniqid(),
                'other_party' => $randomStore,
                'messages' => $messages
            ]));
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
