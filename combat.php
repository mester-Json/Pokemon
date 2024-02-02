<?php
include "./asset/bdd/aff.php";

try {
    $sql = "SELECT * FROM  pokemon WHERE id = id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $pokemons = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./asset/css/combat.css">
    <title>Combat Pokémon</title>
</head>

<body>
    <h1>Combat Pokémon</h1>
    <?php
    include_once 'class/Pokemon.php';
    $selected_pokemons = $_POST['selected_pokemons'] ?? [];
    $pokemon_details = [];

    foreach ($selected_pokemons as $pokemon_id) {
        foreach ($pokemons as $pokemon) {
            if ($pokemon['id'] == $pokemon_id) {
                $pokemon_details[] = $pokemon;
            }
        }
    }
    ?>
    <div class="pokemon-container">
        <div class="pokemon1">
            <h2>
                <?php echo ($_POST['name1']) ?>
                <?php echo isset($pokemon_details[0]['name']) ? $pokemon_details[0]['name'] : '' ?>

            </h2>
            <p>Health Points:
                <?php echo ($_POST['healthPoints1']) ?>
                <?php echo isset($pokemon_details[0]['hp']) ? $pokemon_details[0]['hp'] : '' ?>

            </p>
            <p>Attack:
                <?php echo ($_POST['atk1']) ?>
                <!-- <!-- <?php echo isset($pokemon_details[0]['atk']) ? $pokemon_details[0]['atk'] : '' ?>  -->

            </p>

            <img src="<?php echo ($_POST['img1']) ?> 

            <?php echo isset($pokemon_details[0]['img']) ? $pokemon_details[0]['img'] : '' ?>" alt="Image de Pokemon">

        </div>

        <div class="pokemon2">
            <h2>
                <?php echo ($_POST['name2']) ?>
                <?php echo isset($pokemon_details[1]['name']) ? $pokemon_details[1]['name'] : '' ?>

            </h2>
            <p>Health Points:
                <?php echo ($_POST['healthPoints2']) ?>
                <?php echo isset($pokemon_details[1]['hp']) ? $pokemon_details[1]['hp'] : '' ?>

            </p>
            <p>Attack:
                <?php echo ($_POST['atk2']) ?>
                <?php echo isset($pokemon_details[1]['atk']) ? $pokemon_details[1]['atk'] : '' ?>

            </p>

            <img src="<?php echo ($_POST['img1']) ?> 

            <?php echo isset($pokemon_details[1]['img']) ? $pokemon_details[1]['img'] : '' ?>" alt="Image de Pokemon">

        </div>
    </div>

    <h2>Combat Result:</h2>


    <?php

    include_once 'class/Pokemon.php';

    if (isset($_POST['name1'], $_POST['healthPoints1'], $_POST['atk1'], $_POST['name2'], $_POST['healthPoints2'], $_POST['atk2'])) {
        $pokemon1 = new Pokemon($_POST['name1'], $_POST['healthPoints1'], $_POST['atk1']);
        $pokemon2 = new Pokemon($_POST['name2'], $_POST['healthPoints2'], $_POST['atk2']);

        if (isset($_POST['img2'])) {
            $img2 = $_POST['img2'];
        }
        while (!$pokemon1->isDead() && !$pokemon2->isDead()) {
            $pokemon1->attaquer($pokemon2);
            if (!$pokemon2->isDead()) {
                $pokemon2->attaquer($pokemon1);
            }
        }

        if ($pokemon1->isDead()) {
            echo '<p class="pokemon-winner">' . $pokemon2->getName() . ' | HP : ' . $pokemon2->getHealthPoints() . ' | ATK : ' . $pokemon2->getAtk() . ' a gagné le combat!</p>';
        } else {
            echo '<p class="pokemon-winner">' . $pokemon1->getName() . ' | HP : ' . $pokemon1->getHealthPoints() . ' | ATK : ' . $pokemon1->getAtk() . ' a gagné le combat!</p>';
        }

    }

    if (isset($pokemon_details[0]['name'], $pokemon_details[0]['hp'], $pokemon_details[0]['atk'], $pokemon_details[1]['name'], $pokemon_details[1]['hp'], $pokemon_details[1]['atk'])) {
        $pokemon_details1 = new Pokemon($pokemon_details[0]['name'], $pokemon_details[0]['hp'], $pokemon_details[0]['atk']);
        $pokemon_details2 = new Pokemon($pokemon_details[1]['name'], $pokemon_details[1]['hp'], $pokemon_details[1]['atk']);

        while (!$pokemon_details1->isDead() && !$pokemon_details2->isDead()) {
            $pokemon_details1->attaquer($pokemon_details2);
            if (!$pokemon_details2->isDead()) {
                $pokemon_details2->attaquer($pokemon_details1);
            }
        }

        if ($pokemon_details1->isDead()) {
            echo '<p class="pokemon-winner">' . $pokemon_details2->getName() . ' | HP : ' . $pokemon_details2->getHealthPoints() . ' | ATK : ' . $pokemon_details2->getAtk() . ' a gagné le combat!</p>';
        } else {
            echo '<p class="pokemon-winner">' . $pokemon_details1->getName() . ' | HP : ' . $pokemon_details1->getHealthPoints() . ' | ATK : ' . $pokemon_details1->getAtk() . ' a gagné le combat!</p>';
        }
    }
    ?>



    <a href="index.php">Retour</a>

</body>

</html>