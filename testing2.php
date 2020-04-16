<?php
    session_start();

    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $photo = isset($_FILES["photo"]['name'])? $_FILES["photo"]['name'] : "";//Utilisation de $_FILES : pour copier un fichier image
    $fonction = isset($_POST["fonction"])? $_POST["fonction"] : "";

    if(isset($_POST["button2"])){
        header('Location: testing1.php');
    }

    if(isset($_POST["inscrire"])){ //Ajouter un nouveau utilisateur
        $database = "projet";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
        $db_found = mysqli_select_db($db_handle, $database);

        if($db_found){
            $sql = "SELECT * FROM utilisateur";
            if ($email != "") {
                $sql .= " WHERE email LIKE '%$email%'";
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) != 0) {
                header('Location: testing1.php');
            }else {
                $sql = "INSERT INTO utilisateur(email,motdepasse,pseudo,photoprofil,type) VALUES ('$email','$password','$pseudo','$photo','$fonction')";
                $result = mysqli_query($db_handle, $sql);//Il permet d'enregistrer//
            }
        } else {
            echo "Database not found";
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //A définir pour la table si tu souhaites avoir des tables différentes : acheteur, vendeur et administrateur/////////////////////////////////////
    if(isset($_POST["button1"])){

        $database = "projet";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
        $db_found = mysqli_select_db($db_handle, $database);

        if($db_found){
            //Boucle de recherche d'identification pour l'acheteur
            $sql = "SELECT * FROM utilisateur";
            if ($email != "") {
                $sql .= " WHERE Email LIKE '%$email%'";
                if ($password != "") {
                $sql .= " AND Motdepasse LIKE '%$password%'";
                }
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) {
                header('Location: connexion.html');
            } else {
                while($data = mysqli_fetch_assoc($result)){ 
                $_SESSION['email'] = $data['Email'];
                $_SESSION['pseudo'] = $data['Pseudo'];
                $_SESSION['photo'] = $data['Photo'];
                $_SESSION['fonction'] = $data['Fonction'];


                if($data['type'] == 'acheteur') {
                    header('Location: accueiltest.php');//Vers l'accueil de l'acheteur
                }
                if($data['type'] == 'vendeur') {
                    header('Location: xxxx.html'); //Vers l'accueil du vendeur
                }
                if($data['type'] == 'administrateur') {
                    header('Location: xxxx.html'); //Vers l'accueil de l'administateur
                }
                }
            }
            
        }
        else{
            echo "Database not found";
        }
    }//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

