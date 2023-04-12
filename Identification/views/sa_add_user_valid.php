<?php
include __ROOT__."/views/header.html";
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Informations utilisateur</h1>
                <div class="row">
                    <div class="col-md-3">
                        <p><i class="fas fa-user"></i> Nom d'utilisateur :</p>
                    </div>
                    <div class="col-md-9">
                        <p><?php echo $data[0]; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p><i class="fas fa-lock"></i> Mot de passe :</p>
                    </div>
                    <div class="col-md-9">
                        <p><?php echo $data[1]; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p><i class="fas fa-user-tag"></i> Rôle :</p>
                    </div>
                    <div class="col-md-9">
                        <p><?php echo $data[2]; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p><i class="fas fa-graduation-cap"></i> Classe :</p>
                    </div>
                    <div class="col-md-9">
                        <p><?php echo $data[3]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>