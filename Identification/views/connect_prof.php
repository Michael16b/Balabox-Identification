<?php
include __ROOT__."/views/header.html";
?>


<body>
    <div class="center-container">
        <img class="pure-img logo-acc" src="../static/assets/logo_balabox.png">
        <form action="/connect" method="post" class="pure-form pure-form-stacked">
            <fieldset>
                <input type="text" id="stacked-num" placeholder="Numéro associé" /></label><br>
                <input type="password" id="stacked-password" placeholder="Mot de passe" /><br>
                <button type="submit" class="pure-button pure-button-primary">Connexion</button><br>
                <button class="pure-button pure-button-txt"><a href="/">Je suis élève</a></button>
            </fieldset>
        </form>
    </div>
</body>