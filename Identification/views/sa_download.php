<?php
include __ROOT__."/views/header.html";
?>

<body>
    
    <!-- BODY -->
    <div class="container my-4">
        <?php
            echo '<a href="data:application/pdf;base64,'.base64_encode($pdf_content).'" download="' . $filename . '">Télécharger le PDF</a>';
        ?>

    </div>
    
</body>
