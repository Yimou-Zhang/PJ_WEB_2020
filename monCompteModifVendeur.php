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

    <div class="titre">
        <h2>
        <img src="https://placehold.it/1200x400?text=IMAGE" class="img-circle" width="20%"> 
        <span class="glyphicon glyphicon-user"></span> Modifier mon compte
        </h2>
    </div>
    

    <div class="well">
        <form>
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ici nom" id="nom">
                </div>
            </div>
            <div class="form-group row">
                <label for="prénom" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ici prénom" id="prénom">
                </div>
            </div>
            <div class="form-group row">
                <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="Ici pseudo" id="pseudo">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" style="margin-left: 15px;" id="inputPassword" placeholder="XXXX">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><p>Confirmer</p>password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" style="margin-left: 15px;" id="inputPassword" placeholder="XXXX">
                </div>
            </div>

            <div class="bouton">
                <a class="btn btn-primary" role="button">
                    <label class="custom-file-label" for="customFile">Modifier photo de profil</label>
                    <input type="file" class="custom-file-input" id="customFile">
                </a>
                <a class="btn btn-primary" href="monCompteVendeur.php" role="button" onclick="popup()"><strong>Valider les informations</strong></a>
            </div>
        </form>
    </div>

    <!--Footer-->
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>
</body>

</html>