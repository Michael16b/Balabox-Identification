<?php
include __ROOT__."/views/header.html";
?>

<body>

<div class="container my-4">
    <h1>Liste des utilisateurs</h1>
    <?php if (count($users) == 0) { ?>
        <p>Pas d'utilisateur</p>
    <?php } else { ?>
        <?php var_dump($users) ?>
    <?php } ?>
</div>


<a href="sa_userCreate" class="btn btn-primary position-fixed" style="bottom: 20px; right: 20px;" role="button">+</a>
</body>