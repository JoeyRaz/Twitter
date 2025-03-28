<?php
require_once "control/control_tweet.php";

$controller = new TweetController();

if (isset($_POST["comment"])) {
    $controller -> addComment($_COOKIE["email"], $_COOKIE["post"], $_POST["comment"]);
}
$controller -> index($_COOKIE["post"]);