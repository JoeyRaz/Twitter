<?php
// phpinfo();
class Register {
    private $db;

    public function __construct() {
        $this->db=new PDO('mysql:host=localhost;dbname=twitter', 'Joey', 'root');
    }

    public function getUsers() {
        $query=$this -> db -> prepare('SELECT * FROM user');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkUsers($email) {
        $query = $this -> db -> prepare('SELECT * FROM user WHERE email = "' . $email . '"');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($firstname, $lastname, $username, $email, $birthdate, $password) {
        $password = hash("ripemd160", $password);
        $query = $this -> db -> prepare('INSERT INTO user (firstname, lastname, username, email, birthdate, password) VALUES ("' . $firstname . '", "' . $lastname . '", "' . $username . '", "' . $email . '", "' . $birthdate . '", "' . $password . '")');
        $query -> execute();
    }
}