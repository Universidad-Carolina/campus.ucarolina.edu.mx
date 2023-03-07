<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'dokku-mysql-campusDB';
$CFG->dbname    = 'campusDB';
$CFG->dbuser    = 'mysql';
$CFG->dbpass    = '852668016bf9b32a';
$CFG->prefix    = 'ucd_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = 'https://campus.ucarolina.edu.mx';
$CFG->dataroot  = '/storage';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;
$CFG->sslproxy = 1;
require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!