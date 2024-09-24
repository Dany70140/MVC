<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
</head>
<body class="bg-dark">
<h1 class="text-center text-white">
    Voici le détail de <?= $livre->getTitre() ?>
</h1>
<p class="ms-5 text-white">
    <?= "écrit par : " . $livre->getAuteur() ?><br>
    <?= "Nombres de pages : " . $livre->getPage() ?><br>
    <?= "Résumé : " . $livre->getResume() ?><br>
</p>
<h2>
    <a href="index.php"> Retour a l'accueil ⮩ </a>
</h2>
</body>
</html>