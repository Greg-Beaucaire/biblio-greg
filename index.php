<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotech</title>
</head>
<body>
    <h1>Voici la Bibliotech</h1>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=dvtdggyq_firstDB;charset=utf8', 'dvtdggyq_invite', 'unfauxmotdepasse');
    $reponse = $bdd->query('SELECT * FROM liens');
    $donnees = $reponse->fetch();
    while ($donnees = $reponse->fetch()) {
    ?>
    <p>Nom du lien : <?php echo $donnees['titre_lien']; ?> <?php echo htmlentities($donnees['hashtag_lien']); ?><br/>
    URL du lien : <a href="<?php echo $donnees['url_lien']; ?>"><?php echo $donnees['url_lien']; ?></a><br/>
    Description du lien : <?php echo $donnees['description_lien']; ?><br/>
    Date d'ajout du lien : <?php echo $donnees['date_lien']; ?><br/>
    <a href="https://dev5.projects.go.yo.fr/modifier.php?id_lien=<?php echo $donnees['id_lien']?>">Modifier</a>
    <a href="https://dev5.projects.go.yo.fr/supprimer.php?id_lien=<?php echo $donnees['id_lien'] ?>">Supprimer</a>
    </p>
    
    <?php
    }
    ?>
    <p> Vous souhaitez ajouter un lien ? C'est par <a href="https://dev5.projects.go.yo.fr/dbinsert.php">ICI</a>

</body>
</html>


<?php
        $bdd->close();
    ?>
