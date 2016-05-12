<?php

if(isset($_POST['username'])) $username = $_POST['username']; else $username = '';
if(isset($_POST['password'])) $password = $_POST['password']; else $password = '';
if(isset($_POST['client'])) $client = $_POST['client']; else $client = '';

if($username != '' && $password != '' && $client != ''){

    $cmd = 'htpasswd -b -c /var/www/pass/.htpasswd_'.strtolower($client).' '.$username.' '.$password.'';
    shell_exec(escapeshellcmd($cmd));

}


?>


