<?php

namespace App\Dao;
use App\Entity\Livre;

class LivreDAO
{
    private \PDO $db;


    /**
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    // Envoyer la requête "SELECT * FROM Livre"
    // Retourner les enregistrements sous la forme d'un tableau
    // d'objets de la classe Livre
    public function selectAll(): array {
        $requete = $this->db->query("SELECT * FROM livre");
        $livresDB = $requete->fetchAll(\PDO::FETCH_ASSOC);
        // Mapping relationnel vers objet
        $livres = [];
        foreach ($livresDB as $livreDB) {
            $livre = new Livre();
            $livre->setId($livreDB['id_livre']);
            $livre->setTitre($livreDB['titre_livre']);
            $livre->setAuteur($livreDB['auteur_livre']);
            $livre->setPage($livreDB['nombre_pages_livre']);
            $livres[] = $livre;
        }
        return $livres;
    }
    public function selectById(int $id): ?Livre {
        $stmt = $this->db->prepare("SELECT * FROM Livre WHERE id_livre = :id");
        $stmt->execute([':id' => $id]);
        $livreDB = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$livreDB) {
            return null;
        }
        $livre = new Livre();
        $livre->setId($livreDB['id_livre']);
        $livre->setTitre($livreDB['titre_livre']);
        $livre->setPage($livreDB['nombre_pages_livre']);
        $livre->setAuteur($livreDB['auteur_livre']);
        $livre->setResume($livreDB['resume_livre']);
        return $livre;
    }
}
