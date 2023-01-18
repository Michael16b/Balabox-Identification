<?php
include __ROOT__."/views/header.html";
?>

<body>
    <!-- HEADER -->
    <nav class="navbar border-bottom">
        <div class="container-fluid">
            <img src="../static/img/logo_balabox.png" alt="Logo"  height="30" class="d-inline-block align-text-top">
            <form class="justify-content-start ">
                <button class="btn btn-outline-success me-2" type="button">Créer une classe</button>
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
            <div class="form-group my-5">
                <p for="csvFile">Selectionnez un fichier CSV</p>
                <input type="file" class="form-control-file" name="csvFile" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Confirmer</button>
        </form>
    </div>

</body>