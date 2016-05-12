<?php

require __DIR__.'/../class/htpassword.php';
$htpasswd = new htpasswd();

if(isset($_POST['username'])) $username = $_POST['username']; else $username = '';
if(isset($_POST['password'])) $password = $_POST['password']; else $password = '';
if(isset($_POST['client'])) $client = $_POST['client']; else $client = '';

if($username != '' && $password != '' && $client != ''){

    $htpasswd->customer_add($client, $username, $password);

}


?>


