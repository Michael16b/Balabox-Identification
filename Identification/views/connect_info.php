<?php

include __ROOT__."/views/header.html";

echo "Identifiant prof =";
var_dump($data['idprof']);
echo "<br>";
echo "Numéro téléphone élève =". $data['username'];
echo "<br>";
echo "mdp =". $data['password'];
?>
