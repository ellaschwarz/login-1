<?php

class User
{
    /* Ändrade variabler names from camelCase till snake_case
        Hade läst att det är en best practice. Är det ok med er?
        Annars ändrar tillbaka  :) */
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $verified_password;
    private $hashed;    // Necessary ?

    public function __construct($first_name, $last_name, $email, $password, $verified_password)
    {
        $this->setName($first_name);
        $this->setLastName($last_name);
        $this->setEmail($email);
        $this->setPassword($password, $verified_password);
    }

    public function setName($name)
    {
        // TODO: Make some string control for name variable
        $this->first_name = $name;
    }

    public function getName()
    {
        // Elegant and robust database code goes here
        return $this->first_name;
    }

    public function setLastName($last)
    {
        // TODO: Make som string control for last variable
        $this->last_name = $last;
    }
    
    public function getLastName()
    {
        // Elegant and robust database code goes here
        return $this->last_name;
    }

    public function setEmail($email)
    {
        // TODO: Make som string control for email variable
        $this->email = $email;
    }
    
    public function getEmail()
    {
        // Elegant and robust database code goes here
        return $this->email;
    }

    public function setPassword($password, $verify)
    {
        // TODO: Verify if passwords are equal
        $this->password = $password;
    }
    
    public function getPassword()
    {
        // Elegant and robust database code goes here
        return $this->password;
    }



    public function register($username, $password)
    {
        // Control parameters and register user.
    }

    public function login($username, $password)
    {
        // Check if user exists
    }

    // Just for testing purposes
    public function print() {
        echo "Name is $this->first_name" . PHP_EOL;
        echo "Last name is $this->last_name" . PHP_EOL;
        echo "Email is $this->email" . PHP_EOL;
        echo "Password is $this->password" . PHP_EOL;
    }
}

$persona = new User("Johan", "Garzon", "johan@johan", "micontrasena", "micontra");
$persona->print();