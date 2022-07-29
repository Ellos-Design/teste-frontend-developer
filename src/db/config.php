<?php

$db_user = "root";
$db_pass = '';
$db_name = 'contact';

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $cfg['Servers'][$i]['auth_type'] = 'config';
// $cfg['Servers'][$i]['user'] = 'root';
// $cfg['Servers'][$i]['password'] = '';
// $cfg['Servers'][$i]['extension'] = 'mysqli';
// $cfg['Servers'][$i]['AllowNoPassword'] = true;
// $cfg['Lang'] = '';