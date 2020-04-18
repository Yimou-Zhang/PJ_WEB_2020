</html>
<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--Partie CSS-->
    <style>
        
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
            margin-top: 8%;
            color: whitesmoke;
        }

        .well {
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
        <span class="glyphicon glyphicon-check"></span> Se connecter
        </h2>
    </div>
    
    <!--Formulaire-->
    <div class="well" style="margin-top:5%">
        <form action="testing2.php" method="post" class="contain">
            <div class="form-group row" style="margin-top:20px">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="email" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input class="form-control" type="password"  id="password" name="password" >
                </div>
            </div>
            <div class="bouton" style="text-align:center">
                <a class="btn btn-primary" role="button" name="inscrire"><strong>Se connecter</strong></a>
            </div>
        </form>
    </div>

    <!--Footer-->
    <footer class="container-fluid text-center">
        <p>Site designé par Yimou ZHANG, Pascal CHEN et Matthis LARBODIERE</p>
    </footer>
</body>

</html>