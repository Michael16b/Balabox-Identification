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
        <form form action="/sa_classCreate" method="post" enctype="multipart/form-data">
            <!-- NOM DE LA CLASSE-->
            <div class="mb-3 my-5">
                <label for="newClassName" class="form-label">Nom de classe</label>
                <input type="text" class="form-control" id="newClassName" name="newClassName" aria-describedby="nom de la classe" required>
            </div>
            <!-- DEXRIPTION DE LA CLASSE-->
            <div class="mb-3">
                <label for="newClassSummary" class="form-label">Description</label>
                <textarea class="form-control" id="newClassSummary" name="newClassSummary"  rows="3" required></textarea>
            </div>
            <!-- FICHIER CSV -->
            <div class="mb-3 my-5">
                <label for="formFile" class="form-label">Selectionnez un fichier CSV</label>
                <input class="form-control" type="file" id="csvFile" name="csvFile" accept=".csv" required> 
            </div>
            <div class="text-center my-5">
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
    </div>

</body>