<?php

class FormSubmitController implements Controller
{
    public static function index(): void {}

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
