<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id1 = $_POST['id1'];
    $name1 = $_POST['name1'];
    $healthPoints1 = $_POST['healthPoints1'];
    $atk1 = $_POST['atk1'];
    $type1 = $_POST['type1'];
    $id2 = $_POST['id2'];
    $name2 = $_POST['name2'];
    $healthPoints2 = $_POST['healthPoints2'];
    $atk2 = $_POST['atk2'];
    $type2 = $_POST['type2'];

    if (empty($id1) || empty($name1) || empty($healthPoints1) || empty($atk1) || empty($type1) || empty($id2) || empty($name2) || empty($healthPoints2) || empty($atk2) || empty($type2)) {
        echo "Veuillez remplir tous les champs.";
    } else {

    }
}