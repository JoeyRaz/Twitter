<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="/style/user.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <ul>
                <li class="logo"><img src="/image/logo.png" alt="logo"></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Explorer</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Profil</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="profil">
                <?php
                if ($user[0]["header"] != "") {
                echo '<div class="banniere" style="background-image: url(\'upload_img/' . $user[0]["header"] . '\')">';
                } else {
                echo '<div class="banniere" style="background-image: url(\'image/background.png\');">';
                }
                ?>
                    <div class="photo-profil">
                        <?php
                        if ($user[0]["picture"] != "") {
                            echo '<img src="upload_img/' . $user[0]["picture"] . '" alt="Photo de profil">';
                        } else {
                            echo '<img src="/image/bg1.jpg" alt="Photo de profil">';
                        }
                        ?>
                    </div>
                    <div class="infos">
                        <?php
                        if ($user[0]["display_name"] != "") {
                            echo "<h1>" . $user[0]["display_name"] . "</h1>";
                        } else {
                            echo "<h1>" . $user[0]["lastname"] . " " . $user[0]["firstname"] . "</h1>";
                        }
                        echo "<p>@" . $user[0]["username"] . "</p>";
                        echo "<p>" . $user[0]["biography"] . "</p>";
                        if ($user[0]["city"] != "" || $user[0]["country"] != "") {
                            if ($user[0]["city"] == "") {
                                echo "<p>📍" . $user[0]["country"] . "</p>";
                            } else if ($user[0]["country"] == "") {
                                echo "<p>📍" . $user[0]["city"] . "</p>";
                            } else {
                                echo "<p>📍" . $user[0]["city"] . " - " . $user[0]["country"] . "</p>";
                            }
                        } else {
                            echo "<p>📍 Cachée</p>";
                        }
                        if ($user[0]["url"] != "") {
                            echo '<p>🔗<a href="' . $user[0]["url"] . '">' . $user[0]["url"] . '</a></p>';
                        } else {
                            echo "<p>🔗 Aucun</p>";
                        }
                        echo "<p>📅 Inscrition : " . $user[0]["creation_date"] . "</p>";
                        ?>
                    </div>
                </div>
                <div class="bouton">
                    <button>Modifier le profil</button>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="#">Twe😸t</a></li>
                        <li><a href="#">Réponses</a></li>
                        <li><a href="#">Médias</a></li>
                        <li><a href="#">J'aime</a></li>
                    </ul>
                </div>
                <div class="tweets">
                    <?php
                    foreach ($userPosts as $userPost) {
                        echo '<div class="userPost"><div class="user">';
                        if ($userPost["picture"] == "") {
                            echo '<img src="image/icone_user.png" alt="User">';
                        } else {
                            echo '<img src="upload_img/' . $post["picture"] . '" alt="User">';
                        }
                        if ($userPost["display_name"] == "") {
                            echo $userPost["firstname"] . " " . $userPost["lastname"];
                        } else {
                            echo $userPost["display_name"];
                        }
                        echo '&nbsp;<span class="username">@' . $userPost["username"] . '</span>';
                        echo '</div><div class="content">';
                        
                        $content = explode(" ", $userPost["content"]);
                        foreach ($content as $key => $value) {
                            if ($value[0] == "#") {
                                $noHash = str_replace("#", "%23", $value);
                                $content[$key] = '<a href="home.php?search=' . $noHash . '">' . $value . '</a>';
                            }
                        }
                        $content = implode(" ", $content);
                        echo $content . "<br>";

                        if ($userPost["media1"] != "") {
                            echo '<img src="upload_img/' . $userPost["media1"] . '" alt="picture">';
                        }
                        echo '</div><div class="bouton">';
                        echo '<button class="comment"><img src="image/comment.png" alt="Comment"></button><button class="repost"><img src="image/repost.png" alt="Repost"></button>';
                        echo '</div></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="navbar">
            <form action="home.php" method="get">
                <input type="search" class="barre" name="search" placeholder="Recherche">
                <button class="button">Rechercher</button>
            </form>
        </div>
    </div>
</body>
</html>