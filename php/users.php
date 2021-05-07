<?php

// Lorsque l'utilisateur est connecté il a accès aux différentes chat box
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    //Si aucun utilisateurs ne s'est enregistré alros un message est envoyé 
    if(mysqli_num_rows($query) == 0){
        $output .= "Pas d'utilisateurs disponibles";
    }elseif(mysqli_num_rows($query) > 0){
        //Sinon l'utilisateur a accès aux chat boxes
        include_once "data.php";
    }
    echo $output;
?>

