<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mon Panier</title>
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

    <div class="titre">
        <h2>
            <span class="glyphicon glyphicon-shopping-cart"></span> Mon Panier
        </h2>
    </div>

    <?php 
    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    $idUser = $_SESSION['idUser'];
    if($db_found){
        if(isset($_POST["oui_supprime"])){
            $nom_I = isset($_POST["nom_I"])? $_POST["nom_I"] : "";
        
            if($nom_I){ 
                $sql = 0;
            if ($nom_I != "") {
                $sql =" SELECT * FROM item WHERE nom LIKE '%$nom_I%'";
            }
            $result_a = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result_a) == 0){
                echo "Item non trouvé"; 
            }else {
                while ($data = mysqli_fetch_assoc($result_a)){
                    $id_Item = $data['idItem'];
                    $sql_D = "SELECT * FROM panier WHERE idsItem LIKE '%$id_Item%' AND idUtilisateur LIKE '%$idUser%'";
                    $result_D = mysqli_query($db_handle, $sql_D);
                    if (mysqli_num_rows($result_D) == 0) {
                        echo "Item non trouvé"; 
                    }else {
                        while ($data = mysqli_fetch_assoc($result_D) ) {
                        $sql = "DELETE FROM panier ";
                        $sql .= " WHERE idsItem = $id_Item";
                        $sql .= " AND idUtilisateur = $idUser";
                        $result = mysqli_query($db_handle, $sql); 
                        }
                    }
                }
            }
            } else {
                echo "Champs non remplis";
            }
        }
        ?>
                        
    <div class="row">
        <div class="col-sm-9">
            <div class="encadre">
             <?php
                            $prixtotal = 0;
                            $sql = "SELECT * FROM panier";
                            if($idUser != ""){
                                $sql .= " WHERE idUtilisateur LIKE '%$idUser%'";
                            }
                            $result = mysqli_query($db_handle, $sql);
                            if (mysqli_num_rows($result) == 0) {
                                ?>
                                    <div class="aucun">
                                        <h3>
                                            <span class="glyphicon glyphicon-exclamation-sign"> Aucun item dans le Panier</span> 
                                        </h3>
                                    </div>
                                <?php 
                            } else {
                                while($data = mysqli_fetch_assoc($result)){ 
                                    $idItem = $data['idsItem'];
                                    $sql_I = "SELECT * FROM item";
                                    if($idItem != ""){
                                        $sql_I .= " WHERE idItem LIKE '%$idItem%'";
                                    }
                                    $result_I = mysqli_query($db_handle, $sql_I);
                                    if (mysqli_num_rows($result_I) == 0) {
                                        ?>
                                            <div class="titre"style="margin-top:20px">
                                                <h5>
                                                    <span class="glyphicon glyphicon-exclamation-sign">Ce Vendeur n'existe pas</span> 
                                                </h5>
                                            </div>
                                        <?php 
                                    } else {
                                        while($data = mysqli_fetch_assoc($result_I)){ 
                                            $prixtotal = $prixtotal + $data['prix'];
                ?>
                <div class="well">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href='pageItem.php?idItem=<?php echo $idItem; ?>'><img src="<?php echo $data['photos']; ?>" class="img-responsive" style="width:100%" alt="Image" ></a>
                        </div>
                        <div class="col-sm-5">
                            <p>  <h4>Nom de l'Item :<?php echo $data['nom'];?> </h4> </p>
                            <p> Catégorie : <?php echo $data['categorie']; ?></p>
                            <p> Prix : <?php echo $data['prix']; ?>€<p> 
                        <?php
                                        $id_vendeur = $data['idUtilisateur'];
                                        $sql_V = "SELECT * FROM utilisateur WHERE idUtilisateur LIKE '%$id_vendeur%'";
                                        $result_V =mysqli_query($db_handle, $sql_V);
                                        if (mysqli_num_rows($result_V) == 0) {
                                            echo "Cette personne n'existe pas";
                                        } else {
                                            while($data = mysqli_fetch_assoc($result_V)){ 
                        ?>
                            <p> <h6> Nom du Vendeur : <?php echo $data['nom']; ?> <?php echo $data['prenom']; ?> </h6> <p>
                        </div>
                        <div class="col-sm-3"></div>    
                        <div class="col-sm-1">
                        <form action="monPanier.php" method="post" enctype='multipart/form-data'>
                                <input type="submit" name="supprimer"  class="glyphicon glyphicon-remove-sign" aria-hidden="true" value="Supprime">
                        </form>
                        </div>

                    </div>
                </div>
        <?php
                                            }
                                        }
                                    }
                                } 
                              }
                            }
        ?>

            </div>
        </div> 
                                      
        <div class="col-sm-3" style="margin-top:2.5%">
            <div class="encadre2">
                <div class="well">
                    <div class="row" style="text-align:center">
                        <h3> Prix Total : </h3>
                        <h4> <?php echo $prixtotal; ?>€ </h4> <!--Affichage du prix total -->
                        <form action="validerPanier.php" method="post" enctype='multipart/form-data'>
                            <input type="hidden" name="prixtotal" value="<?php echo $prixtotal; ?>">
                            <input type="submit" name="valider" class="btn btn-success" value="Valider le Panier">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<?php
         if(isset($_POST["supprimer"])){
            ?>
                <form action="monPanier.php" method="post" enctype='multipart/form-data'>
                                <input type="text" name="nom_I">
                                <input type="submit" name="oui_supprime" value="Confirmer">
                        </form>
            <?php
         }


    }
                                  
?>
<!--
<footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
</footer>
-->

</body>

</html>