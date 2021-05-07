<?php
    session_start();
    //Si l'utilisateur est connecté il arrive sur cette page sinon il ira sur la page login
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        //Si l'id de déconnexion est établi
        if(isset($logout_id)){
            $status = "Déconnecté";
            //Mettre à jour le statut de l'utilisateur ps'il a réussi à se connecter
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>