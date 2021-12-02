<?php
   // session_start();

   require_once "../../../vendor/autoload.php";
   require_once "../vendor/autoload.php";

   use GuzzleHttp\Client;
   
   function get_All_Users(){
      $arrayobj = array();
      $pagination = true;
      $client = new Client([
         'base_uri' => 'https://prooftag.micronet-inc.net/api/',
         'http_errors' => false
      ]);
      $url = 'users';
      $token = $_SESSION['jwt'];
      do{
         $response = $client->request('GET', $url, [
            'headers' => [
               'Authorization' => "Bearer $token"
            ]
         ]);

         $body = $response->getBody();
         $arr_body = json_decode($body);

         if(isset($arr_body->data)){
            $arrayobj = array_merge($arrayobj, $arr_body->data);
         }
         if (isset($arr_body->links->next) and !empty($arr_body->links->next)){
            $url = substr($arr_body->links->next, 0, strlen('https://prooftag.micronet-inc.net/api/'));
         }else{
            $pagination = false;
         }
      }while($pagination);
      return $arrayobj;
   }


   function get_User_ByID($id) 
   {

      $client = new Client([
         'base_uri' => 'https://prooftag.micronet-inc.net/api/',
         'http_errors' => false
      ]);
      $url = 'users/'.$id;
      $token = $_SESSION['jwt'];

      $response = $client->request('GET', $url, [
         'headers' => [
            'Authorization' => "Bearer $token"
         ]
      ]);

      $body = $response->getBody();
      $arr_body = json_decode($body);

      return $arr_body;
   }

   // $token = '15|4UEg9FGX1k4X5YfTTeHloBwcf0aTGoZeCN3DUa7q';
   // print('<pre>');

   // print_r(get_All_userss());

?>
