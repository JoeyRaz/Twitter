<?php
require_once "model/model_register.php";

class RegisterController {
    private $registerModel;

    public function __construct() {
        $this -> registerModel = new Register();
    }

    public function index() {
        $users = $this -> registerModel -> getUsers();
        require "view/view_register.php";
    }

    public function checkUsers($email) {
        $users = $this -> registerModel -> checkUsers($email);
    }

    public function addUser($firstname, $lastname, $username, $email, $birthdate, $password) {
        $this -> registerModel -> addUser($firstname, $lastname, $username, $email, $birthdate, $password);
    }
}