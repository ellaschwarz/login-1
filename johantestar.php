<?php
include 'classes/database.php';
include 'classes/users.php';

$object = new DataBase();
$object->connect();


$usuario = new User("Betty", "Marmol", "betty@betty.com", "betty", "betty");
//$usuario->print();
if (!$usuario->areInputsValid()) {
    $usuario->showErrorMessages();
} else {
    $usuario->registerUserInDB();
}
