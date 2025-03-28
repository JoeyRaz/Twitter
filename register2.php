<?php
require_once "control/control_register2.php";

$controller = new Register2Controller();

if (isset($_POST["complete"])) {
    if (isset($_FILES["picture"])) {
        // print_r($_FILES["picture"]);
        $img_name = $_FILES["picture"]["name"];
        $img_size = $_FILES["picture"]["size"];
        $tmp_name = $_FILES["picture"]["tmp_name"];
        $error = $_FILES["picture"]["error"];
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . "." . $img_ex_lc;
                $img_upload_path = "upload_img/" . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }
        }
    }
    if (isset($_POST["nsfw"])) {
        $controller -> completeUser($_COOKIE["email"], $_POST["display_name"], $_POST["phone"], $_POST["url"], $_POST["biography"], $_POST["city"], $_POST["country"], $_POST["genre"], $new_img_name, $_POST["nsfw"]);
    } else {
        $controller -> completeUser($_COOKIE["email"], $_POST["display_name"], $_POST["phone"], $_POST["url"], $_POST["biography"], $_POST["city"], $_POST["country"], $_POST["genre"], $new_img_name);
    }
    header("Location: home.php");
} else {
    $controller -> index();
}