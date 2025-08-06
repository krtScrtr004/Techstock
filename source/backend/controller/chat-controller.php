<?php

class ChatController implements Controller
{
    public static function index(): void {}

    public static function getMessages($params): void
    {
        // TODO
        header('Content-Type: application/json');

        if (!isset($params['id'])) {
            ob_clean();
            http_response_code(500);
            echo json_encode([
                'count' => 0,
                'error' => 'No chat session ID provided'
            ]);
            exit();
        }

        $offset = $_GET['offset'] ? (int) $_GET['offset'] : 0;
        $limit = 5;
        $userChatOutSessions = ChatSessionModel::all();

        $requestedSession = $userChatOutSessions[$params['id']];
        if (!isset($requestedSession)) {

            ob_clean();
            http_response_code(200);
            echo json_encode([
                'count' => 0,
                'result' => 'Chat session not found'
            ]);
            exit();
        }
        $sessionMessages = $requestedSession->getMessages();
        $response = array_slice($sessionMessages, $offset, $limit, true);

        $data = [];
        foreach ($response as $toHtml) {
            array_push($data, messageBox($toHtml));
        }

        ob_clean();
        echo json_encode([
            'count' => count($response),
            'data' => $data
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
                'count' => 0,
                'error' => 'No chat session ID provided'
            ],  JSON_UNESCAPED_SLASHES);
            exit();
        }

        header('Content-type: application/json');
        $response = [];

        $content = $_POST['message'];
        if ($content) {
            $message = new ChatMessage([
                'id' => uniqid(),
                'sender' => $me,
                'type' => ChatContentType::Text,
                'content' => $content
            ]);
            array_push($response, messageBox($message));
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

                $message = new ChatMessage([
                    'id' => uniqid(),
                    'sender' => $me,
                    'type' => ChatContentType::Image,
                    'content' => IMAGE_PATH . 'laptop-1.jpg'
                ]);
                array_push($response, messageBox($message));
            }
        }

        http_response_code(200);
        ob_clean();
        echo json_encode([
            'count' => count($response),
            'data' => $response
        ], JSON_UNESCAPED_SLASHES);
        exit();
    }
}
