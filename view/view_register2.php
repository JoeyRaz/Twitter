<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style/register2.css">
        <title>Twe😸t</title>
    </head>
    <body>
        <div class="moi">
            <h2>Twe😸t</h2> 
            <div class="emoji-container">😸</div>
            <form action="register2.php" method="post" enctype="multipart/form-data">
                <label for="lanadelrey">
                    <img src="https://via.placeholder.com/100" id="kiss" class="lolirock" alt="Photo de profil">
                </label>
                <input type="file" id="lanadelrey" name="picture" accept="image/*">
                <br><br>
                <input type="text" id="display_name" name="display_name" placeholder="Nom d'affichage"><br><br>
                <input type="text" id="bio" name="biography" placeholder="Votre bio"><br><br>
                <input type="tel" id="phone" name="phone" placeholder="Numéro de téléphone"><br><br>
                <input type="url" id="url" name="url" placeholder="lien"><br><br>
                <input type="text" id="city" name="city" placeholder="Ville"><br><br>
                <input type="text" id="country" name="country" placeholder="Pays"><br><br>
                
                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    <option value="">Sélectionner...</option>
                    <option value="femme">Femme</option>
                    <option value="homme">Homme</option>
                    <option value="autre">Autre</option>
                </select>
                <br><br>
                <div class="bebe">
                <label for="nsfw">Voir du contenu sensible (NSFW) :</label>
                <input type="checkbox" id="nsfw" name="nsfw" value="true">
                <br><br>
                </div>
                <button type="submit" name="complete">S'inscrire</button>
            </form>
        </div>
    </body>
</html>