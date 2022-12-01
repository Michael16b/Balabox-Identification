<?php
include __ROOT__."/views/header.html";
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-5">
                    <form action="/connect" method="post" class="card-body p-lg-5">
                        <div class="text-center mb-5">
                            <img src="../static/img/logo_balabox.png" class="img-fluid" width="200px" alt="profile">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="num" placeholder="Numéro associé">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn px-5 mb-3 w-100  btn-primary">Connexion</button>
                        </div>
                        <div id="changeid" class="form-text text-center text-primary">
                            <a href="/connect_Prof" class="fw-bold">Je suis professeur</a>
                        </div>
                    </form>
                </div>
             </div>
        </div>
    </div>
</body>