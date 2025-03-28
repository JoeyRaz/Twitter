<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Post et Commentaires</title>
        <link rel="stylesheet" href="/style/tweet.css">
        <script src="/script/home.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="nav">
                <ul>
                    <li><span class="logo"><img src="/image/logo.png" alt="Logo"></span></li>
                    <li><a href="/home.php">Accueil</a></li>
                    <li><a href="#">Rechercher</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="/user.php">Profil</a></li>
                    <li><a href="#">Paramètres</a></li><br>
                    <span class="post_button">Je poste !</span>
                </ul>
            </div>
            
            <div class="main-content">
                <?php
                echo '<div class="userPost"><div class="user">';
                if ($post[0]["picture"] == "") {
                    echo '<img src="image/icone_user.png" alt="Profil">';
                } else {
                    echo '<img src="upload_img/' . $post[0]["picture"] . '" alt="Profil">';
                }
                if ($post[0]["display_name"] == "") {
                    echo $post[0]["firstname"] . " " . $post[0]["lastname"];
                } else {
                    echo $post[0]["display_name"];
                }
                echo '&nbsp;<span class="username">@' . $post[0]["username"] . '</span>';
                echo '</div><div class="content">';

                $content = explode(" ", $post[0]["content"]);
                foreach ($content as $key => $value) {
                    if ($value[0] == "#") {
                        $noHash = str_replace("#", "%23", $value);
                        $content[$key] = '<a href="home.php?search=' . $noHash . '">' . $value . '</a>';
                    }
                }
                $content = implode(" ", $content);
                echo $content . "<br>";

                if ($post[0]["media1"] != "") {
                    echo '<img src="upload_img/' . $post[0]["media1"] . '" alt="picture">';
                }
                echo '</div><div class="bouton">';
                echo '<button class="comment"><img src="/image/comment.png" alt="Comment"></button><button class="repost"><img src="/image/repost.png" alt="Repost"></button>';
                echo '</div></div>';

                echo '<div class="comments-section">';
                echo '<h2>Commentaires</h2>';

                ?>
                <form action="tweet.php" method="post" class="comment-form">
                    <input type="text" name="comment" placeholder="Ajouter un commentaire...">
                    <button>Envoyer</button>
                </form>
                <?php
                foreach ($comments as $comment) {
                    echo '<div class="comment">';
                    echo '<div class="user">';
                    if ($comment["picture"] != "") {
                        echo '<img src="upload_img/' . $comment["picture"] . '.png" alt="Profil">';
                    } else {
                        echo '<img src="image/icone_user.png" alt="Profil">';
                    }
                    if ($comment["display_name"] != "") {
                        echo $comment["display_name"];
                    } else {
                        echo $comment["lastname"] . " " . $comment["firstname"];
                    }
                    echo '&nbsp;<span class="username">@' . $comment["username"] . '</span>';
                    echo '</div>';
                    echo '<p>' . $comment["content"] . '</p>';
                    echo '</div>';
                }
                echo "</div>";
                ?>
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