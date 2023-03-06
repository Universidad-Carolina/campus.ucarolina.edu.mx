<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'db-ucarolinavirtual-do-user-7202729-0.a.db.ondigitalocean.com';
$CFG->dbname    = 'moodle2021';
$CFG->dbuser    = 'usercampus';
$CFG->dbpass    = 'y6s1711bptrnoj0o';
$CFG->prefix    = 'ucd_';
$CFG->dboptions = array (
  'dbpersist' => false,
  'dbport' => '25060',
  'dbsocket' => false,
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = 'https://moodle.ucarolina.edu.mx';
$CFG->dataroot  = '/storage';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;


//@error_reporting(E_ALL | E_STRICT);
//@ini_set('display_errors', '1');
//$CFG->debug = (E_ALL | E_STRICT);
//$CFG->debugdisplay = 1;


require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
