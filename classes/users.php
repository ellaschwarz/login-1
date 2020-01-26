<?php

class User extends DataBase
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

    // public function __construct($first_name, $last_name, $email, $password, $verified_password)
    // {
    //     $this->setName($first_name);
    //     $this->setLastName($last_name);
    //     $this->setEmail($email);
    //     $this->setPassword($password, $verified_password);
    // }

    /*Testar att hämta alla users*/
    public function getAllUsers()
    {
        $sql = 'SELECT * FROM users_db.users';
        //Hämtar connect-metod från DataBase-klassen och passar in $sql som argument i query-metoden.
        $stmt = $this->connect()->query($sql);
        //Fetching the data
        while ($row = $stmt->fetch()) {
            echo  '<p>' . $row['email'] . '</p>' . "\n";
        }
    }

    /*Testar att hämta alla users med prepares statements*/
    public function getAllUsersStmt()
    {
        //Kör statementet i databasen före användaren skriver in sin input vilket skyddar koden från att användaren 
        $sql = 'SELECT * FROM users_db.users WHERE firstname = ? AND lastname = ?';
        //Hämtar connect-metod från DataBase-klassen och passar in $sql som argument i query-metoden.
        $stmt = $this->connect()->query($sql);
        //Fetching the data
        while ($row = $stmt->fetch()) {
            echo  '<p>' . $row['email'] . '</p>' . "\n";
        }
    
                    // $stmt = $pdo->query('SELECT * FROM users_db.users');
            // while ($row = $stmt->fetch()) {
            //     echo  '<p>' . $row['email'] . '</p>' . "\n";
            // }
    }

    public function setName($name)
    {
        // TODO: Input control?
        $this->first_name = $name;
    }

    public function getName()
    {
        // Elegant and robust database code goes here
        return $this->first_name;
    }

    public function setLastName($last)
    {
        // TODO: Input control?
        $this->last_name = $last;
    }
    
    public function getLastName()
    {
        // Elegant and robust database code goes here
        return $this->last_name;
    }

    public function setEmail($email)
    {
        // TODO: Input control?
        $this->email = $email;
    }
    
    public function getEmail()
    {
        // Elegant and robust database code goes here
        return $this->email;
    }

    public function setPassword($password, $verify)
    {
        if ($password == $verify) {
            $this->password = $password;
        } else {
            echo "ERROR: Passwords do not match." . PHP_EOL;
        }
    }
    
    public function getPassword()
    {
        // Elegant and robust database code goes here
        return $this->password;
    }


    public function isPasswordCorrect($password) {
        /*
        Retrieve hash-password from DB
        Compare password entered by user with
        the hashed-password.
        Return True/False
        */
    }


    public function registerOnDB()
    {
        /*
        Parameters should have been controled by its own setter at this point.
        Just SET all user info in DB
        */
    }

    public function login($username, $password)
    {
        /*
        Check if user exists in DB.
        Use: isPasswordCorrect($password) to crontrol.
        Then... let user login ?
        */
    }

    // Just for testing purposes
    public function print() {
        echo "Name is $this->first_name" . PHP_EOL;
        echo "Last name is $this->last_name" . PHP_EOL;
        echo "Email is $this->email" . PHP_EOL;
        echo "Password is $this->password" . PHP_EOL;
    }
}

