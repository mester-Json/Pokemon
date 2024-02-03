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
    <header>
        <nav>
            <a href="index.php"> <img class="neon-border" src="./asset/img/Ideas_Surprised_Pikachu_HD.png" alt=""></a>
            <h1>Pokémon</h1>
            <a class="select" href="selection.php">Sélection</a>
        </nav>
    </header>
    <form action="combat.php" method="post" enctype="multipart/form-data">
        <div class="pokemon1">
            <h2>Pokemon 1</h2>
            <label for=""> Mon Image </label>
            <input type="file" name="image1" accept="image/*">
            <label for=""> Nom Du Pokémon </label>
            <input type="text" name="name1" placeholder="Nom">
            <label for=""> Points de vie </label>
            <input type="number" name="healthPoints1" min="0" placeholder="Points de vie">
            <label for="">Points d'Attaque </label>
            <input type="number" name="atk1" min="0" placeholder="Attaque">
            <label for="">Type De Mon Pokémon </label>
            <select id="type" name="type1">
                <option value="Eau">Eau</option>
                <option value="Feu">Feu</option>
                <option value="Plante">Plante</option>
            </select>
        </div>
        <div class="combat">
            <img class="vs" src="./asset/img/vs.png" alt="Image de Pokemon">
            <input type="submit" value="Faire combattre">
        </div>
        <div class="pokemon2">
            <h2>Pokemon 2</h2>
            <label for=""> Mon Image </label>
            <input type="file" name="image2" accept="image/*">
            <label for=""> Nom Du Pokémon </label>
            <input type="text" name="name2" placeholder="Nom">
            <label for=""> Points de vie </label>
            <input type="number" name="healthPoints2" min="0" placeholder="Points de vie">
            <label for="">Points d'Attaque </label>
            <input type="number" name="atk2" min="0" placeholder="Attaque">
            <label for="">Type De Mon Pokémon </label>
            <select id="type" name="type2">
                <option value="Eau">Eau</option>
                <option value="Feu">Feu</option>
                <option value="Plante">Plante</option>
            </select>
        </div>
    </form>

    <footer>
        <p>© 2024 Pokémon. Développé par mrJson </p>
    </footer>
</body>

</html>