<?php        
    session_start();
    require_once "../../../vendor/autoload.php";
    use GuzzleHttp\Client;
    
    function login($username, $password){
        $client = new Client([
            'base_uri' => 'https://prooftag.micronet-inc.net/api/',
            'http_errors' => false
        ]);
        $response = $client->request('POST', 'login', [
            'json' => [
                'login' => $username,
                'password' => $password
            ]
        ]);

        if($response->getStatusCode() != 200){
            return 0;
        }

        $body = $response->getBody();
        $arr_body = json_decode($body);
        $_SESSION['jwt'] = $arr_body->jwt;
        $_SESSION['user'] = $arr_body->user;
        return 1;
    }

    // print('<pre>');
    // print_r(login('psedgo@gmail.com', 'toto'));
    // print_r($_SESSION);


?>
