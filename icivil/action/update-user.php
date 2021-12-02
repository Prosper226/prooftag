<?php
    session_start();
    $success = 1;
    
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    //     if(isset($_POST['username'],$_POST['password'])){
    //         $username = $_POST['username'];
    //         $password = $_POST['password'];
    //         $url = "https://icivil.micronet-inc.net/api/login";

    //         $curl = curl_init($url);
    //         curl_setopt($curl, CURLOPT_URL, $url);
    //         curl_setopt($curl, CURLOPT_POST, true);
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //         $headers = array(
    //             "Content-Type: application/json",
    //         );
    //         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    //         $data = <<<DATA
    //         {
    //             "login" : "$username",
    //             "password" : "$password"
    //         }
    //         DATA;

    //         curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //         //for debug only!
    //         curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    //         $resp = curl_exec($curl);
    //         curl_close($curl);
    //         $resp = json_decode($resp);

    //         if(isset($resp->jwt)){
    //             $success = 1;
    //             $_SESSION['username'] = $username;
    //             $_SESSION['token'] = $resp->jwt;
    //         }
    //     }
    // }


    echo json_encode(array(
        'success' => $success,
        'message' => $success ?'Mise a jour de l\'utilisateur reussie': 'Echec de la mise a jour de l\'utilisateur'
    ));

?>