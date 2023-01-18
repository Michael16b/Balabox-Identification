<?php
include __ROOT__."/views/header.html";
?>

<body>
    <!-- HEADER -->
    <nav class="navbar border-bottom">
        <div class="container-fluid">
            <img src="../static/img/logo_balabox.png" alt="Logo"  height="30" class="d-inline-block align-text-top">
            <form class="justify-content-start ">
                <a href="sa_classCreate"><button class="btn btn-outline-success me-2" type="button">Créer une classe</button></a>
                <button class="btn btn-sm btn-outline-secondary" type="button">Créer un utilisateur</button>
            </form>
        </div>
    </nav>

    <!-- BODY -->
    <div class="container my-4">
        <div class="container-fluid ">
            <img src="../static/img/iconUser.png" class="d-inline-block img-fluid " width="50px" alt="profile">
            <label class="fs-4 align-middle">Créer un utilisateur</label>
        </div>

        <div class="container-fluid">
            <div class="row">

                <!-- CSV -->
                <div class="col mx-3 card my-5 shadow-sm p-3 mb-5 bg-body rounded ">
                    <form form action="/sa_userCreate" method="post">
                        <!-- DIFFERENCIER LE FORMULAIRE DE L'AUTRE AVEC UN ATTRIBUT CACHE  -->
                        <input type="hidden" name="csvForm" value="1">
                        <p class="fs-5 text-center">Avec un fichier CSV</p>
                        <div class="form-group my-5">
                            <p for="csvFile">Selectionnez un fichier CSV</p>
                            <input type="file" class="form-control-file" name="csvFile" accept=".csv" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                </div>

                <!-- MANUEL -->
                <div class="col mx-3 card my-5 shadow-sm p-3 mb-5 bg-body rounded ">
                    <form form action="/sa_userCreate" method="post">
                        <!-- DIFFERENCIER LE FORMULAIRE DE L'AUTRE AVEC UN ATTRIBUT CACHE  -->
                        <input type="hidden" name="oneUserForm" value="1">
                        <p class="fs-5 text-center">Un seul utilisateur</p>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="newUserNom">Nom</span>
                        <input
                            type="text"
                            class="form-control"
                            aria-label="Sizing example input"
                            aria-describedby="newUserNom"
                            name="newUserNom"
                            required
                        />
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="newUserPrenom" >Prénom</span>
                        <input
                            type="text"
                            class="form-control"
                            aria-label="Sizing example input"
                            aria-describedby="newUserPrenom"
                            name="newUserPrenom"
                            required
                        />
                        </div>

                        <div class="input-group mb-3">
                        <label class="input-group-text" for="newUserRole">Rôle</label>
                        <select class="form-select" name="newUserRole">
                            <option value="Eleve">Elève</option>
                            <option value="Professeur">Professeur</option>
                        </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>