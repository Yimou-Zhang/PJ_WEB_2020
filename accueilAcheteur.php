<?php 
    session_start();
    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);

    if($db_found){
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
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

<form action="pageItem.php" method="post" class="contain" enctype='multipart/form-data'> <!-- Formulaire qui permet de passer a la pageItem.php-->

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
                    <img src="https://placehold.it/1200x400?text=IMAGE" alt="Image">
                    <div class="carousel-caption">
                        <h4>Item à la Une</h4>
                        <p>Prix spéciaux</p>
                    </div>
            </div>

<?php //On affiche les photos des items avec une limite de 3 d'affichage
    $sql = "SELECT * FROM item LIMIT 3";
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo "ITEM NON TROUVE ???";
    } else {             
        while($data = mysqli_fetch_assoc($result)){ 
?> 
            <div class="item"> 
                <input type="hidden" name="idItem" value="<?php echo $data['idItem']; ?>"> <!-- Champs caché afin d'envoyé l'id de cette item-->
                <input type="image" src="<?php echo $data['photos']; ?>"  alt="Image">
                <div class="carousel-caption">  
                    <h3>Item à la Une</h3>
                    <p>Prix spéciaux</p>
                </div>
            </div>
<?php
        }
    }
?>            
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

<?php //On affiche tous les photos des items 
    $sql = "SELECT * FROM item";
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo "ITEM NON TROUVE ???";
    } else {             
        while($data = mysqli_fetch_assoc($result)){ 
?> 
            <div class="col-sm-3">
            <input type="hidden" name="idItem" value="<?php echo $data['idItem']; ?>"> <!-- Champs caché afin d'envoyé l'id de cette item-->
            <input type="image" src="<?php echo $data['photos']; ?>" class="img-responsive" style="width:100%" alt="Image">
                    <div style="float:left">
                        Nom Item
                    </div>
                    <div style="float:right">
                        Prix
                    </div>
            </div>
<?php
        }
    }
}
?> 

        </div>
    </div><br> 
</form> <!-- Fin du formulaire pour envoyer les informations à la pageItem.php -->

    <!--Footer-->
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>

</body>

</html>