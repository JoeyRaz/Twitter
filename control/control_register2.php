<?php
require_once "model/model_register2.php";

class Register2Controller {
    private $register2Model;

    public function __construct() {
        $this -> register2Model = new Register2();
    }

    public function index() {
        require "view/view_register2.php";
    }

    public function completeUser($email, $display_name, $phone, $url, $biography, $city, $country, $genre, $picture, $NSFW = FALSE) {
        $this -> register2Model -> completeUser($email, $display_name, $phone, $url, $biography, $city, $country, $genre, $picture, $NSFW);
    }
}