<?php
    session_start();

    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $photo = isset($_FILES["photo"]['name'])? $_FILES["photo"]['name'] : "";//Utilisation de $_FILES : pour copier un fichier image
    $fonction = isset($_POST["fonction"])? $_POST["fonction"] : "";

    if(isset($_POST["s_inscrire"])){//Dirige vers le formulaire d'inscription
        header('Location: inscription.php');
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
                $sql = "INSERT INTO utilisateur(nom, Prenom, email, motDePasse, pseudo, photoProfil, type) VALUES ('$nom','$prenom','$email','$password','$pseudo','$photo','$fonction')";
                $result = mysqli_query($db_handle, $sql);//Il permet d'enregistrer//
                header('Location: connexion.php');
            }
        } else {
            echo "Database not found";
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if(isset($_POST["se_connecter"])){

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
                $_SESSION['nom'] = $data['nom'];
                $_SESSION['prenom'] = $data['prenom'];   
                $_SESSION['email'] = $data['email'];
                $_SESSION['pseudo'] = $data['pseudo'];
                $_SESSION['photo'] = $data['photoProfil'];
                $_SESSION['fonction'] = $data['type'];
                $_SESSION['password'] = $data['motDePasse'];

                if($data['type'] == 'acheteur') {
                    header('Location: accueilAcheteur.php');//Vers l'accueil de l'acheteur
                }
                if($data['type'] == 'vendeur') {
                    header('Location: accueilVendeur.php'); //Vers l'accueil du vendeur
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

