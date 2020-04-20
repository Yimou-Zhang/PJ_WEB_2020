<?php 
    session_start();
    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    $idUser = $_SESSION['idUser'];

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
<?php //On affiche tous les photos des items 
    $sql = "SELECT * FROM item WHERE idUtilisateur LIKE '%$idUser'";
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo "ITEM NON TROUVE ???";
    } else {             
        while($data = mysqli_fetch_assoc($result)){ 
            $idItem = $data['idItem'];
            ?> 
            <div class="col-sm-3">
                    <a href='pageItem.php?idItem=<?php echo $idItem; ?>'><img src="<?php echo $data['photos']; ?>" class="img-responsive" style="width:100%" alt="Image" ></a>
                            <div style="float:left">
                                Nom: <?php echo $data['nom']; ?>
                            </div>
                            <div style="float:right">
                                Prix: <?php echo $data['prix']; ?>
                            </div>
            </div>
<?php
        }
    }
}
?> 

        </div>
    </div><br> 

<!--
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>-->
</body>

</html>