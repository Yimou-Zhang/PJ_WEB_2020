<!DOCTYPE html>
<html>

<head>
    <title>S'identifier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--Partie CSS-->
    <style>
        .conteneur {
            display: flex;
            height: 800px;
            justify-content: center;
            align-items: center;
        }
        .contain {
            background-color: white;
            border: solid ;
            padding :50px;
        }
        .container {
            width: 100%;
            color: whitesmoke;
        }

        body{
            background-image: url(bois.png);
            background-repeat: repeat;
        }

        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        footer {
            padding: 0px;
            margin-top: 0px;
            border-top: 0px;
            color: white;
            background-color: rgb(34, 31, 31);
            position:absolute;
            bottom:0;
            width: 100%;
        }
        .titre {
            margin:auto;
            display: block;
            text-align: center;
            margin-top: 60px;
            color: whitesmoke;
        }

        .well {
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            margin-bottom: 70px;
        }
    </style>
</head>

<body>
    

<!--Titre-->
<div class="titre">
        <h2>
        <span class="glyphicon glyphicon-user"></span> S'identifier
        </h2>
    </div>
    
    <!--Formulaire-->
    <div class="well">
        <form action="connect_inscrip_back.php" method="post"  enctype='multipart/form-data' >
            <div class="form-group row" style="margin-top:20px">
                <label for="pseudo" class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="pseudo" name="nom">
                </div>
            </div>
            <div class="form-group row" style="margin-top:20px">
                <label for="pseudo" class="col-sm-3 col-form-label">Prenom</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="pseudo" name="prenom">
                </div>
            </div>
            <div class="form-group row" style="margin-top:20px">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text"  id="email" name="email" >
                </div>
            </div>
            <div class="form-group row"style="margin-top:20px" >
                <label for="pseudo" class="col-sm-3 col-form-label">Pseudo</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="pseudo" name="pseudo">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="fonction" class="col-sm-3 col-form-label">Fonction</label>
                <div class="col-sm-9">
                    <select name="fonction">
                        <option value="acheteur">Acheteur </option>
                        <option value="vendeur">Vendeur </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="photo" class="col-sm-3 col-form-label">Photo de Profil</label>
                <div class="col-sm-9">
                    <input class="form-control" type="file" id="photo" name="photo">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
            </div>
            <div class="bouton" style="text-align:center">
                <input type="submit" class="btn btn-primary" name="inscrire" value="Inscrire">
            </div>
        </form>
    </div>

    <!--Footer-->
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>

</body>

</html>