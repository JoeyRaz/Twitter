<?php
require_once "control/control_register.php";

$controller = new RegisterController();

$controller -> index();
if (isset($_POST["email"])) {
    $check = $controller -> checkUsers($_POST["username"], $_POST["email"]);
    if ($check == "") {
        setcookie("email", $_POST["email"], time()+60*60*24*30);
        $controller -> addUser($_POST["firstname"], $_POST["lastname"], $_POST["username"], $_POST["email"], $_POST["birthdate"], $_POST["password"]);
    }
}