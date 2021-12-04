
<?php

session_start();
require_once "../../vendor/autoload.php";
require_once("../api/users/POST.php");

$success = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    if(isset($_POST['name']) and !empty($_POST['name'])){

            $name = $_POST['name'];
            $first_name = $_POST['first_name'];
            $matricule = $_POST['matricule'];
            $login = $_POST['login'];
            $role_id = $_POST['role_id'];
            $password = $_POST['password'];

            $data = array(
                'name' => $name,
                'first_name' => $first_name,
                'matricule' => $matricule,
                "login" => $login,
                "role_id"=> $role_id,
                "password" => $password,

                "can_allowed_to_do" => 1
            );
    
        if(add_user($data)){
            $success = 1;
        }
    }
}


echo json_encode(array(
    'success' => $success,
    'message' => $success ?'Creation de l\'utilisateur reussie': 'Echec de creation de l\'utilisateur'
));

?>

