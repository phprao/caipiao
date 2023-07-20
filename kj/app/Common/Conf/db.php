<?php 
$dbconfig = require_once(ROOT . '/config.php');

return [
	'DB_TYPE'               => 'mysqli',
    'DB_HOST'               => $dbconfig['DB_HOST'],
    'DB_NAME'               => $dbconfig['DB_NAME'],
    'DB_USER'               => $dbconfig['DB_USER'],
    'DB_PWD'                => $dbconfig['DB_PWD'],
    'DB_PREFIX'             => $dbconfig['DB_PREFIX'],
    'DB_PORT'               => $dbconfig['DB_PORT'],
	'DB_DEBUG'              => false,
	'DB_PARAMS'             => [\PDO::ATTR_CASE => \PDO::CASE_NATURAL],
];