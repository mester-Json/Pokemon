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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./asset/css/selection.css">
    <title>Combat de Pokémon</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php"> <img class="neon-border" src="./asset/img/Ideas_Surprised_Pikachu_HD.png" alt=""></a>
            <h1>Selection T'es Pokémon</h1>
        </nav>
    </header>
    <form id="pokemonForm" action="combat.php" method="post" enctype="multipart/form-data">

        <div class="select1">
            <h2> Pokemon 1 </h2>
            <?php foreach ($pokemons as $pokemon1): ?>
                <div class="poke1">
                    <input type="checkbox" id="pokemon<?= isset($pokemon1['id']) ? $pokemon1['id'] : '' ?>"
                        name="selected_pokemons[]" value="<?= isset($pokemon1['id']) ? $pokemon1['id'] : '' ?>">
                    <?php if (isset($_POST['name1'], $_POST['atk1'], $_POST['healthPoints1'], $_POST['type1'])): ?>
                        <input type="hidden" name="name1<?= $pokemon1['id'] ?>" value="<?= $pokemon1['name'] ?>">


                        <input type="hidden" name="healthPoints1<?= $pokemon1['id'] ?>"
                            value="<?= $pokemon1['healthPoints'] ?>">


                        <input type="hidden" name="atk1<?= $pokemon1['id'] ?>" value="<?= $pokemon1['atk'] ?>">

                        <input type="hidden" name="type1<?= $pokemon1['id'] ?>" value="<?= $pokemon1['type'] ?>">

                    <?php endif; ?>

                    <label for="pokemon<?= $pokemon1['id'] ?>">
                        <?= $pokemon1['name'] ?> (Type:
                        <?= $pokemon1['type'] ?>, HP:
                        <?= $pokemon1['hp'] ?>, Atk:
                        <?= $pokemon1['atk'] ?>)
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
        <div>
            <input type="submit" value="Faire combattre">
        </div>
        <div class="select2">
            <h2> Pokemon 2 </h2>
            <?php foreach ($pokemons as $pokemon2): ?>
                <div class="poke2">
                    <input type="checkbox" id="pokemon<?= isset($pokemon2['id']) ? $pokemon2['id'] : '' ?>"
                        name="selected_pokemons[]" value="<?= isset($pokemon2['id']) ? $pokemon2['id'] : '' ?>">
                    <?php if (isset($_POST['name2'], $_POST['atk2'], $_POST['healthPoints2'], $_POST['type2'])): ?>
                        <input type="hidden" name="name2<?= $pokemon2['id'] ?>" value="<?= $pokemon2['name'] ?>">

                        <input type="hidden" name="healthPoints2<?= $pokemon2['id'] ?>"
                            value="<?= $pokemon2['healthPoints'] ?>">

                        <input type="hidden" name="atk2<?= $pokemon2['id'] ?>" value="<?= $pokemon2['atk'] ?>">

                        <input type="hidden" name="type2<?= $pokemon2['id'] ?>" value="<?= $pokemon2['type'] ?>">


                    <?php endif; ?>

                    <label for="pokemon<?= $pokemon2['id'] ?>">
                        <?= $pokemon2['name'] ?> (Type:
                        <?= $pokemon2['type'] ?>, HP:
                        <?= $pokemon2['hp'] ?>, Atk:
                        <?= $pokemon2['atk'] ?>)
                    </label>
                </div>
            <?php endforeach; ?>
        </div>


    </form>
    <footer>
        <p>© 2024 Pokémon. Développé par mrJson </p>
    </footer>
    <script src="./asset/js/verif-selection.js"></script>
</body>

</html>