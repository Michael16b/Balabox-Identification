<?php

include __ROOT__."/views/header.html";

echo "role =".$_SESSION['role'];
echo "<br>";
echo "Numéro téléphone élève =". $_SESSION['username'];
echo "<br>";
echo "mdp =". $_SESSION['password'];
?>
<body>
    <form form action="/disconnect" method="post">
        <button type="submit"> se déconnecter</button>
    </form>
</body>
