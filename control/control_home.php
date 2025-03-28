<?php
require_once "model/model_home.php";

class HomeController {
    private $homeModel;

    public function __construct() {
        $this -> homeModel = new Home();
    }

    public function index($email_user) {
        $user = $this -> homeModel -> getUser($email_user);
        $posts = $this -> homeModel -> getPosts();
        require "view/view_home.php";
    }

    public function index2($email_user, $search) {
        $user = $this -> homeModel -> getUser($email_user);
        $posts = $this -> homeModel -> searchPosts($search);
        require "view/view_home.php";
    }

    public function addPost($email_user, $NSFW, $content, $image) {
        $id_user = $this -> homeModel -> getUser($email_user);
        $this -> homeModel -> addPost($id_user, $NSFW, $content, $image);
    }

    public function addHashtag($hastag) {
        $this -> homeModel -> addHashtag($hastag);
    }
}