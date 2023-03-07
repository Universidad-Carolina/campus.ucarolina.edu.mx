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
  'dbpersist' => 0,
  'dbport' => 25060,
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = 'http://localhost:8080';
$CFG->dataroot  = 'C:\\Users\\Rogelio\\Documents\\sandbox\\campus.ucarolina.edu.mx\\moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
