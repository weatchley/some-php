<?php

$productionStatus = "localdev";
//$productionStatus = "remotedev";
//$productionStatus = "production";


$dbSetup = array(
    'localdev' => array(
        'username' => 'username',
        'password' => 'mypassword',
        'server' => 'localhost',
        'dbname' => 'some'
    ),
    'remotedev' => array(
        'username' => 'username',
        'password' => 'mypassword',
        'server' => 'db.host.com',
        'dbname' => 'some'
    ),
    'production' => array(
        'username' => 'username',
        'password' => 'mypassword',
        'server' => 'db.host.com',
        'dbname' => 'some'
    ),
);

?>
