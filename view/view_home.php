<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Tweet Académie</title>
        <link rel="stylesheet" href="style/home.css">
        <script src="script/home.js"></script>
    </head>
    <body>
        <div class="flex">
            <div class="nav">
                <ul>
                    <li><span class="logo"><img src="image/logo.png" alt="Logo"></span></li>
                    <li class="accueil"><a href="/home.php">Accueil</a></li>
                    <li class="rechercher"><a href="#">Rechercher</a></li>
                    <li class="notifications"><a href="#">Notifications</a></li>
                    <li class="messages"><a href="#">Messages</a></li>
                    <li class ="profil"><a href="/user.php">Profil</a></li>
                    <li class="paramètres"><a href="#">Paramètres</a></li><br>
                    <span class="post_button">Je poste !</span>
                </ul>
            </div>
            <div class="center">
                <div class="tweet">
                    <h2>Un tweet à partager ?</h2>
                </div>
                <div class="you_post">
                    <form action="home.php" method="post" enctype="multipart/form-data">
                        <textarea name="content" placeholder="Qu'est ce qui ce passe ici ?" class="zonetext"></textarea><br>
                        <input type="file" name="image" accept="image/*"><br>
                        <input type="checkbox" name="NSFW"> Contenu sensible (NSFW) <br><br>
                        <input type="submit" value="Post" name="add" class="post_button">
                    </form>
                </div>
                <div class="actuality">
                    <h2>
                        <?php
                        if (isset($_GET["search"])) {
                            echo "Recherche de \"" . $_GET["search"] . "\"";
                        } else {
                            echo "Ton fil d'activités";
                        }
                        ?>
                    </h2>
                    <?php
                    if ($posts != "") {
                        foreach ($posts as $post) {
                            echo '<div class="post"><div class="user">';
                            if ($post["picture"] == "") {
                                echo '<img src="image/icone_user.png" alt="User">';
                            } else {
                                echo '<img src="upload_img/' . $post["picture"] . '" alt="User">';
                            }
                            if ($post["display_name"] == "") {
                                echo $post["firstname"] . " " . $post["lastname"];
                            } else {
                                echo $post["display_name"];
                            }
                            echo '&nbsp;<span class="username">@' . $post["username"] . '</span>';
                            echo '</div><div class="content">';
                            
                            $content = explode(" ", $post["content"]);
                            foreach ($content as $key => $value) {
                                if ($value[0] == "#") {
                                    $noHash = str_replace("#", "%23", $value);
                                    $content[$key] = '<a href="home.php?search=' . $noHash . '">' . $value . '</a>';
                                }
                            }
                            $content = implode(" ", $content);
                            echo $content . "<br>";

                            if ($post["media1"] != "") {
                                echo '<img src="upload_img/' . $post["media1"] . '" alt="picture">';
                            }
                            echo '</div><div class="bouton">';
                            echo '<button class="comment"><img src="image/comment.png" alt="Comment"></button><button class="repost"><img src="image/repost.png" alt="Repost"></button>';
                            echo '</div></div>';
                        }
                    } else {
                        echo "Il semblerait que y a personne, soit le premier à poster ici !";
                    }
                    ?>
                </div>
                <div class="all_post">
                    <?php
                    ?>
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