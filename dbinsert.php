<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotech</title>
</head>
<body>

    <h3>Insérez un lien</h3>

    <form action="dbinsert.php" method="POST">

        Titre : <input type="text" name="titre_lien" required><br><br>
        Url : <input type="text" name="url_lien" required><br><br>
        Description : <input type="text" name="description_lien" required><br><br>
        Hashtag_lien : <input type="text" name="hashtag_lien" value="#" required><br><br>
        date_lien : <input type="date" name="date_lien" placeholder="Au format année/mois/jour" required><br><br>
        <input type="submit" value="Ajouter le lien" name="submit">

    </form>


    <?php
    $hostname = "localhost";
    $username = "dvtdggyq_invite";
    $password = "InvitePHPMyAdmin0!";
    $db = "liens";

    $bdd = new PDO('mysql:host=localhost;dbname=dvtdggyq_firstDB;charset=utf8', 'dvtdggyq_invite', 'yes');

    if ($dbconnect->connect_error) {
    die("Erreur :" . $dbconnect->connect_error);
    }

    if(isset($_POST['submit'])) {
        $titre_lien=$_POST['titre_lien'];
        $url_lien=$_POST['url_lien'];
        $description_lien=$_POST['description_lien'];
        $hashtag_lien=$_POST['hashtag_lien'];
        $date_lien=$_POST['date_lien'];

        $req = $bdd->prepare('INSERT INTO liens(titre_lien, url_lien, description_lien, hashtag_lien, date_lien)
        VALUES(:titre_lien, :url_lien, :description_lien, :hashtag_lien, :date_lien)');

        $req->execute(array(
            'titre_lien' => $titre_lien,
            'url_lien' => $url_lien,
            'description_lien' => $description_lien,
            'hashtag_lien' => $hashtag_lien,
            'date_lien' => $date_lien,
        ));

        echo 'Votre lien a bien été ajouté !';
    }
    ?>

    <br><a href="https://dev5.projects.go.yo.fr/">Retour à la liste !</a>
</body>
</html>


<?php
        $bdd->close();
    ?>
