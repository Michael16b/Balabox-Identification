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
        <?php
            if (isset($pdf_content)) {
                if (isset($_REQUEST['newClassName'])) {
                    $filename = 'Classe de ' . $_REQUEST['newClassName'] . '.pdf';
                } else {
                    $filename = 'Liste d\'utilisateur - Balabox.pdf';
                }
                echo '<a href="data:application/pdf;base64,'.base64_encode($pdf_content).'" download="' . $filename . '">Télécharger le PDF</a>';
            }
        ?>

    </div>
    
</body>
