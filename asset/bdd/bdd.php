<?php

define('HOST', 'localhost');
define('DB_NAME', 'Pokemon');
define('USER', '');
define('PASS', '');

try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function insertPokemon($conn, $name, $healthPoints, $atk, $type)
    {
        $stmt = $conn->prepare("INSERT INTO pokemon (name, hp, atk, type) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $healthPoints, $atk, $type]);
    }

    if (!empty($_POST['name1']) && !empty($_POST['healthPoints1']) && !empty($_POST['atk1']) && !empty($_POST['type1'])) {

        insertPokemon($conn, $_POST['name1'], $_POST['healthPoints1'], $_POST['atk1'], $_POST['type1']);
    }

    if (!empty($_POST['name2']) && !empty($_POST['healthPoints2']) && !empty($_POST['atk2']) && !empty($_POST['type2'])) {


        insertPokemon($conn, $_POST['name2'], $_POST['healthPoints2'], $_POST['atk2'], $_POST['type2']);
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
