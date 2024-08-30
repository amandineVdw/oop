<?php
// Models/Voiture.php
namespace MonProjet\Models;

class Voiture extends Vehicule {
    protected int $nombrePortes;

    public function __construct(string $marque, string $modele, int $nombrePortes) {
        parent::__construct($marque, $modele);
        $this->nombrePortes = $nombrePortes;
    }

    public function getInfo(): string {
        // Accès direct aux propriétés protected
        return parent::getInfo() . ", Nombre de portes: {$this->nombrePortes}";
    }
}