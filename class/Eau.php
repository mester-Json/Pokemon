<?php


include_once 'Pokemon.php';

class Eau extends Pokemon
{
    public function attaquer($pokemon)
    {
        if ($pokemon instanceof Feu) {
            $pokemon->healthPoints -= $this->atk * 2;
        } elseif ($pokemon instanceof Eau || $pokemon instanceof Plante) {
            $pokemon->healthPoints -= $this->atk * 0.5;
        } else {
            $pokemon->healthPoints -= $this->atk;
        }
    }
}

