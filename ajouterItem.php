<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ajouter Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="ajouterItem.css" rel="stylesheet" type="text/css" />


<!--Partie JavaScript-->
<script>
        function validate() {
            testEmpty();
        }
    
    function testEmpty() {
        if ((document.getElementById("nom").value ==='') ||
            (document.getElementById("description").value ==='') ||
            (document.getElementById("mesphotos").value ==='') ||
            (document.getElementById("vente").value ==='') ||
            (document.getElementById("prix").value ==='')) {    
                alert("Veuillez remplir tous les champs s'il-vous-plaît  (Vidéo optionnelle)"); }
        else { window.location="accueilVendeur.php";}    
}
</script>



</head>

<body>
<?php

session_start();


    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);

    if($db_found){
/////////////////////////////////Supprimer une personne
        if(isset($_POST["oui_supprime"])){
            $idItem = isset($_POST["idItem"])? $_POST["idItem"] : "";

            if($idItem){ 
            $sql = 0;
            if ($idItem != "") {
                $sql = "SELECT * FROM item WHERE idItem = $idItem"; // c pas la bonne requete , jsp quoi mettre
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) {
            ?>
            <div class="titre"style="margin-top:20px">
                <h5>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> L'id rentré n'existe pas
                </h5>
            </div>
            <?php
            }else {
                while ($data = mysqli_fetch_assoc($result) ) {
                    $id = $data['idItem'];
                }
                $sql = "DELETE FROM item ";
                $sql .= " WHERE idItem = $id";
                $result = mysqli_query($db_handle, $sql); 
            }
            } else {
            ?>
            <div class="titre"style="margin-top:20px">
                <h5>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> L'id rentré n'existe pas
                </h5>
            </div>
            <?php
            }

        }
////////Ajouter une personne grace a une formulaire
        if(isset($_POST["oui_ajoute"])){
            $idUtilisateur = isset($_POST["idUtilisateur"])? $_POST["idUtilisateur"] : "";
            $nom = isset($_POST["nom"])? $_POST["nom"] : "";
            $photos = isset($_FILES["photo"]['name'])? $_FILES["photo"]['name'] : "";
            $video = isset($_POST["video"])? $_POST["video"] : "";
            $vente = isset($_POST["vente"])? $_POST["vente"] : "";
            $estVenteImmediate = isset($_POST["estVenteImmediate"]) ? $_POST["estVenteImmediate"] : "";
            $categorie = isset($_POST["fonction"]) ? $_POST["fonction"] : "";
            $description = isset($_POST["description"]) ? $_POST["description"]  :"";
            $prix = isset($_POST["prix"]) ? $_POST["prix"]: "";

            if($idUtilisateur || $nom || $photos || $video || $vente || $estVenteImmediate || $categorie || $description || $prix ){
            $sql = "SELECT * FROM item";  
            if ($email != "") {   // jsp quoi metre ici a la pplace de email
                $sql .= " WHERE email LIKE '%$email%'";
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) != 0) { ?>
            <div class="titre"style="margin-top:20px">
                <h5>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> L'email rentré n'existe pas
                </h5>
            </div>
            <?php
            }else {
                $sql = "INSERT INTO item(idUtilisateur, nom, photos, video, vente, estVenteImmediate, categorie, description, prix) VALUES ('$idUtilisateur','$nom','$photos','$video','$vente','$estVenteImmediate','$categorie','$description','$prix')";
                $result = mysqli_query($db_handle, $sql);//On enregistre
            }
            }else { ?>
                <script>alert("Un champ est vide, tous les champs doivent être remplis");</script>

        <?php    }
        }
        ?>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="accueilVendeur.php">Ebay ECE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="accueilVendeur.php"><span class="glyphicon glyphicon-home"></span>
                            Accueil</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Catégories</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Meubles</a><br>
                            <a class="dropdown-item" href="#">Tableaux</a><br>
                            <a class="dropdown-item" href="#">Bijouterie</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="ajouterItem.php"><span class="glyphicon glyphicon-plus"></span> Ajouter
                            Item</a></li>
                    <li><a href="monCompteVendeur.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="titre">
        <h2>
            <span class="glyphicon glyphicon-ok-circle"></span> Ajouter un Item
        </h2>
    </div>

    <div class="well">
        <form action="ajouteritem.php" method="post" class="contain" enctype='multipart/form-data'>
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom de l'Item</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="nom">
                </div>
            </div>
            <div class="form-group row">
                <label for="cate" class="col-sm-2 col-form-label">Catégorie</label>
                <div class="col-sm-10">
                    <select class="form-control" id="cate">
                        <option selected>Meubles</option>
                        <option>Tableaux</option>
                        <option>Bijoux</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" rows="4"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="mesphotos" class="col-sm-2 col-form-label">Photos</label>
                <div class="col-sm-10">
                    <input type="file" class="custom-file-input" id="mesphotos" multiple="multiple">
                    <!--Choix d'une ou plrs photos-->
                    <label class="custom-file-label" for="mesphotos"></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="mavideo" class="col-sm-2 col-form-label">Vidéo</label>
                <!--Choix d'une seule vidéo-->
                <div class="col-sm-10">
                    <input type="file" class="custom-file-input" id="mavideo">
                    <!--Choix d'une ou plrs photos-->
                    <label class="custom-file-label" for="mavideo"></label>
                </div>
            </div>

            <div class="form-group row">
                <label for="vente" class="col-sm-2 col-form-label">Type de Vente</label>
                <div class="col-sm-10">
                    <select class="form-control" id="vente">
                        <option selected>Vente Immédiate</option>
                        <option>Enchère</option>
                        <option>Négociation</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="prix" class="col-sm-2 col-form-label">Prix de vente</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" id="prix">
                </div>
            </div>

            <div class="bouton">
                <a class="btn btn-success" onclick="validate()" role="button" value="Submit" name="oui_ajouter">Ajouter l'Item</a>
            </div>
        </form>
    </div>

</body>

</html>