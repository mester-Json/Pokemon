<?php

include "./asset/bdd/bdd.php";
include_once 'class/Eau.php';
include_once 'class/Feu.php';
include_once 'class/Plante.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {




    if (isset($_POST['test'])) {
        switch ($_POST['test']) {
            case 'Eau':
                $pokemon1 = new Eau($_POST['name1'], $_POST['healthPoints1'], $_POST['atk1']);
                break;
            case 'Feu':
                $pokemon1 = new Feu($_POST['name1'], $_POST['healthPoints1'], $_POST['atk1']);
                break;
            case 'Plante':
                $pokemon1 = new Plante($_POST['name1'], $_POST['healthPoints1'], $_POST['atk1']);
                break;
        }
    }

    if (isset($_POST['test2'])) {
        switch ($_POST['test2']) {
            case 'Eau':
                $pokemon2 = new Eau($_POST['name2'], $_POST['healthPoints2'], $_POST['atk2']);
                break;
            case 'Feu':
                $pokemon2 = new Feu($_POST['name2'], $_POST['healthPoints2'], $_POST['atk2']);
                break;
            case 'Plante':
                $pokemon2 = new Plante($_POST['name2'], $_POST['healthPoints2'], $_POST['atk2']);
                break;
        }
    }

    if (isset($pokemon1) && isset($pokemon2)) {
        combat($pokemon1, $pokemon2);
    } else {
        echo "Veuillez sélectionner les deux Pokémon pour le combat.";
    }

    function combat($pokemon1, $pokemon2)
    {
        while (!$pokemon1->isDead() && !$pokemon2->isDead()) {
            $pokemon1->attaquer($pokemon2);
            if ($pokemon2->isDead()) {
                echo $pokemon1 . " a gagné !";
            } else {
                $pokemon2->attaquer($pokemon1);
                if ($pokemon1->isDead()) {
                    echo $pokemon2 . " a gagné !";
                }
            }
        }
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./asset/css/style.css">
    <title>Création de Pokémon</title>
</head>

<body>
    <form action="combat.php" method="post" enctype="multipart/form-data">
        <h2>Pokemon 1</h2>
        <input type="file" name="image1" accept="image/*">
        <input type="text" name="name1" placeholder="Nom">
        <input type="number" name="healthPoints1" min="0" placeholder="Points de vie">
        <input type="number" name="atk1" min="0" placeholder="Attaque">
        <select id="type" name="type1">
            <option value="Eau">Eau</option>
            <option value="Feu">Feu</option>
            <option value="Plante">Plante</option>
        </select>
        <h2>Pokemon 2</h2>
        <input type="file" name="image2" accept="image/*">
        <input type="text" name="name2" placeholder="Nom">
        <input type="number" name="healthPoints2" min="0" placeholder="Points de vie">
        <input type="number" name="atk2" min="0" placeholder="Attaque">
        <select id="type" name="type2">
            <option value="Eau">Eau</option>
            <option value="Feu">Feu</option>
            <option value="Plante">Plante</option>
        </select>
        <input type="submit" value="Faire combattre">
        <a href="selection.php"> selection </a>
    </form>
</body>

</html>