<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ajouter/Supprimer Vendeur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--Partie CSS-->
<style>
        
        .container {
            width: 100%;
            color: whitesmoke;
        }

        body{
            background-image: url(bois.png);
            background-repeat: repeat;
        }

        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        footer {
            padding: 0px;
            margin-top: 0px;
            border-top: 0px;
            color: white;
            background-color: rgb(34, 31, 31);
            position:absolute;
            bottom:0;
            width: 100%;
        }
        .titre {
            margin:auto;
            display: block;
            text-align: center;
            margin-top: 5%;
            color: whitesmoke;
        }

        .test {
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            margin-bottom: 70px;
        }

        .well {
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            margin-bottom: 70px;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="accueilAcheteur.php">Ebay ECE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueilAcheteur.php"><span class="glyphicon glyphicon-home"></span>
                            Accueil</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Catégories d'Items</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="categorieItem.php?cate=Meubles"> Meubles</a><br>
                            <a class="dropdown-item" href="categorieItem.php?cate=Tableaux"> Tableaux</a><br>
                            <a class="dropdown-item" href="categorieItem.php?cate=Bijoux"> Bijoux</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Catégories d'Achats</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="categorieAchat.php"> Vente Directe</a><br>
                            <a class="dropdown-item" href="categorieAchat.php"> Enchère</a><br>
                            <a class="dropdown-item" href="categorieAchat.php"> Négociation</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="ajouterItem.php"><span class="glyphicon glyphicon-plus"></span> Ajouter/Supprimer Item</a></li>
                    <li><a href="Admin_supp_ajoute.php"><span class="glyphicon glyphicon-plus"></span> Ajouter/Supprimer Vendeur</a></li>
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>



        <!-- D'abord HTML pour afficher les titres et PHP au milieu pour afficher les messages d'erreurs -->
    
        <!--Titre-->
        <div class="titre">
            <h2>
            <span class="glyphicon glyphicon-transfer"></span> Ajouter/Supprimer un Vendeur
            </h2>
        </div>
        
        <!--Formulaire HTML-->
        <div class="test" style="margin-top:4%">
        <form action="Admin_supp_ajoute.php" method="post" class="contain" enctype='multipart/form-data'>
                <div class="form-group row" style="margin-top:10px">
                    <div class="col-sm-6" style="text-align:center">
                        <button type="submit" class="btn btn-danger" name="supprime">Supprimer</button>
                    </div>
                    <div class="col-sm-6" style="text-align:center">
                        <button type="submit" class="btn btn-success" name="ajoute">&nbsp&nbspAjouter&nbsp&nbsp</button> <!--&nbsp conserve les espaces (pour que le bouton soit de la meme forme que Suppr-->
                    </div>
                </div>
                
            </form>
        </div>
        <?php


    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);

    if($db_found){
/////////////////////////////////Supprimer une personne
        if(isset($_POST["oui_supprime"])){
            $t_email = isset($_POST["t_mail"])? $_POST["t_mail"] : "";

            if($t_email){ 
            $sql = 0;
            if ($t_email != "") {
                $sql = "SELECT * FROM utilisateur WHERE type LIKE 'vendeur' AND email LIKE '%$t_email%'";
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) {
            ?>
            <div class="titre"style="margin-top:20px">
                <h5>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> L'email rentré n'existe pas
                </h5>
            </div>
            <?php
            }else {
                while ($data = mysqli_fetch_assoc($result) ) {
                    $id = $data['idUtilisateur'];
                }
                $sql = "DELETE FROM utilisateur ";
                $sql .= " WHERE idUtilisateur = $id";
                $result = mysqli_query($db_handle, $sql); 
            }
            } else {
            ?>
            <div class="titre"style="margin-top:20px">
                <h5>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> L'email rentré n'existe pas. Réessayez
                </h5>
            </div>
            <?php
            }

        }
////////Ajouter une personne grace a une formulaire
        if(isset($_POST["oui_ajoute"])){
            $nom = isset($_POST["nom"])? $_POST["nom"] : "";
            $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
            $email = isset($_POST["email"])? $_POST["email"] : "";
            $password = isset($_POST["password"])? $_POST["password"] : "";
            $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
            $photo = isset($_FILES["photo"]['name'])? $_FILES["photo"]['name'] : "";
            $fonction = isset($_POST["fonction"])? $_POST["fonction"] : "";

            if($nom || $prenom || $email || $password || $pseudo || $photo ){
            $sql = "SELECT * FROM utilisateur";
            if ($email != "") {
                $sql .= " WHERE email LIKE '%$email%'";
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) != 0) { ?>
            <div class="titre"style="margin-top:20px">
                <h5>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> L'email rentré existe déjà. Veuillez ajouter un nouvel email
                </h5>
            </div>
            <?php
            }else {
                $sql = "INSERT INTO utilisateur(nom, Prenom, email, motDePasse, pseudo, photoProfil, type) VALUES ('$nom','$prenom','$email','$password','$pseudo','$photo','$fonction')";
                $result = mysqli_query($db_handle, $sql);//On enregistre
            }
            }else { ?>
                <script>alert("Un champ est vide, tous les champs doivent être remplis");</script>

        <?php    }
        }

        if(isset($_POST["ajoute"])){ //Les conditions ne fonctionnent qu'avec du php puis on remplit avec un formulaire pour l'email a ajouter
            ?>


        <!--HTML-->
            <!-- Formulaire d'inscription pour ajouter un vendeur -->
            
        <div class="well">
        <form action="Admin_supp_ajoute.php" method="post" class="contain" enctype='multipart/form-data' >
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="nom">
                </div>
            </div>
            <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="prenom">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pseudo">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5" style="margin-left:5px">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group row">
                <label for="fonction" class="col-sm-2 col-form-label">Fonction</label>
                <div class="col-sm-5">
                    <select name="fonction">
                        <option value="vendeur">Vendeur</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="photo" class="col-sm-2 col-form-label">Photo de Profil</label>
                <a class="btn btn-light" role="button">
                    <input type="file" name="photo">
                </a>
            </div>
            <div class="form-group row">
                <div class="col-sm-6" style="text-align:center">
                    <input type="submit" class="btn btn-light" name="non" value="Retour" style="border:solid">
                </div>
                <div class="col-sm-6" style="text-align:center">
                    <input type="submit" class="btn btn-success" name="oui_ajoute" value="Ajouter ce Vendeur">
                </div>
            </div>
        </form>
    </div>
    


        <!--PHP-->
        <?php 
        }
        if(isset($_POST["supprime"])){ //Ici un formulaire pour supprimer et il suffit de taper le mail du vendeur
        ?>


        <!--HTML-->

        <div class="well" style="margin-top:5%">
            <form action="Admin_supp_ajoute.php" method="post" class="contain" enctype='multipart/form-data' >
                <div class="form-group row" style="margin-top:20px">
                    <label for="t_mail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="email" name="t_mail">
                    </div>
                </div>
                <div class="form-group row">
            <div class="col-sm-6" style="text-align:center">
                    <input type="submit" class="btn btn-light" name="oui" value="Retour" style="border:solid">
                </div>
                <div class="col-sm-6" style="text-align:center">
                    <input type="submit" class="btn btn-danger" name="oui_supprime" value="Supprimer ce Vendeur">
                </div>
            </div>
            </form>
        </div>

<?php
        }
//php
////////////Boucle de recherche d'identification pour l'acheteur
        $sql = "SELECT * FROM utilisateur WHERE type LIKE 'vendeur'";
        
        $result = mysqli_query($db_handle, $sql);
        ?> 

        <!--Affichage "Liste Vendeurs" en HTML-->
        <div class="titre">
            <h3>
                <span class="glyphicon glyphicon-list"></span> Liste des Vendeurs
            </h3>
        </div>

        <?php if (mysqli_num_rows($result) == 0) {
?>

<!--Affichage aucun vendeur dans la liste-->
<div class="titre"style="margin-top:20px">
    <h5>
        <span class="glyphicon glyphicon-exclamation-sign"></span> Aucun Vendeur dans la liste
    </h5>
</div>

<!--PHP-->
<?php
        ;} else {             
            echo "<table border='1'>";
            while($data = mysqli_fetch_assoc($result)){   

?>

<!--HTML-->

<div class="row">
            <div class="well" style="width:50%">
                <div class="row" style="margin-top:0px">
                    <div class="col-sm-3">
                        <img src="<?php  $image = $data['photoProfil']; ?>" class="img-responsive" style="width:100%" alt="Photo de Profil">
                    </div>
                    <div class="col-sm-4">
                        <p><strong>Nom : </strong></p> <?php echo $data['nom']; ?> <!--Affichage Prénom-->
                        <p><strong>Prénom : </strong></p> <?php echo $data['prenom']; ?>
                    </div>
                    <div class="col-sm-5">
                        <p><strong>Email : </strong></p> <?php echo $data['email'] ?>
                        <p><strong>Pseudo : </strong></p> <?php echo $data['pseudo'] ?>
                    </div>
                </div>
            </div>
</div>

<?php
}
            echo "</table>";
        }
    }
    else{
        ?>
            <div class="titre"style="margin-top:20px">
                <h5>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> DataBase not found
                </h5>
            </div>
        <?php
    }

?>


<!--
    <footer class="container-fluid text-center">
            <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>
-->
</body>
</html>