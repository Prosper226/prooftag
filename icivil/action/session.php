<?php
    session_start();
    if(!sessionExist()){
        header("refresh:0;url=login.php");
        exit();
    }
    function sessionExist(){
        if(isset($_SESSION) and !empty($_SESSION)){
            return 1;
        }else{
            return 0;
        } 
    }
?>