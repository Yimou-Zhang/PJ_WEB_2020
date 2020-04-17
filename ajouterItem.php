<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ajouter Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="ajouterItem.css" rel="stylesheet" type="text/css" />


<!--Partie JavaScript-->
<script>
        function validate() {
            testEmpty();
        }
    
    function testEmpty() {
        if ((document.getElementById("nom").value ==='') ||
            (document.getElementById("description").value ==='') ||
            (document.getElementById("mesphotos").value ==='') ||
            (document.getElementById("vente").value ==='') ||
            (document.getElementById("prix").value ==='')) {    
                alert("Veuillez remplir tous les champs s'il-vous-plaît <br> (Vidéo optionnelle)"); }
        else { window.location="accueilVendeur.php";}    
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
                    <li><a href="accueilVendeur.php"><span class="glyphicon glyphicon-home"></span>
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
                    <li class="active"><a href="ajouterItem.php"><span class="glyphicon glyphicon-plus"></span> Ajouter
                            Item</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="titre">
        <h2>
            <span class="glyphicon glyphicon-ok-circle"></span> Ajouter un Item
        </h2>
    </div>

    <div class="well">
        <form>
            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">Nom de l'Item</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="#" id="nom">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" rows="4"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="mesphotos" class="col-sm-2 col-form-label">Photos</label>
                <div class="col-sm-10">
                    <input type="file" class="custom-file-input" id="mesphotos" multiple="multiple">
                    <!--Choix d'une ou plrs photos-->
                    <label class="custom-file-label" for="mesphotos"></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="mavideo" class="col-sm-2 col-form-label">Vidéo</label>
                <!--Choix d'une seule vidéo-->
                <div class="col-sm-10">
                    <input type="file" class="custom-file-input" id="mavideo">
                    <!--Choix d'une ou plrs photos-->
                    <label class="custom-file-label" for="mavideo"></label>
                </div>
            </div>

            <div class="form-group row">
                <label for="vente" class="col-sm-2 col-form-label">Type de Vente</label>
                <div class="col-sm-10">
                    <select class="form-control" id="vente">
                        <option selected>Vente Immédiate</option>
                        <option>Enchère</option>
                        <option>Négociation</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="prix" class="col-sm-2 col-form-label">Prix de vente</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" placeholder="#" id="prix">
                </div>
            </div>

            <div class="bouton">
                <a class="btn btn-success" onclick="validate()" role="button" value="Submit">Ajouter l'Item</a>
            </div>
        </form>
    </div>

</body>

</html>