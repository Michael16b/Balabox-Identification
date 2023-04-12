<?php
include __ROOT__."/views/header.html";
?>

<body>
<div class="container">
        <h1>Informations utilisateur</h1>
        <p><i class="fa fa-user"></i> Rôle : <?php echo $_SESSION['role']; ?></p>
        <p><i class="fa fa-phone"></i> Numéro de téléphone élève : <?php echo $_SESSION['username']; ?></p>
        <p><i class="fa fa-lock"></i> Mot de passe : <?php echo $_SESSION['password']; ?></p>
        <form action="/disconnect" method="post">
            <button type="submit" class="btn btn-danger"><i class="fa fa-sign-out"></i> Se déconnecter</button>
        </form>
    </div>
</body>
