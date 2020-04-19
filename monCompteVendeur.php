<?php
    session_start();
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
    <link href="monCompte.css" rel="stylesheet" type="text/css" />

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
                    <li class="active"><a href="accueilVendeur.php"><span class="glyphicon glyphicon-home"></span>
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
                    <li><a href="ajouterItem.php"><span class="glyphicon glyphicon-plus"></span> Ajouter Item</a></li>
                    <li><a href="monCompteVendeur.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Boutons se déconnecter et s'identifier vendeur-->
    <div class="bouton" style="float:right; margin-right: 15px; margin-top:5px">
        <a class="btn btn-danger" href="testing1.php" role="button">Se déconnecter</a>
    </div>
    
    <div class="bouton" style="float:right; margin-right: 15px; margin-top:5px">
        <a class="btn btn-primary" href="testing1.php" role="button">S'identifier en tant qu'acheteur</a>
    </div>

    <!--Titre avec photo-->
    <div class="titre">
        <h2>
        <img src="<?php echo $_SESSION['photo'] ?>" class="img-circle" width="20%"> 
        <span class="glyphicon glyphicon-user"></span> Mon Compte
        </h2>
    </div>
    
    <!--Formulaire-->
    <div class="well">
        <form>
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['nom'] ?>" id="nom" readonly> <!-- Affichage du nom -->
                </div>
            </div>
            <div class="form-group row">
                <label for="prénom" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['prenom'] ?>" id="prénom" readonly><!-- Affichage du prenom -->
                </div>
            </div>
            <div class="form-group row">
                <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['pseudo'] ?>" id="pseudo" readonly><!-- Affichage du pseudo -->
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="<?php echo $_SESSION['email'] ?>" readonly><!-- Affichage du email -->
                </div>
            </div>

            <div class="form-group row">
                <label for="fonction" class="col-sm-2 col-form-label">Fonction</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['fonction'] ?>" id="fonction" readonly><!-- Affichage de fonction -->
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" id="inputPassword" style="margin-left: 15px;" placeholder="<?php echo $_SESSION['password'] ?>" readonly><!-- Affichage du mdp -->
                </div>
            </div>
            <div class="bouton">
                <a class="btn btn-primary" href="monCompteModifVendeur.php" role="button"><strong>Modifier profil</strong></a>
            </div>
        </form>
    </div>

    <!--Footer-->
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>

</body>

</html>