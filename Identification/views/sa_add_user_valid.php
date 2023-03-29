<?php
include __ROOT__."/views/header.html";


if ($data[0] != null && $data[1] != null){
    echo "<h1> Nom d'utilisateur : $data[0]</h1>";
    echo "<h1> Mot de passe : $data[1]</h1>";
    } else {
        echo "Information non reconue";
}

include __ROOT__."/views/footer.html";
?>
