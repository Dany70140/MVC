<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>AAAAAAHHAHAHAHAAAAAAHAHAHAAAAAAAAAHHAAAAAAHHAAAAAHAHAAAAAHAHAHAHAH</title>
</head>
<body>

</body>
</html>

<?php

// Controlleur FRONATL => Routeur
// Toutes les requêtes des utilisateurs passent par ce fichier

require_once __DIR__ . "/../vendor/autoload.php";


$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotEnv->load(); // charger les variables d'environnement de .env dans $_ENV
//Configurer la connexion à la base de données
$db = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
    $_ENV['DB_USER'],$_ENV['DB_PASSWORD']);

// Mise en place du routing
$route = $_GET['route'] ?? 'accueil';
//Tester la valeur de $route
switch ($route) {
    case 'accueil' :
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->accueil();
        break;
    case 'livre-liste' :
        // $livreDao est une dépendance de $livreController
        $livreDao = new \App\Dao\LivreDAO($db);
        // Injecter la dépendance $livreDao dans l'objet LivreController
        $livreController = new \App\Controllers\LivreController($livreDao);
        $livreController->list();
        break;
    case 'detail' :
        $id = $_GET["id"] ?? null;
        if ($id) {
            $livreDao = new \App\Dao\LivreDAO($db);
            $livreController = new \App\Controllers\LivreController($livreDao);
            $livreController->detail($id);
        } else {
            echo "La requete n'est pas valide";
        }
        break;
    case 'ajouter-livre' :
        $livreDao = new \App\Dao\LivreDAO($db);
        $livreController = new \App\Controllers\LivreController($livreDao);
        $livreController->ajouterLivre();
        break;
    default :
        // Page erreur 404
        echo "<h1>page introuvable :/</h1>";
        break;
}
///if ($route === "accueil") {
///    // Créer un objet AccueilController
///    $accueilController = new \App\Controllers\AccueilController();
///    $accueilController->accueil();
///} else {
///    echo "<h1>Page introuvable :/</h1>";
///}