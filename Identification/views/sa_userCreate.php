<?php
include __ROOT__."/views/header.html";
?>

<body>
    <!-- HEADER -->
    <nav class="navbar border-bottom">
        <div class="container-fluid">
            <img src="../static/img/logo_balabox.png" alt="Logo"  height="30" class="d-inline-block align-text-top">
            <form class="justify-content-start ">
                <a href="sa_courseCreate"><button class="btn btn-outline-success me-2" type="button">Créer un cours</button></a>
                <a href="sa_classCreate"><button class="btn btn-outline-success me-2" type="button">Créer une classe</button></a>
                <a href="sa_userCreate"><button class="btn btn-sm btn-outline-secondary" type="button">Créer un utilisateur</button></a>
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
                <div class="col mx-3 d-flex align-items-center">
                    <!-- CSV -->
                    <div class="col mx-3 card my-5 shadow-sm p-3 mb-5 bg-body rounded">
                        <form form action="/sa_userCreate" method="post">
                            <!-- DIFFERENCIER LE FORMULAIRE DE L'AUTRE AVEC UN ATTRIBUT CACHE  -->
                            <input type="hidden" name="csvForm" value="1">

                            <p class="fs-5 text-center">Avec un fichier CSV</p>
                            <div class="form-group my-5">
                                <label for="formFile" class="form-label">Selectionnez un fichier CSV</label>
                                <input class="form-control" type="file" id="csvFile" name="csvFile" accept=".csv" required>
                            </div>
                            <div class="text-center my-5">
                                <button type="submit" class="btn btn-primary">Confirmer</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- MANUEL -->
                <div class="col mx-3 card my-5 shadow-sm p-3 mb-5 bg-body rounded ">
                    <form form action="/sa_userCreate" method="post">
                        <!-- DIFFERENCIER LE FORMULAIRE DE L'AUTRE AVEC UN ATTRIBUT CACHE  -->
                        <input type="hidden" name="oneUserForm" value="1">
                        
                        <p class="fs-5 text-center">Un seul utilisateur</p>

                        <!-- NOM -->
                        <div class="mb-3 my-5">
                            <label for="newUserNom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="newUserNom" name="newUserNom" aria-describedby="nom" required>
                        </div>
                    
                        <!-- PRENOM -->
                        <div class="mb-3">
                            <label for="newUserPrenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="newUserPrenom" name="newUserPrenom" aria-describedby="prénom" required>
                        </div>

                        <!-- ROLE -->
                        <div class="mb-3">
                            <label for="newUserRole" class="form-label">Rôle</label>
                            <select class="form-select" aria-label="rôle de l'utilisateur" name="newUserRole">
                                <option selected value="Eleve">Elève</option>
                                <option value="Professeur">Professeur</option>
                            </select>
                        </div>

                        <div class="text-center my-5">
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>