<?php
    session_start();
         
    if(isset($_POST["confirm_modif"])){
        $t_email = $_SESSION['email'];         
        $fonction = $_SESSION['fonction'];
        $nom = isset($_POST["nom"])? $_POST["nom"] : "";
        $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
        $email = isset($_POST["email"])? $_POST["email"] : "";
        $password = isset($_POST["password"])? $_POST["password"] : "";
        $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
        $photo = isset($_FILES["photo"]['name'])? $_FILES["photo"]['name'] : "";//Utilisation de $_FILES : pour copier un fichier image
        $database = "projet";
        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
        $db_found = mysqli_select_db($db_handle, $database);
        if($nom || $prenom || $email || $password || $pseudo || $photo ){
            if($db_found){
                $sql = "SELECT * FROM utilisateur";
                if ($email != "") {
                    $sql .= " WHERE email LIKE '%$email%'";
                }
                $result = mysqli_query($db_handle, $sql);

                if (mysqli_num_rows($result) != 0) {
                    echo "Email déjà existante";
                }else {    
                    $sql = "SELECT * FROM utilisateur";
                    if ($email != "") {
                        $sql .= " WHERE email LIKE '%$t_email%'";
                    }
                    $result = mysqli_query($db_handle, $sql);

                    if (mysqli_num_rows($result) == 0) {
                        echo "Personne non existante";
                    }else {
                        while($data = mysqli_fetch_assoc($result)){ 
                            $idUt = $data['idUtilisateur']; 
                        }
                        $sql = "UPDATE utilisateur SET nom = '$nom' , 
                        prenom = '$prenom' , 
                        email = '$email' ,
                        motDePasse = '$password' , 
                        pseudo = '$pseudo' , photoProfil = '$photo' , 
                        type = '$fonction'
                        WHERE idUtilisateur = '$idUt'";
                        $result = mysqli_query($db_handle, $sql);//On enregistre
                        $_SESSION['nom'] = $nom;
                        $_SESSION['prenom'] = $prenom;   
                        $_SESSION['email'] = $email;
                        $_SESSION['pseudo'] = $pseudo;
                        $_SESSION['photo'] = $photo;
                        $_SESSION['fonction'] = $fonction;
                        $_SESSION['password'] = $password;    
                    }
                }  
            }
        }else {
            echo "Champs non rempli";
        } 
        header('Location:monCompte.php');

    }               
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
    <script type="text/javascript">
    function popup() {
        alert("Modifications enregistrées !");

    }
    </script>
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
    <?php
}
if($_SESSION['fonction'] == 'vendeur'){
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
    <?php
    }
    ?>
    <div class="titre">
        <h2>
        <img src="<?php echo $_SESSION['photo'] ?>" class="img-circle" width="20%"> 
        <span class="glyphicon glyphicon-user"></span> Modifier mon compte
        </h2>
    </div>
    <div class="well">
        <form action="monCompteModif.php" method="post" class="contain" enctype='multipart/form-data' >
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['nom'] ?>" name="nom">
                </div>
            </div>
            <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['prenom'] ;?>" name="prenom">
                </div>
            </div>
            <div class="form-group row">
                <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['pseudo'] ;?>" name="pseudo">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" placeholder="<?php echo $_SESSION['email'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" style="margin-left: 15px;" name="password" placeholder="<?php echo $_SESSION['password']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label"><p>Confirmer</p>password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" style="margin-left: 15px;" name="password" placeholder="<?php echo $_SESSION['password'] ;?>">
                </div>
            </div>
            <div class="bouton">
                <a class="btn btn-primary" role="button">
                    <label class="custom-file-label" for="customFile">Modifier photo de profil</label>
                    <input type="file" class="custom-file-input" name="photo">
                </a>
                <input type="submit" class="btn btn-primary" name="confirm_modif" value="Valider les informations" onclick="popup()" >
            </div>
        </form>
    </div>
    <!--Footer-->
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>
</body>

</html>

