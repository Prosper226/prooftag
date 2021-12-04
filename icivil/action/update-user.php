<?php

    session_start();
    require_once "../../vendor/autoload.php";
    require_once("../api/users/PUT.php");

    $success = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        if(isset($_POST['name']) and !empty($_POST['id'])){
                $name = $_POST['name'];
                $first_name = $_POST['first_name'];
                $matricule = $_POST['matricule'];
    
                $id = $_POST['id'];
    
                // $user_id = $_SESSION['user']->id;
    
                $data = array(
                    'name' => $name,
                    'first_name' => $first_name,
                    'matricule' => $matricule,
                    // 'user_id' => $user_id,
                );
        
            if(update_user($id, $data)){
                $success = 1;
            }
        }
    }


    echo json_encode(array(
        'success' => $success,
        'message' => $success ?'Mise a jour de l\'utilisateur reussie': 'Echec de la mise a jour de l\'utilisateur'
    ));

?>