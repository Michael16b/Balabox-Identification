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
            <img src="../static/img/iconClass.png" class="d-inline-block img-fluid " width="50px" alt="profile">
            <label class="fs-4 align-middle">Créer une classe</label>
        </div>
        <form form action="/sa_classCreate" method="post">


            <!-- // DEBUT TEST /////////////////////////////////////////////////////// -->
            <div class="mb-3 my-5">
                <label for="className" class="form-label">Nom de la classe</label>
                <input type="text" class="form-control" id="className" name="className" aria-describedby="nom" required>
            </div>

            <div class="mb-3">
                <label for="classSummary" class="form-label">Description</label>
                <textarea class="form-control" id="classSummary" name="classSummary"  rows="3"></textarea>
            </div>

            <!-- // FIN TEST /////////////////////////////////////////////////////// -->

            <!-- FINAL  PENSER A REMETTRE REQUIRED SUR INPUT CSV-->
            <div class="mb-3 my-5">
                <label for="formFile" class="form-label">Selectionnez un fichier CSV</label>
                <input class="form-control" type="file" id="csvFile" name="csvFile" accept=".csv" > 
            </div>
            <div class="text-center my-5">
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
    </div>

</body>