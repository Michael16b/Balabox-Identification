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
                <a class="pure-button pure-button-txt" href="/connect_Prof">Je suis professeur</a>
            </fieldset>
        </form>
    </div>
</body>