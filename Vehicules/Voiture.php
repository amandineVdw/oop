<?php
// Voiture.php
namespace MonProjet\Vehicules;

class Voiture {
    public string $couleur;
    public string $marque;

    public function __construct(string $couleur, string $marque) {
        $this->couleur = $couleur;
        $this->marque = $marque;
    }

    public function getInfo(): string {
        return "Cette voiture est une {$this->marque} de couleur {$this->couleur}.";
    }
}
