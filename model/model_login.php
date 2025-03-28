<?php
class Login {
    private $db;

    public function __construct() {
        $this -> db = new PDO('mysql:host=localhost;dbname=twitter', 'Joey', 'root');
    }

    public function getUsers() {
        $query = $this -> db -> prepare('SELECT * FROM user');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }
}