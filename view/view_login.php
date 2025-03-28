<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Tweet_académie</title>
        <link rel="stylesheet" href="/style/login.css">
    </head>
    <body>
        <div class="login-container">
            <h1 class="title">Twe😸t</h1>
            <p class="subtitle">Connectez-vous</p>
            <form class="login-form" action="#" method="POST">
                <?php
                if (isset($_POST["email"])) {
                    foreach ($users as $user) {
                        if ($user["email"] == $_POST["email"]) {
                            $password = hash("ripemd160", $_POST["password"]);
                            if ($password == $user["password"]) {
                                setcookie("email", $_POST["email"], time()+60*60*24*30);
                                header("Location: home.php");
                            } else {
                                echo "Tromper de mot de passe..."; //Faite une alerte (CSS) ici
                            }
                        } else {
                            echo "Email innexistant !"; // Et ici
                        }
                    }
                }
                ?>
                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de Passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button"> <a href="#">Se Connecter</a></button>
            </form>
            <br>
            Pas de compte ? Inscrie-toi <a href="register.php">ici</a> !
        </div>
    </body>
</html>