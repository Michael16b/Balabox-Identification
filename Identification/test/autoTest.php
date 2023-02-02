<?php

$current_dir = dirname(__FILE__);
$exclude_files = array(basename(__FILE__), "Assertions.php");

// Lit tous les fichiers dans le répertoire courant
$files = scandir($current_dir);

foreach ($files as $file) {
    // Ignore les fichiers à exclure
    if (in_array($file, $exclude_files)) {
        continue;
    }
    
    // Construit le chemin complet du fichier
    $target_file = "$current_dir/$file";
    
    // Vérifie que le fichier est un fichier PHP valide
    if (is_file($target_file) && pathinfo($target_file, PATHINFO_EXTENSION) == "php") {
        // Charge le fichier cible
        require_once $target_file;
        
        // Récupère la liste des méthodes publiques
        $class_methods = get_class_methods($target_file);
        
        // Vérifie que des méthodes ont été trouvées
        if (!empty($class_methods)) {
            echo "Les méthodes trouvées dans le fichier $target_file sont :\n";
            foreach ($class_methods as $method) {
                if ($method != "setUp()" || $method != "tearDown()") {
                echo " - $method\n";
                // Exécute la méthode
                call_user_func(array($target_file, $method));
            }
            }
        } else {
            echo "Aucune méthode trouvée dans le fichier $target_file.\n";
        }
    }
}

?>
