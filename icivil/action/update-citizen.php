<?php
    session_start();
    require_once "../../vendor/autoload.php";
    require_once("../api/citizens/PUT.php");

    $success = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        if(isset($_POST['name'],$_POST['first_name'], $_POST['unique_id']) 
            and !empty($_POST['name'])
            and !empty($_POST['first_name'])
            and !empty($_POST['id'])){

                $name = $_POST['name'];
                $first_name = $_POST['first_name'];
                $unique_id_id = $_POST['unique_id'];
    
                $id = $_POST['id'];
    
                $user_id = $_SESSION['user']->id;
    
                $data = array(
                    'name' => $name,
                    'first_name' => $first_name,
                    'unique_id_id' => $unique_id_id,
                    'user_id' => $user_id,
                );
        
            if(update_Citizen($id, $data)){
                $success = 1;
            }
        }
    }


    echo json_encode(array(
        'success' => $success,
        'message' => $success ?'Mise a jour du citoyen reussie': 'Echec de la mise a jour du citoyen'
    ));

?>