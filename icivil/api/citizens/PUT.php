<?php
    session_start();

    // require_once "../../../vendor/autoload.php";

    use GuzzleHttp\Client;
    
    function update_Citizen($id, $data = array()){
        
        $client =  new Client([
            'base_uri' => 'https://prooftag.micronet-inc.net/api/',
            'http_errors' => false
        ]);

        $url = 'citizens/'.$id;
        $token = $_SESSION['jwt'];
        $response = $client->request('PUT', $url, [
            'headers' => [
                'Authorization' => "Bearer $token"
            ],
            'json' => $data
        ]);

        $body = $response->getBody();
        $arr_body = json_decode($body);

        if(! isset($arr_body->id)){
            return false;
        }
        return true;
    }

    function update_Citizen_Birth_civil_status_certificates($id, $data = array()){
        
        $client =  new Client([
            'base_uri' => 'https://prooftag.micronet-inc.net/api/',
            'http_errors' => false
        ]);

        $url = 'birth_civil_status_certificates/'.$id;
        $token = $_SESSION['jwt'];
        $response = $client->request('PUT', $url, [
            'headers' => [
                'Authorization' => "Bearer $token"
            ],
            'json' => $data
        ]);

        $body = $response->getBody();
        $arr_body = json_decode($body);

        if(! isset($arr_body->id)){
            return false;
        }
        return true;
    }

    // $data = array(
    //     "civil_status_center" => "Yalgado",
    //     "commune"=> "Bogodogo",
    //     "name_of_officer"=> "Ilboudo Albert",
    //     "volet_number"=> "7",
    //     "act_number"=> "4",
    //     "sex"=> "masculin",
    //     "father_name"=> "Papa",
    //     "mother_name"=> "maman",
    //     "father_profession"=> "Medecin",
    //     "mother_profession"=> "Juriste",
    //     "parents_domicil"=> "Wemtenga",
    //     "declarant"=> "Nikiema Regis",
    //     "date_of_birth"=> "30-12-2021",
    //     "time_of_birth"=> "13=>30",
    //     "declaration_act"=> "Base64",
    //     "birth_act"=> "Base64",
    //     "date_of_declaration"=> "01-12-2021",
    //     "mother_number" => "2",

    //     "citizen_id"=> 6,
    //     'user_id' => 3
    // );
    // $id = 1;

//    $token = '15|4UEg9FGX1k4X5YfTTeHloBwcf0aTGoZeCN3DUa7q';
//    print('<pre>');

//    $data = array(
//        'name' => 'SAWADOGO',
//        'first_name' => 'Antonio',
//        'unique_id_id' => null,
//        'user_id' => 1
//     );
//     $id = 6;

// print_r(update_Citizen_Birth_civil_status_certificates($id, $data));
// print_r($_SESSION['user']->id);

?>
