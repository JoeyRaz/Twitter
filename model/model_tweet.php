<?php
class Tweet {
    private $db;

    public function __construct() {
        $this -> db = new PDO('mysql:host=localhost;dbname=twitter', 'Joey', 'root');
    }

    public function getPost($id) {
        $query = $this -> db -> prepare('SELECT * FROM tweet INNER JOIN user ON tweet.id_user = user.id WHERE tweet.id = "' . $id . '"');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function getComments($id) {
        $query = $this -> db -> prepare('SELECT * FROM tweet INNER JOIN user ON tweet.id_user = user.id WHERE reply_to = ' . $id);
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserId($user) {
        $query = $this -> db -> prepare('SELECT id FROM user WHERE email = "' . $user . '"');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($userId, $id, $comment) {
        var_dump($userId);
        $query = $this -> db -> prepare('INSERT INTO tweet (id_user, reply_to, content) VALUES (' . $userId . ', ' . $id . ', "' . $comment . '")');
        $query -> execute();
    }
}