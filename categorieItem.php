<?php
    session_start();
    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    $categorie = isset($_GET["cate"])? $_GET["cate"] : "";
    if($categorie != "Meubles" && $categorie != "Tableaux" && $categorie != "Bijoux")
    {
        echo "Tu oses ?";
    }
    if($db_found){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Catégorie Item</title>
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
                <?php 
                if($_SESSION['fonction'] == 'acheteur'){ //Affichage de l'accueil seulement si l'utilisateur est l'acheteur
                ?>
                    <a class="navbar-brand" href="accueilAcheteur.php">Ebay ECE</a>
                <?php 
                }
                if($_SESSION['fonction'] == 'vendeur'){ //Affichage de l'accueil seulement si l'utilisateur est vendeur
                ?> 
                    <a class="navbar-brand" href="accueilVendeur.php">Ebay ECE</a>
                <?php 
                }
                if($_SESSION['fonction'] == 'administrateur'){ //Affichage de l'accueil seulement si l'utilisateur est l'administrateur
                ?>
                    <a class="navbar-brand" href="accueilAcheteur.php">Ebay ECE</a>
                <?php   
                }
                ?>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                
                <li>
                <?php 
                if($_SESSION['fonction'] == 'acheteur'){ //Affichage de l'accueil seulement si l'utilisateur est l'acheteur
                ?>
                    <a href="accueilAcheteur.php"><span class="glyphicon glyphicon-home"></span>Accueil</a>   
                <?php 
                }
                if($_SESSION['fonction'] == 'vendeur'){ //Affichage de l'accueil seulement si l'utilisateur est vendeur
                ?> 
                    <a href="accueilVendeur.php"><span class="glyphicon glyphicon-home"></span>Accueil</a>
                <?php 
                }
                if($_SESSION['fonction'] == 'administrateur'){ //Affichage de l'accueil seulement si l'utilisateur est l'administrateur
                ?>
                    <a href="accueilAcheteur.php"><span class="glyphicon glyphicon-home"></span>Accueil</a>
                <?php   
                }
                ?>
                </li>           
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Catégories d'Items</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="categorieItem.php?cate=Meubles"> Meubles</a><br>
                            <a class="dropdown-item" href="categorieItem.php?cate=Tableaux"> Tableaux</a><br>
                            <a class="dropdown-item" href="categorieItem.php?cate=Bijoux"> Bijouterie</a>
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
                <?php 
                if($_SESSION['fonction'] == 'acheteur'){ //Affichage de l'accueil seulement si l'utilisateur est l'acheteur
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="monPanier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
                <?php }
                if($_SESSION['fonction'] == 'administrateur'){ //Affichage de l'accueil seulement si l'utilisateur est l'admin
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="ajouterItem.php"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter/Supprimer Item</a></li>
                    <li><a href="Admin_supp_ajoute.php"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter/Supprimer Vendeur</a></li>
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
                <?php
                }
                if($_SESSION['fonction'] == 'vendeur'){//Affichage de l'accueil de vendeur
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="ajouterItem.php"><span class="glyphicon glyphicon-plus"></span> Ajouter/Supprimer Item</a></li>
                    <li><a href="monCompte.php"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>

    <!--Galerie d'images-->
    <div class="container text-center">
        <h3>Items de la Catégorie : </h3><br>  <!--Ajouter nom de la catégorie-->
        <div class="row">
        <?php
            $sql = "SELECT * FROM item WHERE categorie LIKE '%$categorie%'";
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
            ?>
            
        </div>
    </div><br>

<!--
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>-->
</body>

</html>

<?php
    }
?>