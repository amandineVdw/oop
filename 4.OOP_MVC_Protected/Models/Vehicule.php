<?php
// Models/Vehicule.php
namespace MonProjet\Models;

class Vehicule {
    protected string $marque;
    protected string $modele;

    public function __construct(string $marque, string $modele) {
        $this->marque = $marque;
        $this->modele = $modele;
    }

    public function getInfo(): string {
        return "Marque: {$this->marque}, Modèle: {$this->modele}";
    }
}