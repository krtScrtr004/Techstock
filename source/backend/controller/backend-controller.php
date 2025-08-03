<?php

class BackendController implements Controller
{
    public static function index(): void {}

    public static function getMessages($params): void
    {
        // TODO
        header('Content-Type: application/json');

        if (!isset($params['id'])) {
            if (ob_get_length()) {
                ob_clean();
            }
            http_response_code(500);
            echo json_encode([
                'count' => 0,
                'error' => 'No chat session ID provided'
            ]);
            exit();
        }

        $offset = $_GET['offset'] ?? 0;
        $limit = 5;
        $userChatOutSessions = ChatSessionModel::all();

        $requestedSession = $userChatOutSessions[$params['id']];
        if (!isset($requestedSession)) {
            if (ob_get_length()) {
                ob_clean();
            }
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

        if (ob_get_length()) {
            ob_clean();
        }
        echo json_encode([
            'count' => count($response),
            'data' => $data
        ]);
        exit();
    }

    public static function locationPermission(): void
    {
        global $session;

        $data = decodeData('php://input');
        if (!$data) {
            throw new ErrorException('Cannot decode data');
        }


        // Set Session $ Cookie for location info
        if (!isset($_COOKIE['locationPermission'])) {
            $permission = $data['permission'];
            setcookie('locationPermission', $permission ? 'true' : 'false', [
                'expires' => time() + (3600 * 24 * 31), // 1 Month
                'path' => '/',
                'httponly' => false,
                'secure' => true,
                'samesite' => 'Lax'
            ]);

            if ($permission) {
                $ip = $session->get('ip');
                $response = decodeData("http://ip-api.com/json/$ip");
                if (!isset($response) || $response['status'] !== 'success') {
                    $session->set('country',  'Philippines');
                    $session->set('countryCode', 'PH');
                    return;
                }

                $session->set('country', $response['country']);
                $session->set('countryCode', $response['countryCode']);
                $session->set('region', $response['region']);
                $session->set('regionName', $response['regionName']);
                $session->set('city', $response['city']);
                $session->set('zip', $response['zip']);
                $session->set('timezone', $response['timezone']);
            }
        }

        http_response_code(204);
        header('Content-Type: application/json');
        echo json_encode([]);
    }
}
