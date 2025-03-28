<?php
class User {
    private $db;

    public function __construct() {
        $this -> db = new PDO('mysql:host=localhost;dbname=twitter', 'Joey', 'root');
    }

    public function getUser($email_user) {
        $query = $this -> db -> prepare('SELECT * FROM user WHERE email = "' . $email_user . '"');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserPosts($email_user) {
        $query = $this -> db -> prepare('SELECT * FROM tweet INNER JOIN user ON tweet.id_user = user.id WHERE reply_to IS NULL AND user.email = "' . $email_user . '" ORDER BY tweet.id DESC');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }
}