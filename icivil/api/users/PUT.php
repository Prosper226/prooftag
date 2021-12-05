<?php
// session_start();

// require_once "../../../vendor/autoload.php";

use GuzzleHttp\Client;

function update_user($id, $data = array()){
    
    $client =  new Client([
        'base_uri' => 'https://prooftag.micronet-inc.net/api/',
        'http_errors' => false
    ]);

    $url = 'users/'.$id;
    $token = $_SESSION['jwt'];
    $response = $client->request('PUT', $url, [
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


function update_user_status($id, $allowed){
    
    $client =  new Client([
        'base_uri' => 'https://prooftag.micronet-inc.net/api/',
        'http_errors' => false
    ]);

    $url = 'users/'.$id;
    $token = $_SESSION['jwt'];
    $response = $client->request('PUT', $url, [
        'headers' => [
            'Authorization' => "Bearer $token"
        ],
        'json' => [
            'can_allowed_to_do' => $allowed,
        ]
    ]);

    $body = $response->getBody();
    $arr_body = json_decode($body);
    return $arr_body;

    if(! isset($arr_body->id)){
        return 0;
    }
    return true;
}

//    print('<pre>');

// $data = array(
//     'name' => 'ILBOUDO',
//     'first_name' => 'Windinmalgda',
//     "matricule" => "17059"
// );
// $id = 7;

// print_r(update_user($id, $data));


?>
