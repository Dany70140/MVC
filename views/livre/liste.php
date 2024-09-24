<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des livres</title>
</head>
<body class="bg-dark">
    <h1 class="text-center text-white">📚 Voici la liste de livres que nous proposons 📚</h1>
    <ul>
        <?php foreach ($livres as $livre): ?>
        <?php $id = $livre->getId(); ?>
            <li>
                <h2 class="ms-3 text-white" ><?=$livre->getTitre() . "   " ."<a href='index.php?route=detail&id=$id'> Détails du livre</a>" ?></h2>
            </li>
        <?php endforeach; ?>
        <h2>
             <a href="index.php"> Retour a l'accueil ⮩ </a>
        </h2>
    </ul>
</body>
</html>