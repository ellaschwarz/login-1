<?php
include 'classes/database.php';
include 'classes/users.php';

$object = new DataBase();
$object->connect();


$usuario = new User("Vilma", "Picapiedra", "vilma@vilma.com", "vilma", "vilma");
$usuario->print();
