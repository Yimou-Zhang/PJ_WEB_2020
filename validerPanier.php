<?php 
    session_start();

    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

?>

    

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Accueil</title>
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
<?php
        if($db_found){
        if(isset($_POST["valider_paiement"])){
            // paiement
            $idUtilisateur = isset($_POST["idUtilisateur"])? $_POST["idUtilisateur"] : "";
            $typeCarte = isset($_POST["typeCarte"])? $_POST["typeCarte"] : "";
            $nomSurCarte = isset($_POST["nomSurCarte"])? $_POST["nomSurCarte"] : "";
            $dateExpiration = isset($_POST["dateExpiration"]) ? $_POST["dateExpiration"] : "";
            $codeSecurite = isset($_POST["codeSecurite"])? $_POST["codeSecurite"] : "";

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
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) { ?>
                    <div class="titre"style="margin-top:20px">
                        <h5>
                            <span class="glyphicon glyphicon-exclamation-sign"></span> L'email rentré n'existe pas
                        </h5>
                    </div>
                <?php 
                }else{
                    $sql = "INSERT INTO paiement(idUTilisateur, typeCarte, nomSurCarte, dateExpiration, codeSecurite) VALUES ('$idUtilisateur','$typeCarte','$nomSurCarte','$dateExpiration','$codeSecurite')";
                    $result = mysqli_query($db_handle, $sql);
                }
                }else{ ?>
                    <script>alert("Un champ est vide, tous les champs doivent être remplis");</script>
                <?php
                }
            }

            if($idItem || $nomPrenom || $adresse || $ville || $codePostal || $pays || $numTelephone){
                $sql = "SELECT * FROM livraison";
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) != 0) { ?>
                    <div class="titre"style="margin-top:20px">
                        <h5>
                            <span class="glyphicon glyphicon-exclamation-sign"></span> L'email rentré n'existe pas
                        </h5>
                    </div>
                <?php 
                }else{
                    $sql = "INSERT INTO paiement(idUTilisateur, typeCarte, nomSurCarte, dateExpiration, codeSecurite) VALUES ('$idUtilisateur','$typeCarte','$nomSurCarte','$dateExpiration','$codeSecurite')";
                    $result = mysqli_query($db_handle, $sql);
                }
                }else{ ?>
                    <script>alert("Un champ est vide, tous les champs doivent être remplis");</script>
                <?php
                }
            }

        }
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
                <a class="navbar-brand" href="accueilAcheteur.php">Ebay ECE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="accueilAcheteur.php"><span class="glyphicon glyphicon-home"></span>
                            Accueil</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Catégories d'Items</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="categorieItem.php"> Meubles</a><br>
                            <a class="dropdown-item" href="categorieItem.php"> Tableaux</a><br>
                            <a class="dropdown-item" href="categorieItem.php"> Bijouterie</a>
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

    <!--A modifier avec Bootstrap 4.3.1, ajouter couleur rouge lorsque pas rempli et vert lorsque rempli-->
    <div class="formu">
        <div class="well">
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="titretext" style="text-align:center; margin-bottom:50px">
                            <h4><span class="glyphicon glyphicon-road"></span> Livraison </h4>
                        </div>    
                        <label for="dest" class="col-sm-3">Destinataire</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input class="form-control" type="text" placeholder="Nom Prénom" id="dest" required>
                        </div>
                        <label for="adresse" class="col-sm-3">Adresse</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input class="form-control" type="text" placeholder="ex: 25 rue Danton" id="adresse" required>
                        </div>
                        
                        <label for="postal" class="col-sm-3 col-form-label" style="margin-bottom:0px">Code Postal</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                              <input class="form-control" type="tel" placeholder="ex: 75015" id="postal" maxlength="5">
                        </div>
                        
                        <label for="ville" class="col-sm-3">Ville</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input class="form-control" type="text" placeholder="ex: Paris 15e" id="ville">
                        </div>
                        <label for="pays" class="col-sm-3 col-form-label">Pays</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input class="form-control" type="text" placeholder="ex: France" id="pays">
                        </div>
                        <label for="tel" class="col-sm-3 col-form-label">Téléphone</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input class="form-control" type="tel" placeholder="ex: 0123456789" id="tel">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="titretext" style="text-align:center; margin-bottom:50px">
                            <h4><span class="glyphicon glyphicon-credit-card"></span> Paiement </h4>
                        </div> 

                        <label for="carte" class="col-sm-3 col-form-label" style="margin-bottom:0px">Type Carte</label>
                        <div class="col-sm-9" style="margin-bottom:20px; margin-top:8px">   <!--A modifier avec Bootstrap 4.3.1-->
                            <select class="custom-select mr-sm-2" id="carte">
                                <option selected>VISA</option>
                                <option value="1">MasterCard</option>
                                <option value="2">American Express</option>
                                <option value="3">PayPal</option>
                            </select>
                        </div>
                        <label for="numcarte" class="col-sm-3 col-form-label">Numéro de carte</label>
                        <div class="col-sm-9" style="margin-bottom:17px">
                            <input class="form-control" type="tel" id="numcarte" placeholder="1234 5678 9876" maxlength="15">
                        </div>
                        <label for="nomcarte" class="col-sm-3 col-form-label">Nom sur la carte</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input class="form-control" type="text" id="nomcarte" placeholder="Nom Prénom">
                        </div>
                        <label for="expi" class="col-sm-3 col-form-label">Date Expiration</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input class="form-control" type="month" id="expi" min="2020-03" value="2020-04">
                        </div>
                        <label for="code" class="col-sm-3 col-form-label">Code de Sécurité</label>
                        <div class="col-sm-9" style="margin-bottom:15px">
                            <input class="form-control" type="tel" placeholder="ex: 123" id="code" maxlength="4">
                        </div>
                    </div>
                </div>
            </form>

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
            <a class="btn btn-success" onclick="validate()" role="button" value="Submit">Valider mes Achats</a>
            </div>
        </div>
    </div>
    
</body>
</html>