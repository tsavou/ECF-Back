<?php
// définir des constantes pour stocker les infos de la bdd et les chemins vers différents dossiers
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'literie3000'); 

define("DIR_TEMPLATE", "../templates/");
define("DIR_APPLICATION", "../src/");
define("DIR_MODEL",DIR_APPLICATION . "model/");
define("DIR_CONTROLLER",DIR_APPLICATION . "controller/");
define("DIR_VIEW",DIR_APPLICATION . "view/");
