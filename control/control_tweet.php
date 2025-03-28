<?php
require_once "model/model_tweet.php";

class TweetController {
    private $tweetModel;

    public function __construct() {
        $this -> tweetModel = new Tweet();
    }

    public function index($id) {
        $post = $this -> tweetModel -> getPost($id);
        $comments = $this -> tweetModel -> getComments($id);
        require "view/view_tweet.php";
    }

    public function addComment($user, $id, $comment) {
        $userId = $this -> tweetModel -> getUserId($user);
        $this -> tweetModel -> addComment($userId[0]["id"], $id, $comment);
    }
}