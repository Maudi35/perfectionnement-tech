<?php
//dès que la session commence on exécute la connexion à la base de données
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //vérifier si l'email de l'utilisateur est valide ou non
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //vériier que l'email existe en base de données
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            //Si l'email existe déjà un message est envoyé à l'utilisateur
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                //vérifier que l'utilisateur charge ses fichiers
                //Si le fichier est chargé 
                if(isset($_FILES['image'])){
                    //alors on récupère le nom de l'image
                    $img_name = $_FILES['image']['name'];
                    //récupération du type d'image
                    $img_type = $_FILES['image']['type'];
                    //nom temporaire utilisé pour sauvegarder le fichier dans notre dossier
                    $tmp_name = $_FILES['image']['tmp_name'];
                    //on divise l'image et on récupère l'extension à la fin
                    $img_explode = explode('.',$img_name);
                    //récupérer l'extension
                    $img_ext = end($img_explode);
                    //format d'img valides que l'on place dans un tableau
                    $extensions = ["jpeg", "png", "jpg"];
                    //Si l'utilisateur charge une img, celle-ci sera analyser au regard des extensions existantes
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                //quand l'utilisateur s'est inscrit son statut sera actif
                                $status = "Active now";
                                $encrypt_pass = md5($password);
                                //insérer les données de l'utilisateur dans la table
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }else{
                                        echo "Cette adresse email n'existe pas";
                                    }
                                }else{
                                    echo "Il y a un problème. Réessayez !";
                                }
                            }
                        }else{
                            echo "Chargez une photo - jpeg, png, jpg";
                        }
                    }else{
                        echo "Chargez une photo - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email n'est pas valide";
        }
    }else{
        echo "Vous devez remplir tous les champs";
    }
?>

