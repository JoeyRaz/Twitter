window.onload = function () {
    textarea = document.getElementsByClassName("zonetext")[0];
    textarea.value = "";

    search = document.getElementsByClassName("barre")[0];
    search.value = "";

    textarea.addEventListener("input", () => {
        textarea.style.height = "5px";
        textarea.style.height = textarea.scrollHeight + "px";
    });

    document.getElementsByClassName("logo")[0].addEventListener("click", () => {
        window.location.href = "home.php";
    });
    document.getElementsByClassName("accueil")[0].addEventListener("click", () => {
        window.location.href = "home.php";
    });
    document.getElementsByClassName("rechercher")[0].addEventListener("click", () => {
        window.location.href = "home.php";
    });
    document.getElementsByClassName("messages")[0].addEventListener("click", () => {
        window.location.href = "message.php";
    });
    document.getElementsByClassName("profil")[0].addEventListener("click", () => {
        window.location.href = "user.php";
    });
    document.getElementsByClassName("paramètres")[0].addEventListener("click", () => {
        window.location.href = "settings.html";
    });
    document.getElementsByClassName("post_button")[0].addEventListener("click", () => {
        window.location.href = "home.php";
    });

    const posts = document.getElementsByClassName("post");
    for (const [key, value] of Object.entries(posts)) {
        console.log(value);
        value.addEventListener("click", () => {
            document.cookie = "post=" + value.id;
            window.location.href = "tweet.php";
        });
    }
}