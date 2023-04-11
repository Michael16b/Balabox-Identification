<?php
include __ROOT__."/views/header.html";
?>

<body>

<div class="container my-4">
    <h1>Liste des utilisateurs</h1>
    <input type="text" id="search" class="form-control my-3" placeholder="Rechercher un utilisateur...">
    <?php if (count($users) == 0) { ?>
        <p>Pas d'utilisateur</p>
    <?php } else { ?>
        <div class="row justify-content-center" id="user-cards">
            <?php foreach ($users as $user) { ?>
                <div class="col-sm-6 col-md-6 col-lg-4 px-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $user['username']; ?></h5>
                            <p class="card-text"><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-danger mx-2"><i class="fas fa-trash-alt"></i> Supprimer</button>
                                <button type="button" id="updateUserbtn" class="btn btn-primary" data-groupname="<?php echo $user['username']; ?>" data-bs-toggle="modal" data-bs-target="#update-user-modal-<?php echo $group['id']; ?>"><i class="fas fa-edit"></i>Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

        <!-- Update User -->
        <div class="modal fade" id="update-user-modal-<?php echo $group['id']; ?>" tabindex="-1" aria-labelledby="update-user-modal-<?php echo $group['id']; ?>-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update-user-modal-<?php echo $group['id']; ?>-label">Modifier l'utilisateur <span id="user-name-update"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="surname-user" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="lastname-update" name="newLastName" placeholder="Dupont" required>
                        </div>
                        <div class="mb-3">
                            <label for="name-user" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="name-update" name="newName" placeholder="Xavier" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" id="username" class="form-control" value="xdupont" name="isUpdateUser" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Voulez-vous changer le mot de passe ?</label>
                            <select class="form-select" aria-label="Modifier le mot de passe" name="newPassword">
                                        <option selected value="false">Non</option>
                                        <option value="true">Oui</option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
</div>

<a href="sa_userCreate" class="btn btn-primary btn-lg position-fixed" style="bottom: 20px; right: 20px;" role="button">+</a>

<script>
    const searchInput = document.getElementById('search');
    const userCards = document.querySelectorAll('#user-cards .card');
    var users = <?php echo json_encode($users); ?>;


    searchInput.addEventListener('input', () => {
        const searchValue = searchInput.value.trim().toLowerCase();

        userCards.forEach(card => {
            const username = card.querySelector('.card-title').textContent.trim().toLowerCase();
            const fullName = card.querySelector('.card-text').textContent.trim().toLowerCase();

            if (username.includes(searchValue) || fullName.includes(searchValue)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });


        // Update user
        var updateUserButton = document.querySelectorAll('[data-bs-toggle="modal"]');
        
        updateUserButton.forEach(function (button) {
            button.addEventListener("click", function () {
                username = this.getAttribute("data-groupname");
                document.getElementById('user-name-update').innerHTML = username;

                Object.keys(users).forEach(function (key) {
                    var user = users[key];
                    if (user["username"] == username) {
                        document.getElementById('name-update').value = user["firstname"];
                        document.getElementById('lastname-update').value = user["lastname"];
                        document.getElementById('username').value = username;
                    }
                });
            });
        });

</script>

</body>