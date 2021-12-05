<?php
// session_start();

// require_once "../../../vendor/autoload.php";

use GuzzleHttp\Client;

function add_user($data = array()){
    
    $client =  new Client([
        'base_uri' => 'https://prooftag.micronet-inc.net/api/',
        'http_errors' => false
    ]);

    $url = 'users';
    $token = $_SESSION['jwt'];
    $response = $client->request('POST', $url, [
        'headers' => [
            'Authorization' => "Bearer $token"
        ],
        'json' => $data
    ]);

    $body = $response->getBody();
    $arr_body = json_decode($body);
    return $arr_body;

    if(! isset($arr_body->id)){
        return 0;
    }
    return true;
}

//     print('<pre>');

// $data = array(
//     'name' => 'ILBOUDO',
//     'first_name' => 'Windinmalgda',
//     "matricule" => "17059",
//     "login" => "pso@gmail.com",
//     "role_id"=> 3,
//     "can_allowed_to_do" => 1,
//     "matricule" => "ppp",
//     "password" => "tot"
// );


// print_r(add_user($data));


?>









