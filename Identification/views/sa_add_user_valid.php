<?php
include __ROOT__."/views/header.html";
?>

<body>
    <div class="container">
        <h1>Informations utilisateur</h1>
        <p><i class="fa fa-user"></i> Nom d'utilisateur : <?php echo $data[0]; ?></p>
        <p><i class="fa fa-lock"></i> Mot de passe : <?php echo $data[1]; ?></p>
    </div>
</body>