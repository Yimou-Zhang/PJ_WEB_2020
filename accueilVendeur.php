<!DOCTYPE html>
<html lang="en">

<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="accueilAcheteur.css" rel="stylesheet" type="text/css" />

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
                <a href="accueilVendeur.php">
                    <img class="navbar-brand" src="couverture.png">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueilVendeur.php"><span class="glyphicon glyphicon-home"></span>
                            Accueil</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Catégories</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="categorieItem.php?cate=Meubles">Meubles</a><br>
                            <a class="dropdown-item" href="categorieItem.php?cate=Tableaux">Tableaux</a><br>
                            <a class="dropdown-item" href="categorieItem.php?cate=Bijoux">Bijoux</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="ajouterItem.php"><span class="glyphicon glyphicon-plus"></span> Ajouter/Supprimer Item</a></li>
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!--Galerie d'images-->
    <div class="container text-center">
        <h3>Mes items en ligne</h3><br>
        <div class="row">
            <div class="col-sm-3">
                <a href="pageItem.php">
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    <div style="float:left">
                        Nom Item
                    </div>
                    <div style="float:right">
                        Prix
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="pageItem.php">
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    <div style="float:left">
                        Nom Item
                    </div>
                    <div style="float:right">
                        Prix
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="pageItem.php">
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    <div style="float:left">
                        Nom Item
                    </div>
                    <div style="float:right">
                        Prix
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="pageItem.php">
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    <div style="float:left">
                        Nom Item
                    </div>
                    <div style="float:right">
                        Prix
                    </div>
                </a>
            </div>
        </div>
    </div><br>

<!--
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>-->
</body>

</html>