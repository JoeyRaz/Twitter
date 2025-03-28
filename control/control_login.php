<?php
require_once "model/model_login.php";

class LoginController {
    private $loginModel;

    public function __construct() {
        $this -> loginModel = new Login();
    }

    public function index() {
        $users = $this -> loginModel -> getUsers();
        require "view/view_login.php";
    }
}