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
    <?php 
        if($_SESSION['fonction'] == 'acheteur'){ //Affichage de l'accueil seulement si l'utilisateur est l'acheteur
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
                    <li><a href="monPanier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
                    <li class="active"><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Bouton s'identifier vendeur et se déconnecter-->
    <div class="bouton" style="float:right; margin-right: 15px; margin-top:5px">
        <a class="btn btn-danger" href="connexion.php" role="button">Se déconnecter</a>
    </div>
    <div class="bouton" style="float:right; margin-right: 15px; margin-top:5px">
        <a class="btn btn-primary" href="inscription.php" role="button">S'identifier en tant que vendeur</a>
    </div>
    
    <!--PHP fin de la condition-->
    <?php
        }
        if($_SESSION['fonction'] == 'vendeur'){ //Vendeur 
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
                            <a class="dropdown-item" href="categorieItem.php">Meubles</a><br>
                            <a class="dropdown-item" href="categorieItem.php">Tableaux</a><br>
                            <a class="dropdown-item" href="categorieItem.php">Bijouterie</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="ajouterItem.php"><span class="glyphicon glyphicon-plus"></span> Ajouter/Supprimer Item</a></li>
                    <li class="active"><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Boutons se déconnecter et s'identifier vendeur-->
    <div class="bouton" style="float:right; margin-right: 15px; margin-top:5px">
        <a class="btn btn-danger" href="connexion.php" role="button">Se déconnecter</a>
    </div>
    
    <div class="bouton" style="float:right; margin-right: 15px; margin-top:5px">
        <a class="btn btn-primary" href="inscription.php" role="button">S'identifier en tant qu'acheteur</a>
    </div>

    <?php }
        if($_SESSION['fonction'] == 'administrateur'){ //Affichage de l'accueil seulement si l'utilisateur est l'admin
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
                    <li><a href="ajouterItem.php"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter/Supprimer Item</a></li>
                    <li><a href="Admin_supp_ajoute.php"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter/Supprimer Vendeur</a></li>
                    <li class="active"><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Boutons se déconnecter et s'identifier vendeur-->
    <div class="bouton" style="float:right; margin-right: 15px; margin-top:5px">
        <a class="btn btn-danger" href="connexion.php" role="button">Se déconnecter</a>
    </div>
    
    <div class="bouton" style="float:right; margin-right: 15px; margin-top:5px">
        <a class="btn btn-primary" href="inscription.php" role="button">S'identifier en tant qu'acheteur ou vendeur</a>
    </div>

    <?php 
        }
    ?>

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
                    <input class="form-control" type="text" value="<?php echo $_SESSION['nom'] ?>" name="nom" readonly> <!-- Affichage du nom -->
                </div>
            </div>
            <div class="form-group row">
                <label for="prénom" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?php echo $_SESSION['prenom'] ?>" name="prénom" readonly><!-- Affichage du prenom -->
                </div>
            </div>
            <div class="form-group row">
                <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?php echo $_SESSION['pseudo'] ?>" name="pseudo" readonly><!-- Affichage du pseudo -->
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email"
                        value="<?php echo $_SESSION['email'] ?>" readonly><!-- Affichage de l'email -->
                </div>
            </div>

            <div class="form-group row">
                <label for="fonction" class="col-sm-2 col-form-label">Fonction</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?php echo $_SESSION['fonction'] ?>" name="fonction" readonly><!-- Affichage de fonction -->
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password" style="margin-left: 15px;" value="<?php echo $_SESSION['password'] ?>" readonly><!-- Affichage du mdp -->
                </div>
            </div>
            <div class="bouton">
                <a class="btn btn-primary" href="monCompteModif.php" role="button"><strong>Modifier profil</strong></a>
            </div>
        </form>
    </div>

    <!--Footer-->
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>

</body>

</html>