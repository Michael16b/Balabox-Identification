<!-- 
<h1> Main page</h1>
<a href="/connect">Click here to display the connection form.</a>  -->

<?php
include __ROOT__."/views/header.html";
?>

<body>
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
        <button class="ui button" type="submit">Connexion</button>
    </form>

<!-- 
    <form action="/connect" method="post">
        <label>Prénom :</label><br>
        <input type="text" name="firstname" required><br>
        <label>Nom</label> :<br>
        <input type="text" name="lastname" required><br>
        <input type="submit" value="Valider"><br>
    </form> -->

    <a href="/seeConfig">Click here to see your php config.</a>
</body>