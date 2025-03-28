<?php
class Register2 {
    private $db;

    public function __construct() {
        $this -> db = new PDO('mysql:host=localhost;dbname=twitter', 'Joey', 'root');
    }

    public function completeUser($email, $display_name, $phone, $url, $biography, $city, $country, $genre, $picture, $NSFW) {
        if ($display_name == "") {
            $display_name = "";
        }
        if ($phone == "") {
            $phone = NULL;
        }
        if ($url == "") {
            $url = NULL;
        }
        if ($biography == "") {
            $biography = NULL;
        }
        if ($city == "") {
            $city = NULL;
        }
        if ($country == "") {
            $country = NULL;
        }
        if ($genre == "") {
            $genre = NULL;
        }
        if ($picture == "") {
            $picture = NULL;
        }
        if ($NSFW == "") {
            $query = $this -> db -> prepare('UPDATE user SET display_name = "' . $display_name . '", phone = "' . $phone . '", url = "' . $url . '", biography = "' . $biography . '", city = "' . $city . '", country = "' . $country . '", genre = "' . $genre . '", picture = "' . $picture . '", NSFW = FALSE WHERE email = "' . $email . '"');
        } else {
            $query = $this -> db -> prepare('UPDATE user SET display_name = "' . $display_name . '", phone = "' . $phone . '", url = "' . $url . '", biography = "' . $biography . '", city = "' . $city . '", country = "' . $country . '", genre = "' . $genre . '", picture = "' . $picture . '", NSFW = TRUE WHERE email = "' . $email . '"');
        }
        $query -> execute();
    }
}