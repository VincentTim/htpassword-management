<?php

require __DIR__.'/../class/htpassword.php';
$htpasswd = new htpasswd();

if(isset($_POST['file'])) $file = $_POST['file']; else $file = '';

if($file != ''){

    $htpasswd->customer_delete($file);

}


?>


