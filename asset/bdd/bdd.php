<?php

define('HOST', 'localhost');
define('DB_NAME', 'Pokemon');
define('USER', '');
define('PASS', '');

try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function insertPokemon($conn, $name, $healthPoints, $atk, $type, $img)
    {
        $stmt = $conn->prepare("INSERT INTO pokemon (name, hp, atk, type, img) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $healthPoints, $atk, $type, $img]);
    }

    if (!empty($_POST['name1']) && !empty($_POST['healthPoints1']) && !empty($_POST['atk1']) && !empty($_POST['type1']) && !empty($_FILES['image1']['name'])) {
        $pokemon1ImagePath = 'images/' . basename($_FILES['image1']['name']);
        move_uploaded_file($_FILES['image1']['tmp_name'], $pokemon1ImagePath);
        insertPokemon($conn, $_POST['name1'], $_POST['healthPoints1'], $_POST['atk1'], $_POST['type1'], $pokemon1ImagePath);
    }

    if (!empty($_POST['name2']) && !empty($_POST['healthPoints2']) && !empty($_POST['atk2']) && !empty($_POST['type2']) && !empty($_FILES['image2']['name'])) {
        $pokemon2ImagePath = 'images/' . basename($_FILES['image2']['name']);
        move_uploaded_file($_FILES['image2']['tmp_name'], $pokemon2ImagePath);
        insertPokemon($conn, $_POST['name2'], $_POST['healthPoints2'], $_POST['atk2'], $_POST['type2'], $pokemon2ImagePath);
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;