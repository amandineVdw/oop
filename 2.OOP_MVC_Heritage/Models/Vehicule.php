<?php
// Models/Vehicule.php
namespace MonProjet\Models;

class Vehicule {
    public string $marque;
    public string $modele;

    public function __construct(string $marque, string $modele) {
        $this->marque = $marque;
        $this->modele = $modele;
    }

    public function getInfo(): string {
        return "Marque: {$this->marque}, Modèle: {$this->modele}";
    }
}