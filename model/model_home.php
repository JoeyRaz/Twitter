<?php
class Home {
    private $db;

    public function __construct() {
        $this -> db = new PDO('mysql:host=localhost;dbname=twitter', 'Joey', 'root');
    }

    public function getUser($email_user) {
        $query = $this -> db -> prepare('SELECT * FROM user WHERE email = "' . $email_user . '"');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPosts() {
        $query = $this -> db -> prepare('SELECT * FROM tweet INNER JOIN user ON tweet.id_user = user.id ORDER BY tweet.id DESC');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchPosts($search) {
        $query = $this -> db -> prepare('SELECT * FROM tweet INNER JOIN user ON tweet.id_user = user.id WHERE content LIKE "%' . $search . '%" ORDER BY tweet.id DESC');
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPost($id_user, $NSFW, $content, $image) {
        $query = $this -> db -> prepare('INSERT INTO tweet (id_user, NSFW, content, media1) VALUES ("' . $id_user[0]["id"] . '", "' . $NSFW . '", "' . $content . '", "' . $image . '")');
        $query -> execute();
    }

    public function addHashtag($hastag) {
        $query = $this -> db -> prepare('INSERT INTO hashtag (name) VALUES ("' . $hastag . '")');
        $query -> execute();
    }
}