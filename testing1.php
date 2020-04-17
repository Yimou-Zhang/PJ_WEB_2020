<!DOCTYPE html>
<html>

<head>
    <title>Airbook</title>
    <meta charset="utf-8">
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
        body{
            background-image: url(Bois-sombre.png);
        }
        .writing{
            font-family:Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <div class="conteneur">
        <form action="testing2.php" method="post" class="contain" enctype='multipart/form-data' >
            <h2 style="text-align:center">Inscription</h2>
            <table >
                <tr>
                    <td>Nom:</td>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                    <td>Prenom:</td>
                    <td><input type="text" name="prenom"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Pseudo:</td>
                    <td><input type="text" name="pseudo"></td>
                </tr>
                <tr>
                    <td>Mot de passe:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Fonction:</td>
                    <td><select name="fonction">
                        <option value="acheteur">Acheteur </option>
                        <option value="vendeur">Vendeur </option>
                        <option value="administrateur">Administrateur</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Photo de profil :</td>
                    <td><input type="file" name="photo"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <br>
                        <input type="submit" name="inscrire" value="S'inscrire">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>