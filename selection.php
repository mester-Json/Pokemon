<?php

include "./asset/bdd/aff.php";

try {
    $sql = "SELECT * FROM  pokemon";
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
    <link rel="stylesheet" href="./asset/css/selection.css">
    <title>Combat de Pokémon</title>
</head>

<body>

    <form action="combat.php" method="post" enctype="multipart/form-data">
        <h2>Pokemon 1</h2>
        <?php foreach ($pokemons as $pokemon): ?>
            <div>
                <input type="checkbox" id="pokemon<?= isset($pokemon['id']) ? $pokemon['id'] : '' ?>"
                    name="selected_pokemons[]" value="<?= isset($pokemon['id']) ? $pokemon['id'] : '' ?>">
                <?php if (isset($_POST['name1'], $_POST['atk1'], $_POST['healthPoints1'], $_POST['type1'])): ?>
                    <input type="hidden" name="name1<?= $pokemon['id'] ?>" value="<?= $pokemon['name'] ?>">


                    <input type="hidden" name="healthPoints1<?= $pokemon['id'] ?>" value="<?= $pokemon['healthPoints'] ?>">


                    <input type="hidden" name="atk1<?= $pokemon['id'] ?>" value="<?= $pokemon['atk'] ?>">

                    <input type="hidden" name="type1<?= $pokemon['id'] ?>" value="<?= $pokemon['type'] ?>">

                <?php endif; ?>

                <label for="pokemon<?= $pokemon['id'] ?>">
                    <?= $pokemon['name'] ?> (Type:
                    <?= $pokemon['type'] ?>, HP:
                    <?= $pokemon['hp'] ?>, Atk:
                    <?= $pokemon['atk'] ?>)
                </label>
            </div>
        <?php endforeach; ?>
        </div>
        <h2>Pokemon 2</h2>
        <?php foreach ($pokemons as $pokemon): ?>
            <div>
                <input type="checkbox" id="pokemon<?= isset($pokemon['id']) ? $pokemon['id'] : '' ?>"
                    name="selected_pokemons[]" value="<?= isset($pokemon['id']) ? $pokemon['id'] : '' ?>">
                <?php if (isset($_POST['name2'], $_POST['atk2'], $_POST['healthPoints2'], $_POST['type2'])): ?>
                    <input type="hidden" name="name2<?= $pokemon['id'] ?>" value="<?= $pokemon['name'] ?>">

                    <input type="hidden" name="healthPoints2<?= $pokemon['id'] ?>" value="<?= $pokemon['healthPoints'] ?>">

                    <input type="hidden" name="atk2<?= $pokemon['id'] ?>" value="<?= $pokemon['atk'] ?>">

                    <input type="hidden" name="type2<?= $pokemon['id'] ?>" value="<?= $pokemon['type'] ?>">


                <?php endif; ?>

                <label for="pokemon<?= $pokemon['id'] ?>">
                    <?= $pokemon['name'] ?> (Type:
                    <?= $pokemon['type'] ?>, HP:
                    <?= $pokemon['hp'] ?>, Atk:
                    <?= $pokemon['atk'] ?>)
                </label>
            </div>
        <?php endforeach; ?>
        </div>
        <input type="submit" value="Faire combattre">
    </form>
</body>

</html>