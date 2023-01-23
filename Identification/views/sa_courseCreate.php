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
    <div class="container my-4 ">
        <div class="container-fluid ">
            <img src="../static/img/iconBook.png" class="d-inline-block img-fluid " width="50px" alt="profile">
            <label class="fs-4 align-middle">Créer un cours</label>
        </div>

        <!-- FORMULAIRE -->
        <form form action="/sa_courseCreate" method="post">
            <!-- noml abrégé -->
            <div class="mb-3 my-5">
                <label for="courseShortName" class="form-label">Nom abrégé</label>
                <input type="text" class="form-control" id="courseShortName" name="courseShortName" aria-describedby="nom abrégé" required>
            </div>

            <!-- nom complet -->
            <div class="mb-3">
                <label for="courseFullName" class="form-label">Nom complet</label>
                <input type="text" class="form-control" id="courseFullName" name="courseFullName" aria-describedby="nom complet" required>
            </div>

            <!-- desciption -->
            <div class="mb-3">
                <label for="courseSummary" class="form-label">Description</label>
                <textarea class="form-control" id="courseSummary" name="courseSummary"  rows="3"></textarea>
            </div>

            <!-- format dont d'autres à venir... -->
            <div class="mb-3">
                <label for="courseFullName" class="form-label">Format</label>
                <select class="form-select" aria-label="Format du cours" name="courseFormat">
                    <option selected value="topics">Matière</option>
                </select>
            </div>
            
            <div class="text-center my-5">
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
    </div>
</body>