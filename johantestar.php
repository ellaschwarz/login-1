<?php
include 'classes/database.php';
include 'classes/users.php';

$object = new DataBase();
$object->connect();


$usuario = new User("Vilma", "Picapiedra", "vilma@vilma.com", "vima", "vilma");
//$usuario->print();
if (!$usuario->areInputsValid()) {
    $usuario->showErrorMessages();
} else {
    echo "Guardar en database";
}