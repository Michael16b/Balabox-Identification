<?php
include __ROOT__."/views/header.html";
?>

<body>
    <div class="center-container">
        <img class="pure-img" src="../static/assets/logo_balabox.png">
        <form class="pure-form pure-form-stacked">
            <fieldset>
                <input type="text" id="stacked-num" placeholder="Numéro associé" />
                <input type="password" id="stacked-password" placeholder="Mot de passe" />
    
                <button type="submit" class="pure-button pure-button-primary">Se connecter</button>
            </fieldset>
            <button type="submit" class="pure-button pure-button-txt">Je suis professeur</button>
        </form>
    </div>
</body>


<!-- <body>
    <div class="ui segment custom-img">
        <img class="ui centered medium image" src="../static/assets/logo_balabox.png">
    </div>

    <form class="ui form" action="/connect" method="post">
        <div class="field">
            <label>Identifiant</label>
            <input type="text" name="id" placeholder="Ton identifiant">
        </div>
        <div class="field">
            <label>Mot de passe</label>
            <input type="password">
        </div>
        <button class="ui orange button" type="submit">Connexion</button>
    </form>

    <a href="/seeConfig">Click here to see your php config.</a>
</body> -->