<?php
require_once "control/control_user.php";

$controller = new UserController();

$controller -> index($_COOKIE["email"]);