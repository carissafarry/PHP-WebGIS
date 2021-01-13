<?php
defined('env') or exit('Akses langsung ke Skrip ini diblokir');

$setDb['db_host'] = '127.0.0.1';
$setDb['db_name'] = 'webgis-php';
$setDb['db_user'] = 'root';
$setDb['db_password'] = '';

// folder templates
$template = 'templates/AdminLTE-2.4.17/';

//session
$setSession['prefix'] = 'webgis-php';

//URI
$setUri['base'] = 'http://localhost/webgis-php/admin/';
$setUri['base2'] = 'http://localhost/webgis-php/';
$setUri['assets'] = 'assets/';
