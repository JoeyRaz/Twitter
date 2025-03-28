<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style/register.css">
        <title>Twe😸t</title>
    </head>
    <body>
        <?php
        if (isset($_POST["register"])) {
            $check_mail = true;
            foreach ($users as $user) {
                if ($user["email"] == $_POST["email"]) {
                    $check_mail = false;
                }
            }
            if ($check_mail == true) {
                header("Location: register2.php");
            } else {
                echo "Le compte ou nom d'utilisateur existe déjà ..."; //Créer une alert CSS ici
            }
        }
        ?>
        <div class="container">
            <h1>Twe😸t</h1>
            <p>Créer votre compte</p>
            <form action="register.php" method="POST">
                <input type="text" name="firstname" placeholder="Votre prénom" required>
                <input type="text" name="lastname" placeholder="Votre nom" required>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="email" name="email" placeholder="Votre email" required>
                <input type="date" name="birthdate" placeholder="Date de naissance" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit" name="register">Rejoindre Twe😸t</button>
            </form>
        </div>
        <!-- Ajouter un boutton "T'as déjà un compte ? Connecte toi" avec un lien <a> -->
    </body>
</html>