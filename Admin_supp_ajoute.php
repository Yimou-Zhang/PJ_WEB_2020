<?php

session_start();


    $database = "projet";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);

    if($db_found){
/////////////////////////////////Supprimer une personne
        if(isset($_POST["oui_supprime"])){
            $t_email = isset($_POST["t_mail"])? $_POST["t_mail"] : "";
            $sql = "SELECT * FROM utilisateur WHERE type LIKE 'vendeur'";
            if ($t_email != "") {
                $sql .= " AND email LIKE '%$t_email%'";
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo "Personne non trouvé";
            }else {
                while ($data = mysqli_fetch_assoc($result) ) {
                    $id = $data['idUtilisateur'];
                }
                $sql = "DELETE FROM utilisateur ";
                $sql .= " WHERE idUtilisateur = $id";
                $result = mysqli_query($db_handle, $sql); 
            }
        }
////////Ajouter une personne grace a une formulaire
        if(isset($_POST["oui_ajoute"])){
            $nom = isset($_POST["nom"])? $_POST["nom"] : "";
            $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
            $email = isset($_POST["email"])? $_POST["email"] : "";
            $password = isset($_POST["password"])? $_POST["password"] : "";
            $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
            $photo = isset($_FILES["photo"]['name'])? $_FILES["photo"]['name'] : "";
            $fonction = isset($_POST["fonction"])? $_POST["fonction"] : "";

            $sql = "SELECT * FROM utilisateur";
            if ($email != "") {
                $sql .= " WHERE email LIKE '%$email%'";
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) != 0) {
                echo "Personne déjà existant";
            }else {
                $sql = "INSERT INTO utilisateur(nom, Prenom, email, motDePasse, pseudo, photoProfil, type) VALUES ('$nom','$prenom','$email','$password','$pseudo','$photo','$fonction')";
                $result = mysqli_query($db_handle, $sql);//On enregistre
            }
        }
////////////Boucle de recherche d'identification pour l'acheteur
        $sql = "SELECT * FROM utilisateur WHERE type LIKE 'vendeur'";
        
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "Bug";
        } else {             
            echo "<table border='1'>";
            while($data = mysqli_fetch_assoc($result)){ 
                echo "<tr>";
                $image = $data['photoProfil'];
                echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
                echo "<td>". "<th>" . "Nom :" . " ". $data['nom'] . "</th>" . "</td>";
                echo "<td>". "<th>" . "Prenom :". " " . $data['prenom']. "</th>"  . "</td>";
                echo "<td>"."<th>" . "Email :". " " . $data['email'] . "</th>" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
        <!-- On passe sur du HTML pour remplir un formulaire de demande Ajouter ou Supprimer -->
        <form action="Admin_supp_ajoute.php" method="post" class="contain" enctype='multipart/form-data' >
        <table>
            <tr>
                <td colspan="2" align="center">
                    <br>
                    <input type="submit" name="ajoute" value="Ajouter">
                    <input type="submit" name="supprime" value="Supprimer">
                </td>
            </tr>
        </table>
        </form>
        <?php
        if(isset($_POST["ajoute"])){ //Les conditions ne fonctionnent qu'avec du php puis on remplit avec un formulaire pour l'email a ajouter
            ?>
            <!-- Formulaire d'inscription pour ajouter un vendeur -->
            <form action="Admin_supp_ajoute.php" method="post" class="contain" enctype='multipart/form-data' >
                <table>
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
                        <option value="vendeur">Vendeur </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Photo de profil :</td>
                    <td><input type="file" name="photo"></td>
                </tr>
                <tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="oui_ajoute" value="Ajoute cette personne">
                            <input type="submit" name="non" value="Retour">
                        </td>
                    </tr>
                </table>            
            </form>
            <?php 
        }
        if(isset($_POST["supprime"])){ //Ici un formulaire pour supprimer et il suffit de taper le mail du vendeur
        ?>
        <form action="Admin_supp_ajoute" method="post" class="contain" enctype='multipart/form-data' >
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="t_mail"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="oui_supprime" value="Supprime cette personne">
                        <input type="submit" name="non" value="Retour">
                    </td>
                </tr>
            </table>            
        </form>
        <?php  
        }
    }
    else{
        echo "Database not found";
    }

?>