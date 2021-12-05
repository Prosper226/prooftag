<?php
    session_start();
    require_once "../../vendor/autoload.php";
    require_once("../api/citizens/PUT.php");

    $success = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        if(isset($_POST['id']) 
            and !empty($_POST['id'])){

            $id = $_POST['id'];

            $user_id = $_SESSION['user']->id;

            $civil_status_center = $_POST['civil_status_center'];
            $commune = $_POST['commune'];
            $name_of_officer = $_POST['name_of_officer'];
            $volet_number = $_POST["volet_number"];
            $act_number = $_POST['act_number'];
            $sex = $_POST['sex'];
            $father_name = $_POST['father_name'];
            $mother_name = $_POST['mother_name'];
            $father_profession = $_POST['father_profession'];
            $mother_profession = $_POST['mother_profession'];
            $parents_domicil = $_POST['parents_domicil'];
            $declarant = $_POST['declarant'];
            $date_of_birth = $_POST['date_of_birth'];
            $time_of_birth = $_POST['time_of_birth'];
            // $declaration_act = $_POST['declaration_act'];
            // $birth_act = $_POST['birth_act'];
            // $date_of_declaration = $_POST['date_of_declaration'];
            $mother_number = $_POST['mother_number'];
    
            $citizen_id = $_POST['citizen_id'];


            $data = array(
                "civil_status_center" => $civil_status_center,
                "commune"=> $commune,
                "name_of_officer"=> $name_of_officer,
                "volet_number"=> $volet_number,
                "act_number"=> $act_number,
                "sex"=> $sex,
                "father_name"=> $father_name,
                "mother_name"=> $mother_name,
                "father_profession"=> $father_profession,
                "mother_profession"=> $mother_profession,
                "parents_domicil"=> $parents_domicil,
                "declarant"=> $declarant,
                "date_of_birth"=> $date_of_birth,
                "time_of_birth"=> $time_of_birth,
                // "declaration_act"=> $declaration_act,
                // "birth_act"=> $birth_act,
                // "date_of_declaration"=> $date_of_declaration,
                "mother_number" => $mother_number,
        
                "citizen_id"=> $citizen_id,
                'user_id' => $user_id
            );
        
            if(update_Citizen_Birth_civil_status_certificates($id, $data)){
                $success = 1;
            }
        }
    }


    echo json_encode(array(
        'success' => $success,
        'message' => $success ?'Mise a jour du citoyen reussie': 'Echec de la mise a jour du citoyen'
    ));

?>