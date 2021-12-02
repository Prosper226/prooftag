<?php

   function get_All_Users($token = null) 
   {
      $arrayobj = array();
      $pagination = true;
      $url = "https://prooftag.micronet-inc.net/api/users";
      do{
         $curl = curl_init($url);
         curl_setopt($curl, CURLOPT_URL, $url);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

         $headers = array(
            "Authorization: Bearer $token",
         );
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
         //for debug only!
         curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

         curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // new

         $result = curl_exec($curl);
         curl_close($curl);
         $result = json_decode($result);

         if(isset($result->data)){
            $arrayobj = array_merge($arrayobj, $result->data);
         }
         if (isset($result->links->next) and !empty($result->links->next)){
            $url = $result->links->next;
         }else{
            $pagination = false;
         }
      }while($pagination);
      return $arrayobj;
   }

   function get_User_ByID($id, $token = null) 
   {

      $url = "https://prooftag.micronet-inc.net/api/users/$id";

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      $headers = array(
         "Authorization: Bearer $token",
      );
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      //for debug only!
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

      $result = curl_exec($curl);
      curl_close($curl);
      $result = json_decode($result);

      return $result;
   }

   // $token = '15|4UEg9FGX1k4X5YfTTeHloBwcf0aTGoZeCN3DUa7q';
   // print('<pre>');
   // print_r(get_User_ByID(1, $token));

?>
