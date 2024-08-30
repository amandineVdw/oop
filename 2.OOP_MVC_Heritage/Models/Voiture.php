<?php
// Models/Voiture.php
namespace MonProjet\Models;

require_once 'Vehicule.php';
class Voiture extends Vehicule {
    public int $nombrePortes;

    public function __construct(string $marque, string $modele, int $nombrePortes) {
        parent::__construct($marque, $modele);
        $this->nombrePortes = $nombrePortes;
    }

    public function getInfo(): string {
        return parent::getInfo() . ", Nombre de portes: {$this->nombrePortes}";
    }
}