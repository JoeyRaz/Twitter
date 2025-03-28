<?php
require_once "model/model_user.php";

class UserController {
    private $userModel;

    public function __construct() {
        $this -> userModel = new User();
    }

    public function index($email_user) {
        $user = $this -> userModel -> getUser($email_user);
        $userPosts = $this -> userModel -> getUserPosts($email_user);
        require "view/view_user.php";
    }
}