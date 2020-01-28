<?php
include 'classes/database.php';
include 'classes/users.php';

$object = new DataBase();
$object->connect();


$usuario = new User("Pablo", "Picapiedra", "pablo@pablo.com", "pablo", "pablo");
//$usuario->print();
if (!$usuario->areInputsValid()) {
    $usuario->showErrorMessages();
} else {
    $usuario->registerUserInDB();
}
