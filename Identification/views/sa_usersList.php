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
                                <button class="btn btn-primary"><i class="fas fa-edit"></i> Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<a href="sa_userCreate" class="btn btn-primary btn-lg position-fixed" style="bottom: 20px; right: 20px;" role="button">+</a>

<script>
    // récupérer l'élément de recherche
    const searchInput = document.getElementById('search');

    // récupérer tous les cartes d'utilisateurs
    const userCards = document.querySelectorAll('#user-cards .card');

    // ajouter un écouteur d'événements pour la saisie utilisateur
    searchInput.addEventListener('input', () => {
        // récupérer la valeur de recherche
        const searchValue = searchInput.value.trim().toLowerCase();

        // boucler sur toutes les cartes d'utilisateurs
        userCards.forEach(card => {
            // récupérer le nom d'utilisateur et le nom complet
            const username = card.querySelector('.card-title').textContent.trim().toLowerCase();
            const fullName = card.querySelector('.card-text').textContent.trim().toLowerCase();

            // vérifier si le nom d'utilisateur ou le nom complet contient la valeur de recherche
            if (username.includes(searchValue) || fullName.includes(searchValue)) {
                // afficher la carte d'utilisateur
                card.style.display = 'block';
            } else {
                // cacher la carte d'utilisateur
                card.style.display = 'none';
            }
        });
    });
</script>

</body>