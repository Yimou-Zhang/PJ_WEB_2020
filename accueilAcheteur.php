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
                <a class="navbar-brand" href="accueilAcheteur.php">Ebay ECE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="accueilAcheteur.php"><span class="glyphicon glyphicon-home"></span>
                            Accueil</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Catégories</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"> Meubles</a><br>
                            <a class="dropdown-item" href="#"> Tableaux</a><br>
                            <a class="dropdown-item" href="#"> Bijouterie</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="monPanier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
                    <li><a href="monCompte.html"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul> 
            </div>
        </div>
    </nav>

    <!--Carousel (défilement image)-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicateurs -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!--Type de slides du carousel-->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="pageItem.html">
                    <img src="https://placehold.it/1200x400?text=IMAGE" alt="Image">
                    <div class="carousel-caption">
                        <h4>Item à la Une</h4>
                        <p>Prix spéciaux</p>
                </div>
                </a>
            </div>

            <div class="item">
                <a href="pageItem.html">
                <img src="https://placehold.it/1200x400?text=Another Image Maybe" alt="Image">
                <div class="carousel-caption">
                    <h3>Item à la Une</h3>
                    <p>Prix spéciaux</p>
                </div>
                </a>
            </div>

            <div class="item">
                <a href="pageItem.html">
                <img src="https://placehold.it/1200x400?text=IMAGE" alt="Image">
                <div class="carousel-caption">
                    <h3>Item à la Une</h3>
                    <p>Prix spéciaux</p>
                </div>
            </a>
            </div>

            <div class="item">
                <a href="pageItem.html">
                <img src="https://placehold.it/1200x400?text=IMAGE" alt="Image">
                <div class="carousel-caption">
                    <h3>Item à la Une</h3>
                    <p>Prix spéciaux</p>
                </div>
                </a>
            </div>

        </div>

        <!-- Changer de page carousel -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--Galerie d'images-->
    <div class="container text-center">
        <h3>Items proposés</h3><br>
        <div class="row">
            <div class="col-sm-3">
                <a href="pageItem.html">
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    <p>Item 1 32€</p>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="pageItem.html">
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    <p>Item 1 32€</p>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="pageItem.html">
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    <p>Item 1 32€</p>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="pageItem.html">
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    <p>Item 1 32€</p>
                </a>
            </div>
        </div>
    </div><br>

    <!--Footer-->
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>

</body>

</html>