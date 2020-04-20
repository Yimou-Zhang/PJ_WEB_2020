<?php 
    session_start();
    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    $prixtotal=$_SESSION['prixtotal'];
    $idUtilisateur = $_SESSION['idUser'];

?>

    

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Valider mon Panier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="validerPanier.css" rel="stylesheet" type="text/css" />

<!--Partie JavaScript-->

<!-- Utiliser ajax asynchron pour la partie php -->
<script>
    function validate() {
        testEmpty();
    }

function testEmpty() {
    if ((document.getElementById("adresse").value ==='') ||
        (document.getElementById("postal").value ==='') ||
        (document.getElementById("ville").value ==='') ||
        (document.getElementById("pays").value ==='') ||
        (document.getElementById("tel").value ==='') ||
        (document.getElementById("numcarte").value ==='') ||
        (document.getElementById("nomcarte").value ==='') ||
        (document.getElementById("code").value ==='')) {
            alert("Un champ est vide, tous les champs doivent être remplis"); }
    else { window.location="accueilAcheteur.php";}    
}
</script>

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
                <a href="accueilAcheteur.php">
                    <img class="navbar-brand" src="couverture.png">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="accueilAcheteur.php"><span class="glyphicon glyphicon-home"></span>
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
                    <li class="active"><a href="monPanier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!--Titre avec icon-->
    <div class="titre">
        <h2>
        <span class="glyphicon glyphicon-ok-circle"></span> Valider le Panier
        </h2>
    </div>

    <div class="test" style="margin-top:4%">
        <form action="validerPanier.php" method="post" class="contain" enctype='multipart/form-data'>
                <div class="form-group row" style="margin-top:10px">
                    <div class="col-sm-6" style="text-align:center">
                        <button type="submit" class="btn btn-danger" name="utilise">J'ai déjà</button>
                    </div>
                    <div class="col-sm-6" style="text-align:center">
                        <button type="submit" class="btn btn-success" name="ajoute">&nbsp&nbspAjouter&nbsp&nbsp</button> <!--&nbsp conserve les espaces (pour que le bouton soit de la meme forme que Suppr-->
                    </div>
                </div>
                
         </form>
    </div>
    <?php
        if(isset($_POST["utilise"])){
    ?>
    <form action="validerPanier.php" method="post" class="contain" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col-sm-6">
                        <label for="dest" class="col-sm-3">Nom Prenom</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="nomPrenom" class="form-control" type="text" placeholder="Nom Prénom" id="dest" required>
                        </div>      
                        <label for="adresse" class="col-sm-3">Adresse</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="adresse" class="form-control" type="text" placeholder="ex: 25 rue Danton" id="adresse" required>
                        </div>
                        <label for="numcarte" class="col-sm-3 col-form-label">Numéro de carte</label>
                        <div class="col-sm-9" style="margin-bottom:17px">
                            <input type="text" name="numCarte" class="form-control" type="tel" id="numcarte" placeholder="1234 5678 9876" maxlength="15">
                        </div>
                        <div style="text-align:center; margin-top:20px">
                            <input type="submit" name="valider_utiliser" class="btn btn-success"  value="Valider">
                        </div>
                        </div>
                    </div>
    </form>
    <?php
        }
        if(isset($_POST["valider_utiliser"])){
            $numCarte = isset($_POST["numCarte"])? $_POST["numCarte"] : "";
            $nomPrenom = isset($_POST["nomPrenom"])? $_POST["nomPrenom"] : "";
            $adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
            $sql = "SELECT * FROM livraison";
                if($nomPrenom != ""){
                    $sql .= " WHERE nomPrenom LIKE '%$nomPrenom%'";
                    if($adresse != ""){
                        $sql .=" AND adresse LIKE '%$adresse%' ";
                    }
                }
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) == 0) {
                    echo "Coordonnée non trouvé";
                }else{
                    while($data = mysqli_fetch_assoc($result)){
    ?> 
<div class="formu">
        <div class="well">
            <form action="validerPanier.php" method="post" enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="titretext" style="text-align:center; margin-bottom:50px">
                            <h4><span class="glyphicon glyphicon-road"></span> Livraison </h4>
                        </div>    
                        <label for="dest" class="col-sm-3">Destinataire</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="nomPrenom" class="form-control" type="text" value="<?php echo $data['nomPrenom'] ?>" id="dest" readonly>
                        </div>
                        <label for="adresse" class="col-sm-3">Adresse</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="adresse" class="form-control" type="text" value="<?php echo $data['adresse'] ?>" id="adresse" readonly>
                        </div>
                        
                        <label for="postal" class="col-sm-3 col-form-label" style="margin-bottom:0px">Code Postal</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                              <input type="text" name="codePostal" class="form-control" type="tel" value="<?php echo $data['codePostal'] ?>" id="postal" readonly maxlength="5">
                        </div>
                        
                        <label for="ville" class="col-sm-3">Ville</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="ville" class="form-control" type="text" value="<?php echo $data['ville'] ?>" id="ville" readonly>
                        </div>
                        <label for="pays" class="col-sm-3 col-form-label">Pays</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="pays" class="form-control" type="text" value="<?php echo $data['pays'] ?>" id="pays" readonly>
                        </div>
                        <label for="tel" class="col-sm-3 col-form-label">Téléphone</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="numTelephone" class="form-control" type="tel" value="<?php echo $data['numTelephone'] ?>" id="tel" readonly>
                        </div>
                    </div>
                    <?php
                    }
                }
                $sql = "SELECT * FROM paiement";
                if($nomPrenom != ""){
                    $sql .= " WHERE nomSurCarte LIKE '%$nomPrenom%'";
                    if($numCarte != ""){
                        $sql .=" AND numCarte LIKE '%$numCarte%' ";
                    }
                }
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) == 0) {
                    echo "Coordonnée non trouvé";
                }else{
                    while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="col-sm-6">
                        <div class="titretext" style="text-align:center; margin-bottom:50px">
                            <h4><span class="glyphicon glyphicon-credit-card"></span> Paiement </h4>
                        </div> 

                        <label for="carte" class="col-sm-3 col-form-label" style="margin-bottom:0px">Type Carte</label>
                        <div class="col-sm-9" style="margin-bottom:20px; margin-top:8px">   <!--A modifier avec Bootstrap 4.3.1-->
                            <input type="text" name="numCarte" class="form-control" value="<?php echo $data['typeCarte'] ?>" readonly maxlength="15">
                        </div>
                        <label for="numcarte" class="col-sm-3 col-form-label">Numéro de carte</label>
                        <div class="col-sm-9" style="margin-bottom:17px">
                            <input type="text" name="numCarte" class="form-control" id="numcarte" value="<?php echo $data['numCarte'] ?>" readonly maxlength="15">
                        </div>
                        <label for="nomcarte" class="col-sm-3 col-form-label">Nom sur la carte</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="nomSurCarte" class="form-control" id="nomcarte" value="<?php echo $data['nomSurCarte'] ?>" readonly>
                        </div>
                        <label for="expi" class="col-sm-3 col-form-label">Date Expiration</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="month" name="dateExpiration" class="form-control" id="expi" min="2020-03" value="<?php echo $data['dateExpiration'] ?>" readonly>
                        </div>
                        <label for="code" class="col-sm-3 col-form-label">Code de Sécurité</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="codeSecurite" class="form-control"  value="<?php echo $data['codeSecurite'] ?>" readonly  maxlength="4">
                        </div>
                        <label for="code" class="col-sm-3 col-form-label">Solde</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="number" name="solde" class="form-control"  value="<?php echo $data['solde'] ?>" readonly  maxlength="4">
                        </div>
                        <label for="code" class="col-sm-3 col-form-label">Prix total : </label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <?php echo $prixtotal; ?>€
                        </div>
                    </div>
                </div>

            <div class="form-check" style="text-align:center; margin-top:50px">
                <input class="form-check-input" type="checkbox" id="check1" required>
                <label class="form-check-label" for="check1">
                    Je confirme que mes données sont valides
                </label>
            </div>  
            
            <div class="form-check" style="text-align:center">
                <input class="form-check-input" type="checkbox" id="check2" required>
                <label class="form-check-label" for="check2">
                    J'accepte les Termes et Conditions
                </label>
            </div>  
            <div style="text-align:center; margin-top:20px">
                <input type="submit" name="valider_paiement" class="btn btn-success" onclick="validate()" value="Valider mes Achats">
            </div>
            </form>
        </div>
    </div>

    <?php 
        }
    }
}
        if(isset($_POST["ajoute"])){
    ?>
    <!--A modifier avec Bootstrap 4.3.1, ajouter couleur rouge lorsque pas rempli et vert lorsque rempli-->
    <div class="formu">
        <div class="well">
            <form action="validerPanier.php" method="post" enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="titretext" style="text-align:center; margin-bottom:50px">
                            <h4><span class="glyphicon glyphicon-road"></span> Livraison </h4>
                        </div>    
                        <label for="dest" class="col-sm-3">Destinataire</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="nomPrenom" class="form-control" type="text" placeholder="Nom Prénom" id="dest" required>
                        </div>
                        <label for="adresse" class="col-sm-3">Adresse</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="adresse" class="form-control" type="text" placeholder="ex: 25 rue Danton" id="adresse" required>
                        </div>
                        
                        <label for="postal" class="col-sm-3 col-form-label" style="margin-bottom:0px">Code Postal</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                              <input type="text" name="codePostal" class="form-control" type="tel" placeholder="ex: 75015" id="postal" maxlength="5">
                        </div>
                        
                        <label for="ville" class="col-sm-3">Ville</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="ville" class="form-control" type="text" placeholder="ex: Paris 15e" id="ville">
                        </div>
                        <label for="pays" class="col-sm-3 col-form-label">Pays</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="pays" class="form-control" type="text" placeholder="ex: France" id="pays">
                        </div>
                        <label for="tel" class="col-sm-3 col-form-label">Téléphone</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="numTelephone" class="form-control" type="tel" placeholder="ex: 0123456789" id="tel">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="titretext" style="text-align:center; margin-bottom:50px">
                            <h4><span class="glyphicon glyphicon-credit-card"></span> Paiement </h4>
                        </div> 

                        <label for="carte" class="col-sm-3 col-form-label" style="margin-bottom:0px">Type Carte</label>
                        <div class="col-sm-9" style="margin-bottom:20px; margin-top:8px">   <!--A modifier avec Bootstrap 4.3.1-->
                            <select class="custom-select mr-sm-2" name="typeCarte" id="carte">
                                <option value="visa" selected>VISA</option>
                                <option value="mastercard">MasterCard</option>
                                <option value="americanExpress">American Express</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </div>
                        <label for="numcarte" class="col-sm-3 col-form-label">Numéro de carte</label>
                        <div class="col-sm-9" style="margin-bottom:17px">
                            <input type="text" name="numCarte" class="form-control" type="tel" id="numcarte" placeholder="1234 5678 9876" maxlength="15">
                        </div>
                        <label for="nomcarte" class="col-sm-3 col-form-label">Nom sur la carte</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="nomSurCarte" class="form-control" type="text" id="nomcarte" placeholder="Nom Prénom">
                        </div>
                        <label for="expi" class="col-sm-3 col-form-label">Date Expiration</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="month" name="dateExpiration" class="form-control" id="expi" min="2020-03" value="2020-04">
                        </div>
                        <label for="code" class="col-sm-3 col-form-label">Code de Sécurité</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="text" name="codeSecurite" class="form-control" type="tel" placeholder="ex: 123" id="code" maxlength="4">
                        </div>
                        <label for="code" class="col-sm-3 col-form-label">Solde</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input type="number" name="solde" class="form-control" type="tel" placeholder="ex: 123" id="code" maxlength="4">
                        </div>
                        <label for="code" class="col-sm-3 col-form-label">Prix total : </label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <?php echo $prixtotal; ?>€
                        </div>
                    </div>
                </div>

            <div class="form-check" style="text-align:center; margin-top:50px">
                <input class="form-check-input" type="checkbox" id="check1" required>
                <label class="form-check-label" for="check1">
                    Je confirme que mes données sont valides
                </label>
            </div>  
            
            <div class="form-check" style="text-align:center">
                <input class="form-check-input" type="checkbox" id="check2" required>
                <label class="form-check-label" for="check2">
                    J'accepte les Termes et Conditions
                </label>
            </div>  
            <div style="text-align:center; margin-top:20px">
                <input type="submit" name="valider_paiement" class="btn btn-success" onclick="validate()" value="Valider mes Achats">
            </div>

            <?php
        }
        if($db_found){
            if(isset($_POST["valider_paiement"])){
                // paiement
                $typeCarte = isset($_POST["typeCarte"])? $_POST["typeCarte"] : "";
                $numCarte = isset($_POST["numCarte"])? $_POST["numCarte"] : "";
                $nomSurCarte = isset($_POST["nomSurCarte"])? $_POST["nomSurCarte"] : "";
                $dateExpiration = isset($_POST["dateExpiration"]) ? $_POST["dateExpiration"] : "";
                $codeSecurite = isset($_POST["codeSecurite"])? $_POST["codeSecurite"] : "";
                $solde = isset($_POST["solde"])? $_POST["solde"] : "";
                $total = $solde - $prixtotal;
                
                // livraison
                $idItem = isset($_POST["idItem"])? $_POST["idItem"] : "";
                $nomPrenom = isset($_POST["nomPrenom"])? $_POST["nomPrenom"] : "";
                $adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
                $ville = isset($_POST["ville"])? $_POST["ville"] : "";
                $codePostal = isset($_POST["codePostal"])? $_POST["codePostal"] : "";
                $pays = isset($_POST["pays"])? $_POST["pays"] : "";
                $numTelephone = isset($_POST["numTelephone"])? $_POST["numTelephone"] : "";
    
            if($typeCarte || $nomSurCarte || $dateExpiration || $codeSecurite){
                $sql = "SELECT * FROM paiement";
                if($idUtilisateur != ""){
                    $sql .= " WHERE idUtilisateur LIKE '%$idUtilisateur%'";
                    if($numCarte != ""){
                        $sql .=" AND numCarte LIKE '%$numCarte%' ";
                    }
                }
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) { ?>
                    <div class="titre"style="margin-top:20px">
                        <h5>
                            <span class="glyphicon glyphicon-exclamation-sign">Coordonnées déjà enregistrées</span> 
                        </h5>
                    </div>
                <?php 
                }else{
                    $sql = "INSERT INTO paiement(idUtilisateur, typeCarte, numCarte, nomSurCarte, dateExpiration, codeSecurite, solde) VALUES ('$idUtilisateur', '$typeCarte', '$numCarte','$nomSurCarte','$dateExpiration','$codeSecurite')";
                    $result = mysqli_query($db_handle, $sql);
                }
            }else{ ?>
                    <script>alert("Un champ de paiement est vide, tous les champs doivent être remplis");</script>
                <?php
                }
            

            if($idItem || $nomPrenom || $adresse || $ville || $codePostal || $pays || $numTelephone){
                $sql = "SELECT * FROM livraison";
                if($idUtilisateur != ""){
                    $sql .= " WHERE idUtilisateur LIKE '%$idUtilisateur%'";
                    if($adresse != ""){
                        $sql .=" AND adresse LIKE '%$adresse%' ";
                    }
                }
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) { ?>
                    <div class="titre"style="margin-top:20px">
                        <h5>
                            <span class="glyphicon glyphicon-exclamation-sign">Adresse deja enregistrée</span> 
                        </h5>
                    </div>
                <?php 
                }else{
                    $sql = "INSERT INTO livraison(idUtilisateur, nomPrenom, adresse, ville, codePostal, pays, numTelephone) VALUES ('$idUtilisateur','$nomPrenom','$adresse','$ville','$codePostal','$pays','$numTelephone','$total')";
                    $result = mysqli_query($db_handle, $sql);
                }
                }else{ ?>
                    <script>alert("Un champ est vide, tous les champs doivent être remplis");</script>
                <?php
            }
            if($solde>$prixtotal){
                //Quand on a payé on supprime tout le panier
                $sql = "SELECT * FROM panier";
                if($idUtilisateur != ""){
                    $sql .= " WHERE idUtilisateur LIKE '%$idUtilisateur%'";
                }
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) == 0) { 
                    echo "Panier non trouvé";
                }else{
                    while ($data = mysqli_fetch_assoc($result) ) {
                        $id_D = $data['idUtilisateur'];
                        $sql_D = "DELETE FROM panier WHERE idUtilisateur LIKE '%$id_D%'";
                        $result_D = mysqli_query($db_handle, $sql_D);
                        $id_I = $data['idsItem'];
                        $sql_I = "DELETE FROM item WHERE idItem LIKE '%$id_I%'";
                        $result_I = mysqli_query($db_handle, $sql_I);
                    }
                }
                unset($_SESSION['prixtotal']);
                header('Location: monPanier.php');
            }
        
            if($solde<$prixtotal)
            {
                ?>
                    <div class="titre"style="margin-top:20px">
                        <h5>
                            <span class="glyphicon glyphicon-exclamation-sign">Vous n'avez pas assez d'argent. Veuillez remplir votre compte</span> 
                        </h5>
                    </div>
                <?php 
            }
        }
    }else {
        echo "Database not found";
    }
?>

            </form>
        </div>
    </div>
                

</body>
</html>