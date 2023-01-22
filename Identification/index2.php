<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define ("__ROOT__",__DIR__);

// Configuration
require (__ROOT__.'/model/userDB.php');
require (__ROOT__.'/model/courseDB.php');
require (__ROOT__.'/model/groupsDB.php');
require_once(__ROOT__.'/user/lib.php');
require_once (__ROOT__.'/config2.php');
require_once (__ROOT__.'/config.php');
// ApplicationController
require_once (CONTROLLERS_DIR.'/ApplicationController.php');


// Add routes here
ApplicationController::getInstance()->addRoute('seeConfig', CONTROLLERS_DIR.'/seeConfig.php');
ApplicationController::getInstance()->addRoute('connect_Prof', CONTROLLERS_DIR.'/connect_Prof.php');
ApplicationController::getInstance()->addRoute('connect', CONTROLLERS_DIR.'/connect.php');
ApplicationController::getInstance()->addRoute('sa_classCreate', CONTROLLERS_DIR.'/sa_classCreate.php');
ApplicationController::getInstance()->addRoute('sa_courseCreate', CONTROLLERS_DIR.'/sa_courseCreate.php');
ApplicationController::getInstance()->addRoute('sa_userCreate', CONTROLLERS_DIR.'/sa_userCreate.php');
ApplicationController::getInstance()->addRoute('sa_confirm', CONTROLLERS_DIR.'/sa_confirm.php');
ApplicationController::getInstance()->addRoute('sa_error', CONTROLLERS_DIR.'/sa_error.php');


// Process the request
ApplicationController::getInstance()->process();

?>
