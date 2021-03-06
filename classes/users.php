<?php

class User extends DataBase
{
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $verified_password;
    private $hashed;    // Necessary ?
    private $error_messages = [];


    public function __construct($first_name, $last_name, $email, $password, $verified_password)
    {
        $this->setName($first_name);
        $this->setLastName($last_name);
        $this->setEmail($email);
        $this->setPassword($password, $verified_password);
    }

    public function setName($name = null)
    {
        //if (isset($_POST["firstname"])) {
            if ($name == null || !preg_match("/^[a-zA-Z ]*$/", $name)) {
                $this->error_messages[] = "Use only letters on Name field";
                $this->first_name = null;
            } else {
                $this->first_name = $name;
            }
        //}
    }

    public function getName()
    {
        return $this->first_name;
    }

    public function setLastName($last = null)
    {
        //if (isset($last)) {
            if ($last == null || !preg_match("/^[a-zA-Z ]*$/", $last)) {
                $this->error_messages[] = "Use only letters on Last Name field";
                $this->last_name = null;
            } else {
                $this->last_name = $last;
            }
        //}
    }
    
    public function getLastName()
    {
        return $this->last_name;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error_messages[] = "Email has an invalid format";
            $this->email = null;
        } else {
            $this->email = $email;
        }
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password, $verified_password)
    {
        if (isset($password, $verified_password)) {
            if ($password === $verified_password && $password !== "" && $verified_password !== "") {
                // Hashing password
                $this->password = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $this->error_messages[] = "Passwords do not match";
                $this->password = null;
            }
        }
    }
    
    public function getPassword()
    {
        // $sql = 'SELECT * FROM users_db.users WHERE password = ?';
        // $stmt = $this->connect()->prepare($sql);
        // $stmt->execute([$password]);

        // $passwords=$stmt->fetchAll();

        // foreach ($passwords as $password) {
        //     echo  '<p>' . $name['password'] . '</p>' . "\n";

        // }
        return $this->password;
    }

    /*
        Evaluates if some object property (inputs) has NULL as a value
        If so just return FALSE att the first NULL
    */
    public function areInputsValid() {
        $inputs = [$this->first_name, $this->last_name, $this->email, $this->password];
        foreach ($inputs as $input) {
            if ($input == null) {
                return false;
            }
        }
        return true;
    }

    /*
        Prints all errors messages saved when
        each SETTER evaluated the input.
    */
    public function showErrorMessages() {
        foreach ($this->error_messages as $error) {
            echo $error . PHP_EOL;
        }
    }

    public function getAllUsersStmt($email)
    {
        /*Kör statementet i databasen före användaren skriver in sin input vilket skyddar
        koden från att användaren lägger in något i databasen*/
        $sql = 'SELECT * FROM users_db.users WHERE email = ?';
        //Hämtar connect-metod från DataBase-klassen och passar in $sql som argument i query-metoden.
        $stmt = $this->connect()->prepare($sql);
        //executing datan som användaren har skrivit in
        $stmt->execute([$email]);
        //Getting all users with that email
        $users=$stmt->fetchAll();

        foreach ($users as $user) {
            echo  '<p>' . $user['firstname'] . '</p>' . "\n";
            echo  '<p>' . $user['email'] . '</p>' . "\n";
        }
        print_r($users);
        return $user['firstname'];
    }

    //Får värden från "setX" funktionerna efter att de har validerats och skickar resultatet till databasen om de ha gått igenom valideringen.
    public function registerUserInDB()
    {
        //if (isset($_POST["submit_btn"])) {
            //Checks in DB if email already exsists, else it inserts the users validated inputs into DB.
            $sql_user_exsist = ("SELECT email FROM users_db.users WHERE email = :email");
            $sthandler = $this->connect()->prepare($sql_user_exsist);
            $sthandler->bindParam(':email', $this->email);
            $sthandler->execute();
            if ($sthandler->rowCount() > 0) {
                echo "Email already registerd! Please choose another email";
            } else {
                $sql = ("INSERT INTO users_db.users(firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
                $statement = $this->connect()->prepare($sql);
                $statement->execute([$this->first_name, $this->last_name, $this->email, $this->password]);
                echo "Successfully inserted user into DB!";
            }
        //}
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

    // public function registerOnDB()
    // {
    //     /*
    //     Parameters should have been controled by its own setter at this point.
    //     Just SET all user info in DB
    //     */
    // }

    public function startSession()
    {
        
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
        echo "Name is $this->first_name" . PHP_EOL;
        echo "Last name is $this->last_name" . PHP_EOL;
        echo "Email is $this->email" . PHP_EOL;
        echo "Password is $this->password" . PHP_EOL;
    }
}
