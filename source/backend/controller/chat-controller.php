<?php

class ChatController implements Controller
{
    public static function index(): void {}

    public static function getMessages($params): void
    {
        // TODO
        global $me;

        header('Content-Type: application/json');

        if (!isset($params['id'])) {
            ob_clean();
            http_response_code(400);
            echo json_encode([
                'count' => 0,
                'error' => 'No chat session ID provided'
            ]);
            exit();
        }

        $thread = $_GET['thread'] ? strtolower($_GET['thread']) : 'new';
        if ($thread !== 'new' && $thread !== 'old') {
            ob_clean();
            http_response_code(400);
            echo json_encode([
                'count' => 0,
                'error' => "Thread can only be 'new' or 'old'"
            ]);
            exit();
        }

        $dateOffset = $_GET['date'] !== 'null' ? new DateTime($_GET['date']) : null;
        $limit = 5;
        $userChatOutSessions = ChatSessionModel::all();

        $data = [];
        $limiterCount = 0;
        $oldestDate = null;
        $newestDate = null;

        $requestedSession = $userChatOutSessions[$params['id']];
        if (isset($requestedSession)) {
            $sessionMessages = $requestedSession->getMessages();

            foreach ($sessionMessages as $message) {
                if ($limiterCount >= $limit) {
                    break;
                }

                $amITheSender = $me->getId() === $message->getSender()->getId();
                $date = $message->getCreatedAt();

                $addMessage = false;
                if (isset($dateOffset)) {
                    if ($thread === 'new' && $date >= $dateOffset) {
                        $addMessage = true;
                    } else if ($thread === 'old' && $date <= $dateOffset) {
                        $addMessage = true;
                    }
                } else {
                    $addMessage = true;
                }

                if ($addMessage) {
                    array_push($data, $message);
                    $limiterCount++;

                    // Track oldest and newest dates
                    if ($oldestDate === null || $date < $oldestDate) {
                        $oldestDate = $date;
                    }
                    if ($newestDate === null || $date > $newestDate) {
                        $newestDate = $date;
                    }
                }
            }
        }

        ob_clean();
        echo json_encode([
            'count' => count($data),
            'data' => $data,
            'oldestMessageDate' => $oldestDate,
            'newestMessageDate' => $newestDate
        ], JSON_UNESCAPED_SLASHES);
        exit();
    }

    public static function sendMessage($param): void
    {
        global $me;

        include_once ENUM_PATH . 'chat-content-type.php';

        if (!$param) {
            http_response_code(400);
            ob_clean();
            echo json_encode([
                'status' => 'error',
                'error' => 'No chat session defined'
            ]);
            exit();
        }

        header('Content-type: application/json');
        $messages = [];

        $content = $_POST['message'];
        if ($content) {
            array_push($messages, new ChatMessage([
                'id' => uniqid(),
                'sender' => $me,
                'type' => ChatContentType::Text,
                'content' => $content
            ]));
        }

        if ($_FILES['image_upload']) {
            $names = $_FILES['image_upload']['name'];
            foreach ($names as $count => $image) {
                if ($_FILES['image_upload']['error'][$count] !== UPLOAD_ERR_OK) {
                    http_response_code(400);
                    ob_clean();
                    echo json_encode([
                        'count' => 0,
                        'error' => 'There was an error uploading files'
                    ], JSON_UNESCAPED_SLASHES);
                    exit();
                }

                array_push($messages, new ChatMessage([
                    'id' => uniqid(),
                    'sender' => $me,
                    'type' => ChatContentType::Image,
                    'content' => IMAGE_PATH . 'laptop-1.jpg'
                ]));
            }
        }

        if ($param['id'] === 'null') {
            http_response_code(200);

            $otherParty = null;
            if (strtolower($_POST['otherPartyType']) === 'user') {
                $otherParty = UserModel::all();
            } else {
                $otherParty = StoreModel::all()[0];
            }

            $newChatSession = new ChatSession([
                'id' => uniqid(),
                'otherParty' => $otherParty,
                'messages' => $messages
            ]);

            ob_clean();
            echo json_encode([
                'chatListButton' => chatListCard($newChatSession)
            ]);
        } else {
            http_response_code(204);
        }

        exit();
    }
}
