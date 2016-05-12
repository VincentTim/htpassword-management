<?php

require __DIR__.'/../class/htpassword.php';
$htpasswd = new htpasswd();

if(isset($_POST['username'])) $username = $_POST['username']; else $username = '';
if(isset($_POST['file'])) $file = $_POST['file']; else $file = '';

if($username != '' && $file != ''){

    $htpasswd->user_delete($file, $username, $password);

}


?>


