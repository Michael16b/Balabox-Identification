<?php
include __ROOT__."/views/header.html";
?>

<body>
    
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
