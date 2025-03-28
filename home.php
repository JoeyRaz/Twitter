<?php
require_once "control/control_home.php";

$controller = new HomeController();

if (isset($_POST["add"])) {
    if (isset($_FILES["image"])) {
        $img_name = $_FILES["image"]["name"];
        $img_size = $_FILES["image"]["size"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
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
    } else {
        $new_img_name = "";
    }

    $searchHash = explode(" ", $_POST["content"]);
    foreach ($searchHash as $value) {
        if ($value[0] == "#") {
            $controller -> addHashtag($value);
        }
    }

    if (isset($_POST["NSFW"])) {
        $controller -> addPost($_COOKIE["email"], 1, $_POST["content"], $new_img_name);
    } else {
        $controller -> addPost($_COOKIE["email"], 0, $_POST["content"], $new_img_name);
    }
}
if (isset($_GET["search"])) {
    $controller -> index2($_COOKIE["email"], $_GET["search"]);
} else {
    $controller -> index($_COOKIE["email"]);
}