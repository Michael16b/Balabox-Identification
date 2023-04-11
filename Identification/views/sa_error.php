<?php
include __ROOT__."/views/header.html";
?>

<body>

    <div class="container my-4">
        <?php if(strpos($data['message'], 'CSV') !== false || strpos($data['message'], 'POST') !== false || $data['message'] === 'Le nom du groupe existe déjà') { ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> <?php echo $data['message']; ?>
            </div>
            <a href="javascript:history.go(-1)" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        <?php } elseif($data['message'] === 'Vous n\'avez pas de permission d\'entrer dans cette page') { ?>
            <div class="alert alert-warning">
                <i class="fas fa-lock"></i> <?php echo $data['message']; ?> <a href="/connect">Se connecter</a>
            </div>
        <?php } else { ?>
            <div class="alert alert-info">
                <?php echo $data['message']; ?>
            </div>
        <?php } ?>
    </div>

</body>
