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

    public function __construct($first_name, $last_name, $email, $password, $verified_password)
    {
        $this->setName($first_name);
        $this->setLastName($last_name);
        $this->setEmail($email);
        $this->setPassword($password, $verified_password);
    }

    /*Testar att hämta alla users*/
    // public function getAllUsers()
    // {
    //     $sql = 'SELECT * FROM users_db.users';
    //     //Hämtar connect-metod från DataBase-klassen och passar in $sql som argument i query-metoden.
    //     $stmt = $this->connect()->query($sql);
    //     //Fetching the data
    //     while ($row = $stmt->fetch()) {
    //         echo  '<p>' . $row['email'] . '</p>' . "\n";
    //     }
    // }

    /*Testar att hämta alla users med prepared statements*/
    public function getAllUsersStmt($first_name, $last_name)
    {
        /*Kör statementet i databasen före användaren skriver in sin input vilket skyddar
        koden från att användaren lägger in något i databasen*/
        $sql = 'SELECT * FROM users_db.users WHERE firstname = ? AND lastname = ?';
        //Hämtar connect-metod från DataBase-klassen och passar in $sql som argument i query-metoden.
        $stmt = $this->connect()->prepare($sql);
        //executing datan som användaren har skrivit in
        $stmt->execute([$first_name, $last_name]);
        //Getting all names
        $names=$stmt->fetchAll();

        foreach ($names as $name) {
            echo  '<p>' . $name['firstname'] . '</p>' . "\n";
        }
    }

    public function setName($name)
    {
        // TODO: Input control?
    if (isset($_POST["firstname"])) {
        if ($name != is_string($name) && $name != is_int($name)) {
            echo "Name is not a string";
            throw new Exception('$name must be a string!');
            return false;
        } else {
            //echo $name;
            return $this->first_name = $name;
        }
    }
    }

    //Får värden från "setX" funktionerna efter att de har validerats och skickar resultatet till databasen om de ha gått igenom valideringen.
    public function setUser($set_first_name, $set_last_name, $set_email, $set_password)
    {
        if (isset($_POST["submit_btn"])) {
            if ($set_first_name !== false && $set_last_name !== false && $set_email !== false && $set_password !== false) {
                $sql = ("INSERT INTO users_db.users(firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
                $statement = $this->connect()->prepare($sql);
                $statement->execute([$set_first_name, $set_last_name, $set_email, $set_password]);
                echo "Successfully inserted user into DB!";
            }
        }
    }

    public function getName()
    {
        // Elegant and robust database code goes here
        return $this->first_name;
    }

    public function setLastName($last)
    {
        // TODO: Input control?
        if (isset($last)) {
            if (!is_string($last)) {
                throw new Exception('$name must be a string!');
                return false;
            } else {
<<<<<<< HEAD
                $this->last_name = $last;
                //echo $last;
=======
                return $this->last_name = $last;
>>>>>>> 76edceca3d39e4db8ff8266e603bccc1adb6ace7
            }
        }
    }
    
    public function getLastName()
    {
        // Elegant and robust database code goes here
        return $this->last_name;
    }

    public function setEmail($email)
    {
        if (isset($email)) {
<<<<<<< HEAD
            $this->email = $email;
            //echo $email;
=======
            return $this->email = $email;
        } else {
            return false;
>>>>>>> 76edceca3d39e4db8ff8266e603bccc1adb6ace7
        }
    }
    
    public function getEmail()
    {
        // Elegant and robust database code goes here
        return $this->email;
    }

    public function setPassword($password, $verified_password)
    {
        if (isset($password, $verified_password)) {
            if ($password === $verified_password && $password !== "" && $verified_password !== "") {
                echo "passwords matches";
                return $this->password = $password;
            } else {
                echo "ERROR: Passwords do not match." . PHP_EOL;
                return false;
            }
        }
    }
    
    public function getPassword()
    {
        // Elegant and robust database code goes here
        return $this->password;
    }


    public function isPasswordCorrect($password)
    {
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
    public function print()
    {
        // echo "Name is $this->first_name" . PHP_EOL;
        // echo "Last name is $this->last_name" . PHP_EOL;
        // echo "Email is $this->email" . PHP_EOL;
        // echo "Password is $this->password" . PHP_EOL;
    }
}
