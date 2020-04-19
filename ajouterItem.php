<?php

    session_start();
    $idUtilisateur = $_SESSION['idUser'];

    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);

    if($db_found){
/////////////////////////////////Supprimer un item
        if(isset($_POST["oui_supprimer"])){

            $nom_Item = isset($_POST["nom_Item"])? $_POST["nom_Item"] : "";

            if($nom_Item){ 
                    $sql = 0;
                    if ($nom_Item != "") {
                        $sql = "SELECT * FROM item WHERE idUtilisateur LIKE '%$idUtilisateur%' AND nom LIKE '%$nom_Item%'";
                    }
                    $result = mysqli_query($db_handle, $sql);
                    if (mysqli_num_rows($result) == 0) {
                    ?>
                        <div class="titre"style="margin-top:20px">
                            <h5>
                                <span class="glyphicon glyphicon-exclamation-sign">L'item n'existe pas. Réessayez</span> 
                            </h5>
                        </div>
                    <?php
                    }else {
                        while ($data = mysqli_fetch_assoc($result)){
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
                            <span class="glyphicon glyphicon-exclamation-sign"> L'item n'existe pas. Réessayez </span>
                        </h5>
                    </div>
                <?php
            }
        
        }
        
        /////////////////////////////////////////////////////////////////////////////////////////////////////
////////Ajouter une personne grace a une formulaire
        if(isset($_POST["oui_ajouter"])){
            
            $nom_Item = isset($_POST["nom_Item"])? $_POST["nom_Item"] : "";
            $photos = isset($_FILES["mesphotos"]['name'])? $_FILES["mesphotos"]['name'] : "";
            $video = isset($_POST["mavideo"])? $_POST["mavideo"] : "";
            $type_vente = isset($_POST["immediat"])? $_POST["immediat"] : "";
            $type2_vente = isset($_POST["enchere"])? $_POST["enchere"] : "";
            $type3_vente= isset($_POST["negocia"])? $_POST["negocia"] : "";
            $categorie = isset($_POST["cate"]) ? $_POST["cate"] : "";
            $description = isset($_POST["description"]) ? $_POST["description"]  :"";
            $prix = isset($_POST["prix"]) ? $_POST["prix"]: "";

            if($type2_vente && $type3_vente){
                header('location: ajouteritem.php');
            }
            else if($type_vente || $type2_vente || $type3_vente){
                if($type_vente){
                    $type_vente = "vente_immediat";
                }
                if($type2_vente){
                    $type2_vente = "enchere";
                }
                if($type3_vente){
                    $type2_vente = "meilleurOffre"; 
                }
                $sql = "SELECT * FROM item";  
                if ($nom_Item != "") {   // jsp quoi metre ici a la pplace de email
                    $sql .= " WHERE nom LIKE '%$nom_Item%'";
                }
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) {
                    ?>
                        <script>alert("Au moins un champ est vide, tous les champs doivent être remplis (Vidéo optionnelle");</script>
                    <?php
                }
                else {
                    $sql = "INSERT INTO item(idUtilisateur, nom, photos, video, vente, estVenteImmediate, categorie, description, prix) VALUES ('$idUtilisateur','$nom_Item','$photos','$video','$type2_vente','$type_vente','$categorie','$description','$prix')";
                    $result = mysqli_query($db_handle, $sql);//On enregistre
                }
            }
            
        }
    
        ?>


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

<!--Ici il faut ajouter Supprimer ou Ajouter un item, comme ajouter/suppr un item-->

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
                            <a class="dropdown-item" href="categorieItem.php">Meubles</a><br>
                            <a class="dropdown-item" href="categorieItem.php">Tableaux</a><br>
                            <a class="dropdown-item" href="categorieItem.php">Bijouterie</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="ajouterItem.php"><span class="glyphicon glyphicon-plus"></span> Ajouter/Supprimer Item</a></li>
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

   <!-- Pour MATTHIS TU PEUX MODIFIER ICI; line 158-162 c'est ton HTML de la base de cette page
   <div class="titre">
        <h2>
            <span class="glyphicon glyphicon-ok-circle"></span> Ajouter/Supprimer un Item
        </h2>
    </div> -->

    <!-- line 164 a 184 est un copier coller de chez Admin_ajout_supp -->
    <div class="titre">
            <h2>
            <span class="glyphicon glyphicon-transfer"></span> Ajouter ou Supprimer un Item
            </h2>
        </div>
        
        <!--Formulaire HTML-->
        <div class="test" style="margin-top:4%">
        <form action="ajouteritem.php" method="post" class="contain" enctype='multipart/form-data'>
                <div class="form-group row" style="margin-top:10px">
                    <div class="col-sm-6" style="text-align:center">
                        <button type="submit" class="btn btn-danger" name="supprime">Supprimer</button>
                    </div>
                    <div class="col-sm-6" style="text-align:center">
                        <button type="submit" class="btn btn-success" name="ajoute">&nbsp&nbspAjouter&nbsp&nbsp</button> <!--&nbsp conserve les espaces (pour que le bouton soit de la meme forme que Suppr-->
                    </div>
                </div>
                
            </form>
        </div> <!-- OUI JUSQUE ICI-->
<?php 
        if(isset($_POST["ajoute"])){ 
?>
    <div class="well">
        <form action="ajouteritem.php" method="post" class="contain" enctype='multipart/form-data'>
            <div class="form-group row">
                <label for="nomçItem" class="col-sm-2 col-form-label">Nom de l'Item</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  name="nom_Item">
                </div>
            </div>
            <div class="form-group row">
                <label for="cate" class="col-sm-2 col-form-label">Catégorie</label>
                <div class="col-sm-10">
                    <select class="form-control" name="cate">
                        <option value="Meubles" selected>Meubles</option>
                        <option value="Tableaux">Tableaux</option>
                        <option value="Bijoux">Bijoux</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="4"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="mesphotos" class="col-sm-2 col-form-label">Photos</label>
                <div class="col-sm-10">
                    <input type="file" class="custom-file-input" name="mesphotos" multiple="multiple">
                    <!--Choix d'une ou plrs photos-->
                    <label class="custom-file-label" for="mesphotos"></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="mavideo" class="col-sm-2 col-form-label">Vidéo</label>
                <!--Choix d'une seule vidéo-->
                <div class="col-sm-10">
                    <input type="file" class="custom-file-input" name="mavideo">
                    <!--Choix d'une ou plrs photos-->
                    <label class="custom-file-label" for="mavideo"></label>
                </div>
            </div>

            <div class="form-group row">
                <label for="vente" class="col-sm-2 col-form-label">Type de Vente</label>
                <div class="col-sm-10">
                    <input type="checkbox" name="immediat"  /> <label for="immediat">Vente immédiate</label>
                    <input type="checkbox" name="enchere" /> <label for="enchere">Enchère</label>
                    <input type="checkbox" name="negocia" /> <label for="negocia">Meilleur Offre</label>       
                </div>
            </div>

            <div class="form-group row">
                <label for="prix" class="col-sm-2 col-form-label">Prix de vente</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="prix">
                </div>
            </div>

            <div class="bouton">
                <input type="submit" class="btn btn-success" onclick="validate()" role="button" value="Ajouter l'Item" name="oui_ajouter">
            </div>
        </form>
    </div>
<?php
        }
        if(isset($_POST["supprime"])){///////MATTHIS TU PEUX MODIFIER ICI AUSSI
?>
    <div class="well">
        <form action="ajouteritem.php" method="post" class="contain" enctype='multipart/form-data'>
            <div class="form-group row">
                <label for="nomçItem" class="col-sm-2 col-form-label">Nom de l'Item</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  name="nom_Item">
                </div>
            </div>
            <div class="col-sm-6" style="text-align:center">
                <input type="submit" class="btn btn-light" name="oui" value="Retour" style="border:solid">
            </div>
            <div class="bouton">
                <input type="submit" class="btn btn-success" onclick="validate()" role="button" value="Supprimer l'Item" name="oui_supprimer">
            </div>
        </form>
    </div>
<?php
        }
        $sql = "SELECT * FROM item WHERE idUtilisateur LIKE '%$idUtilisateur%'";
        
        $result = mysqli_query($db_handle, $sql);
        ?> 

        <!--Affichage "Liste Vendeurs" en HTML-->
        <div class="titre">
            <h3>
                <span class="glyphicon glyphicon-list"></span> Liste des Items
            </h3>
        </div>

        <?php if (mysqli_num_rows($result) == 0) {
?>
<div class="titre"style="margin-top:20px">
    <h5>
        <span class="glyphicon glyphicon-exclamation-sign"></span> Aucun Item dans la liste
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
                        <img src="<?php echo $data['photos']; ?>" class="img-responsive" style="width:100%" alt="Photo de Profil">
                    </div>
                    <div class="col-sm-4">
                        <p><strong>Nom de l'item : </strong></p> <?php echo $data['nom']; ?> <!--Affichage Prénom-->
                        <p><strong>Description : </strong></p> <?php echo $data['description']; ?>
                    </div>
                    <div class="col-sm-5">
                        <p><strong>Categorie : </strong></p> <?php echo $data['categorie'] ?>
                        <p><strong>Prix : </strong></p> <?php echo $data['prix'] ?>
                    </div>
                </div>
            </div>
</div>
<?php
}
            echo "</table>";
        }
    }else{
        echo "Datebase not found";
    }
?>



</body>

</html>