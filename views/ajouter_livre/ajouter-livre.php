<?php
//Déterminer si le formulaire a été soumis
//Utilisation d'une variable superglobale
//$_SERVER : tableau associatif contenant des informations sur la requêtes HTTP
$erreurs = [];
$email_utilisateur = "";
$mdp_utilisateur = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'];
    $page = $_POST['page'];
    $auteur = $_POST['auteur'];
    $resume = $_POST['resume'];

    //Validation des données
    if (empty($titre)) {
        $erreurs['titre'] = "Le titre est obligatoire";
    }
    if (empty($page)) {
        $erreurs['page'] = "Le nombres de pages est obligatoire";
    }
    if (empty($auteur)) {
        $erreurs['auteur'] = "L'auteur est obligatoire";
    }
    if (empty($resume)) {
        $erreurs['resume'] = "Le resumé est obligatoire";
    }

    //Traiter les données
    if (empty($erreurs)) {
        //Traitement des données (insertion dans une base de données)
        //Rediriger l'utilisateur vers une autre page (la page d'accueil)
        header(header: "Location: ../index.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body class="bg-dark">
<h1 class="text-center text-white">Ajouter un livre ?</h1>
<div class="container">
        <div class="w-50 mx-auto shadow my-5 p-4 bg-dark">
            <form action="" method="POST" novalidate>
                <div class="mb-3">
                    <label for="titre" class="form-label text-white">titre*</label>
                    <input
                            type="text"
                            class="form-control <?= isset($erreurs['titre']) ? "border border-2 border-danger" : "" ?>"
                            id="titre"
                            name="titre"
                            value="<?= $titre ?>"
                            placeholder="Saisir le titre">
                    <?php if (isset($erreurs['titre'])) : ?>
                        <p class="form-text text-danger"><?= $erreurs['titre'] ?></p>
                    <?php endif; ?>

                    <label for="page" class="form-label text-white">Nombres de pages*</label>
                    <input
                            type="number"
                            class="form-control <?= isset($erreurs['page']) ? "border border-2 border-danger" : "" ?>"
                            id="page"
                            name="page"
                            value="<?= $page ?>"
                            placeholder="Saisir le nombre de pages">
                    <?php if (isset($erreurs['page'])) : ?>
                        <p class="form-text text-danger"><?= $erreurs['page'] ?></p>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</body>
</html>