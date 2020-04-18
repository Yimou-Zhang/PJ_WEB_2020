<!DOCTYPE html>
<html lang="en">

<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="pageItem.css" rel="stylesheet" type="text/css" />

    <style>
    .well {
    text-align: center;
    margin-left: 40%;
    margin-right: 40%;
    }
    </style>
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

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="myCarousel" class="carousel slide" data-interval="0">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="https://placehold.it/800x400?text=IMAGE" alt="Image">
                        </div>

                        <div class="item">
                            <img src="https://placehold.it/800x400?text=Another Image Maybe" alt="Image">
                        </div>

                        <div class="item">
                            <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item"
                                    src="http://www.youtube.com/embed/pYf5deeiPf4"></iframe></div>
                        </div>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--Affichage prix-->
                <div> <strong>
                        <p class="text" style="margin-top: 5px; text-align: center;"> Prix = 32€</p>
                    </strong>
                </div>
            </div>

            <!--Espace vide-->
            <div class="col-sm-1"></div>

            <!--Zone de texte-->
            <div class="col-sm-4">
                <div class="areatext" style="margin-top: 50px;">
                    <h4><p><strong>Nom de l'objet : </strong> Meuble ancien Louis XIV</p></h4>
                </div>
                <div class="areatext" style="margin-top: 40px;">
                    <p><strong>Catégorie de l'objet : </strong> Meuble</p>
                </div>
                <div class="areatext" style="margin-top: 40px;">
                    <p><strong>Descriptions : </strong> Et quoniam apud eos ut in capite mundi morborum acerbitates
                        celsius dominantur, ad quos vel sedandos omnis professio medendi torpescit, excogitatum est
                        adminiculum sospitale nequi amicum perferentem similia videat, additumque est cautionibus paucis
                        remedium aliud satis validum, ut famulos percontatum missos quem ad modum valeant noti hac
                        aegritudine colligati, non ante recipiant domum quam lavacro purgaverint corpus. ita etiam
                        alienis oculis visa metuitur labes.</p>
                </div>
            </div>
        </div>
    </div>

    <!--A MODIFIER EN PHP, mettre des conditions pour le type d'achat-->
    <div class="bouton">
        <a href="accueilAcheteur.php">
            <button type="button" class="btn btn-primary" onclick="validate()">Ajouter au Panier</button>   <!--si achat immédiat -> Ajouter au panier l'item et le supprimer pour qu'il n'apparaissent plus sur l'accueil et dans les catégories d'achat -->
            <script> function validate() {alert("Item ajouté au Panier");} </script>  <!--JavaScript-->
        </a>
        <a href="negociation.php">
            <button type="button" class="btn btn-primary">Procéder à la Négociation</button> <!-- Si item est à négocier, aller à la page negociation.php de l'item -->
        </a>
        <a href="enchere.php">
            <button type="button" class="btn btn-primary">Contribuer à l'Enchère de cet Item</button>     <!-- Si item est aux enchères, aller à la page enchere.php de l'item -->
        </a>
    </div>


    <!--Partie NEGOCIATION-->
    <!--Eventuellement rajouter une condition que le prix ne soit pas supérieur au prix déjà instauré par le vendeur -->

    <div class="well">
        <div class="titre">
            <h4>
                <p><span class="glyphicon glyphicon-piggy-bank"></span> Prix trop élevé ? </p>
            </h4>
        </div>
        <div style="margin-bottom:50px">
            <p>Négociez avec le Vendeur ! </p>
            Pour combien voudriez-vous acheter cet item ?
            <p>
            <div class="col-sm-6" style="float:left; margin-left:20%">
                <input class="form-control" type="number" value="52" name="item">
            </div>
                <div class="col-sm-3" style="float:left; margin-top:8px; text-align:left">€</div> <!--Affichage du € -->
            </p>
        </div>
        <button type="button" class="btn btn-success">Proposer ce prix au Vendeur</button>
        <button type="button" class="btn btn-danger" style="margin-top:5px">Retour</button>  <!--Ici retour à la page pageItem.php normale (sans la négociation apparente) -->
    </div>


    <!--Partie ENCHERE -->

    <div class="well">
        <div class="titre">
            <h4>
                <p><span class="glyphicon glyphicon-equalizer"></span> Enchère de l'Item </p>
            </h4>
        </div>
        <div style="margin-bottom:15px">
            <p>
                <!-- Début du compteur -->
                    <div id="test" 
                    style="border:1px solid #663300; width:200px; text-align:center; margin: 0px auto; padding:4px; -moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px;">&nbsp;</div> <!--PHP-->
                    <script type="text/JavaScript">
                    var compt=0;
                    function monCompteur() {
                        // délais d'affichage
                        var delais = 1;
                        // Element contenant l'affichage
                        var affichage=document.getElementById("test");
                        // HTML d'affichage
                        var html = "Il reste :<br /> <strong><span style=\"font-size:18pt\">[j] j </span></strong><br /><span style=\"font-size:12pt\">[h] h [m] m [s] s </span><br />pour acheter cet Item" ;
                        // HTML d'affichage si écoulé
                        var htmlafter = "L'item n'est plus en vente depuis :<br /><strong><span style=\"font-size:18pt\">[j] j </span></strong><br /><span style=\"font-size:12pt\">[h] h [m] m [s] s </span>" ;
                        var date1 = new Date(); // Date / heure actuelles
                        var date2 = new Date (2020, 4, 5, 20, 2, 53); // Date / heure de fin (janvier = 2020, 0)
                        var nbsec = (date2 - date1) / 1000;  // Nombre de secondes entre les dates
                        var nbsecj = 24 * 3600;  // Nombre de secondes
                        // Pour arrêter le compteur
                        var stopcpt=false;
                        // Si négatif alors temps écoulé
                        if (nbsec <= 0) {
                            nbsec=-nbsec;
                            if (htmlafter!="") 
                                { html=htmlafter; }
                            else
                                {stopcpt=true;}
                        }
                        var j = Math.floor (nbsec / nbsecj); // Nombre de jours restants
                        var h = Math.floor ((nbsec - (j * nbsecj)) / 3600); // Nombre d'heures restantes
                        var m = Math.floor ((nbsec - ((j * nbsecj + h * 3600))) / 60); // Nombre de minutes restantes
                        var s = Math.floor (nbsec - ((j * nbsecj + h * 3600 + m * 60))); // Nombre de secondes restantes
                        // Remise à zéro
                        if (stopcpt==true) {j=0;h=0;m=0;s=0}
                        // Modification du HTML à afficher
                        var html = html.replace("[j]",j);
                        var html = html.replace("[h]",h);
                        var html = html.replace("[m]",m);
                        var html = html.replace("[s]",s);
                        // Affichage
                        if (affichage!=null) {affichage.innerHTML = html;}
                        // Relance du compteur dans x millisecondes
                        if (stopcpt==false) {compt=setTimeout ("monCompteur();", 1*1000);}
                    }
                    monCompteur();
                    </script>
                    <!-- Fin du compteur -->
            </p>
            <p><strong>Enchère actuelle : </strong></p>
            <p>Je souhaite surenchérir de
            <div class="col-sm-6" style="float:left; margin-left:20%">
                <input class="form-control" type="number" value="52" name="item">
            </div>
                <div class="col-sm-3" style="float:left; margin-top:8px; text-align:left">€</div> <!--Affichage du € -->
            </p>
            <button type="button" class="btn btn-success" style="margin-top:15px">Surenchérir</button>
            <button type="button" class="btn btn-danger" style="margin-top:15px">Retour</button>
        </div>
    </div>






    <!--
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>
    -->

</body>

</html>