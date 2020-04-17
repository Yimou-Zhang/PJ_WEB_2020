 <!DOCTYPE html>
<html lang="en">

<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="monPanier.css" rel="stylesheet" type="text/css" />
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
                    <li><a href="accueilAcheteur.php"><span class="glyphicon glyphicon-home"></span>
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
                    <li class="active"><a href="monPanier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="titre">
        <h2>
            <span class="glyphicon glyphicon-shopping-cart"></span> Mon Panier
        </h2>
    </div>

    <div class="row">
        <div class="col-sm-9">
            <div class="encadre">
                <div class="well">
                    <div class="row">
                        <div class="col-sm-3">
                        <a href="pageItem.php">
                            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%"
                                alt="Image">
                        </a>
                        </div>
                        <div class="col-sm-5">
                        <p>  <h4>Nom de l'Item : Meuble ancien Louis XVI </h4> </p>
                            <p> Catégorie : Meuble </p>
                            <p> Prix : <p> 
                            <p> <h6> Nom du Vendeur : </h6> <p>
                        </div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-1">
                            <a class="test" href="#">
                                <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"><p>Supprimer</p></span>
                            </a>
                        </div>
                    </div>
                </div>
            
                <div class="well">
                    <div class="row">
                        <div class="col-sm-3">
                        <a href="pageItem.php">
                            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%"
                                alt="Image">
                        </a>
                        </div>
                        <div class="col-sm-5">
                        <p>  <h4>Nom de l'Item : Meuble ancien Louis XVI </h4> </p>
                            <p> Catégorie : Meuble </p>
                            <p> Prix : <p> 
                            <p> <h6> Nom du Vendeur : </h6> <p>
                        </div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-1">
                            <a class="test" href="#">
                                <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"><p>Supprimer</p></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="well">
                    <div class="row">
                        <div class="col-sm-3">
                        <a href="pageItem.php">
                            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%"
                                alt="Image">
                        </a>
                        </div>
                        <div class="col-sm-5">
                        <p>  <h4>Nom de l'Item : Meuble ancien Louis XVI </h4> </p>
                            <p> Catégorie : Meuble </p>
                            <p> Prix : <p> 
                            <p> <h6> Nom du Vendeur : </h6> <p>
                        </div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-1">
                            <a class="test" href="#">
                                <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"><p>Supprimer</p></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3" style="margin-top:2.5%">
            <div class="encadre2">
                <div class="well">
                    <div class="row" style="text-align:center">
                        <h3> Prix Total : </h3>
                        <h4> 32€ </h4>
                        <a class="btn btn-success" href="validerPanier.php" role="button">Valider le Panier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
</footer>


</body>

</html>