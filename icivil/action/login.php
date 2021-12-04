<?php
    session_start();
    $success = 0;
    require_once "../../vendor/autoload.php";
    use GuzzleHttp\Client;
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        if(isset($_POST['username'],$_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            // $success = login($username,$password);

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
                $success = 0;
            }else{
                $body = $response->getBody();
                $arr_body = json_decode($body);
                $_SESSION['jwt'] = $arr_body->jwt;
                $_SESSION['user'] = $arr_body->user;
                $success = 1;
            }

            // $body = $response->getBody();
            // $arr_body = json_decode($body);
            // $_SESSION['jwt'] = $arr_body->jwt;
            // $_SESSION['user'] = $arr_body->user;
            // $success = 1;

        }
    } 

    echo json_encode(array(
        'success' => $success,
        'message' => $success ?'Connexion reussie': 'Echec de connexion'
    ));

?>