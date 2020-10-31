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
    
    $bdd = new PDO('mysql:host=localhost;dbname=dvtdggyq_firstDB;charset=utf8', 'dvtdggyq_invite', 'jaipeuràmaDB');
    
    if ($dbconnect->connect_error) {
    die("Erreur :" . $dbconnect->connect_error);
    }
    
    //Récupération de la variable id lien depuis la page index.php 
    $id_lien = $_GET['id_lien'];
    
    //Récupération des données depuis la DB par rapport à l'id lien
    $req = $bdd->prepare('SELECT * FROM liens WHERE id_lien= :id_lien');
    $req->execute(array(
        'id_lien' => $id_lien,
    ));
    $donnees = $req->fetch();
    ?>

    <!--Le form HTML qui va permettre de modifier les entrées dans la base de données. On utilise en "titre" de chaque champs la valeur actuelle de l'entrée-->
    
    <h3>Modifier un lien</h3>

    <form action="modifier.php" method="POST">

        Titre : <input type="text" name="titre_lien_mod" value="<?php echo $donnees['titre_lien']; ?>" required><br><br>
        URL : <input type="text" name="url_lien_mod" value="<?php echo $donnees['url_lien']; ?>" required><br><br>
        Description : <input type="text" name="description_lien_mod" value="<?php echo $donnees['description_lien']; ?>" required><br><br>
        Hashtag : <input type="text" name="hashtag_lien_mod" value="<?php echo $donnees['hashtag_lien']; ?>" required><br><br>
        Date : <input type="date" name="date_lien_mod" value="<?php echo $donnees['date_lien']; ?>" required><br><br>
        <input type="hidden" name="id_lien" value="<?php echo $donnees['id_lien']; ?>">
        <input type="submit" value="Modifier le lien" name="submit">

    </form>

    <?php

    //Le code pour la modification des entrées dans la DB en reprenant les entrées depuis le form du dessus
    if(isset($_POST['submit'])) {
        $titre_lien_mod=$_POST['titre_lien_mod'];
        $url_lien_mod=$_POST['url_lien_mod'];
        $description_lien_mod=$_POST['description_lien_mod'];
        $hashtag_lien_mod=$_POST['hashtag_lien_mod'];
        $date_lien_mod=$_POST['date_lien_mod'];
        $id_lien=$_POST['id_lien'];

        $req = $bdd->prepare('UPDATE liens SET titre_lien = :titre_lien_mod, url_lien = :url_lien_mod, description_lien = :description_lien_mod, hashtag_lien = :hashtag_lien_mod, date_lien = :date_lien_mod WHERE id_lien= :id_lien');

        $req->execute(array(
            'titre_lien_mod' => $titre_lien_mod,
            'url_lien_mod' => $url_lien_mod,
            'description_lien_mod' => $description_lien_mod,
            'hashtag_lien_mod' => $hashtag_lien_mod,
            'date_lien_mod' => $date_lien_mod,
            'id_lien' => $id_lien,
        ));

        echo 'Le lien a bien été modifié !';
    }
    
    ?>

    <br><a href="https://dev5.projects.go.yo.fr/">Retour à la liste !</a> 
</body>
</html>