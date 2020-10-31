<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotech</title>
</head>
<body>

    <?php
    //Connection à la base de donnée
    
    $hostname = "localhost";
    $username = "dvtdggyq_invite";
    $password = "InvitePHPMyAdmin0!";
    $db = "liens";
    
    $bdd = new PDO('mysql:host=localhost;dbname=dvtdggyq_firstDB;charset=utf8', 'dvtdggyq_invite', 'pastouche');
    
    if ($dbconnect->connect_error) {
    die("Erreur :" . $dbconnect->connect_error);
    }
    
    //Récupération de la variable titre_lien depuis la page index.php 
    
    $id_lien = $_GET['id_lien'];

    //Le code pour la suppression de l'entrée dans la DB


        $req = $bdd->prepare('DELETE FROM liens WHERE id_lien= :id_lien');

        $req->execute(array(
            'id_lien' => $id_lien,
        ));

        echo 'Le lien a bien été supprimé !'
    ?>

    <br><a href="https://dev5.projects.go.yo.fr/">Retour à la liste !</a> 

</body>
</html>
