<?php

namespace App\Entity;

// Cette classe représente une entité (table liée à une table dans la base de données)
class Livre
{
    private int $id;
    private string $titre;
    private int $page;
    private string $auteur;
    private string $resume;

    /**
     * @return string
     */
    public function getResume(): string
    {
        return $this->resume;
    }

    /**
     * @param string $resume
     */
    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param int $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }
}