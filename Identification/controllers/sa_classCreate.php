<?php
require(__ROOT__.'/controllers/Controller.php');

class SaClassCreateController extends Controller{

    public function get($request){
        $this->render('sa_classCreate',[]);
    }

    public function post($request){
        // Récupérer le fichier CSV
        // $csvFile = $_FILES['csvFile'];

        // DEBUT TEST ///////////////////////////////////////////////////////

        // Récupérer les informations du formulaire
        $className = $_REQUEST['className'];
        $classSummary = $_REQUEST['classSummary'];

        $classDB = new ClassDB();
        $classDB->addClass($className, $classSummary);
        
        $this->render('connect_info', ['surname' => $className, 'password' => $classSummary]);

                

        // FIN TEST ///////////////////////////////////////////////////////


    }
}

?>