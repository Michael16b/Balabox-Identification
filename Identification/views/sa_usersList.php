<?php
include __ROOT__."/views/header.html";
?>

<body>

<div class="container my-4">
    <h1>Liste des groupes</h1>
    <?php foreach($groups as $group) { ?>
        <div class="card my-3">
        <div class="card-header d-flex justify-content-between align-items-center"> 
            <h2 class="mb-0"><?php echo $group['name']; ?></h2>
            <div class="align-items-center">
                <form action="/sa_usersList" method="post">
                    <input type="hidden" name="isDeleteGroup" value="<?php echo $group['name']; ?>" />
                    <button type="submit" class="btn btn-danger align-items-center me-3" style="width: 40px; height: 40px;"><i class="fas fa-trash-alt"></i></button>
                </form>
                <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#add-member-modal-<?php echo $group['id']; ?>" style="width: 40px; height: 40px;"><i class="fas fa-user-plus"></i></button>
            </div>
        </div>

            <div class="card-body">
                <p><?php echo $group['description']; ?></p>
                <h3>Membres :</h3>
                <ul>
                    <?php foreach($group['members'] as $member) { ?>
                        <li><?php echo $member['lastname'] . ' ' . $member['firstname'] . ' (' . $member['username'] . ')'; ?></li>
                    <?php } ?>
                </ul>
                <div class="modal fade" id="add-member-modal-<?php echo $group['id']; ?>" tabindex="-1" aria-labelledby="add-member-modal-<?php echo $group['id']; ?>-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-member-modal-<?php echo $group['id']; ?>-label">Ajouter un membre à <?php echo $group['name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                            // Inclure ici le code PHP pour récupérer tous les utilisateurs existants
                        ?>
                        <ul>
                            <?php foreach($users as $user) { ?>
                                <li><?php echo $user['lastname'] . ' ' . $user['firstname'] . ' (' . $user['username'] . ')'; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


</body>