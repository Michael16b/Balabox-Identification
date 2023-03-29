<?php
include __ROOT__."/views/header.html";


if ($data[0] != null){
    echo "<h1> Infos : $data[0]</h1>";
    } else {
        echo "Information non reconue";
}

include __ROOT__."/views/footer.html";
?>
