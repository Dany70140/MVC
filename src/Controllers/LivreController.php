<?php

namespace App\Controllers;

use App\Dao\LivreDAO;

class LivreController
{
    private LivreDAO $dao;
    public function __construct(LivreDAO $dao)
    {
        $this->LivreDAO = $dao;
    }
    // Lister l'ensemble des livres
    public function list() {
        // Fait appel au modèle afin de récupérer les données dans la BD
        $livres = $this->LivreDAO->selectAll();

        // Fait appel à la vue afin de renvoyer la page
        require __DIR__ . "/../../views/livre/liste.php";
    }
    public function detail(int $id) {
        $livre = $this->LivreDAO->selectById($id);
        if ($livre) {
            require __DIR__ . "/../../views/detail/detail.php";
        } else {
            header("HTTP/1.0 404 Not found");
            echo "Livre non trouvé";
        }
    }
    public function ajouterLivre() {
        require __DIR__ . "/../../views/ajouter_livre/ajouter-livre.php";
    }
}