<?php
include __ROOT__."/views/header.html";
?>

<body>
    <div class="container">
        <h1>Informations utilisateur</h1>
        <div class="row">
            <div class="col-md-3">
                <p><i class="fas fa-user"></i> Nom d'utilisateur :</p>
                <p><i class="fas fa-lock"></i> Mot de passe :</p>
                <p><i class="fas fa-user-tag"></i> Rôle :</p>
                <p><i class="fas fa-graduation-cap"></i> Classe :</p>
            </div>
            <div class="col-md-9">
                <p><?php echo $data[0]; ?></p>
                <p><?php echo $data[1]; ?></p>
                <p><?php echo $data[2]; ?></p>
                <p><?php echo $data[3]; ?></p>
            </div>
        </div>
    </div>
</body>