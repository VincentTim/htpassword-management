<?php

require __DIR__.'/class/htpassword.php';
$htpasswd = new htpasswd();

?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>User Management</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<div class="wrapper col-md-6">

    <div class="page-header">
        <h1>Gestion des accès clients</h1>
    </div>

    <h3>Liste des clients</h3>

    <?php if(count($htpasswd->getFiles()) > 0) { ?>
    <ul class="list-group">
        <?php foreach($htpasswd->getFiles() as $file){ $fct = $htpasswd->get_lines($file); ?>
            <li class="list-group-item list-header">
                <span class="badge"><?php echo count($fct); ?></span><?php echo $htpasswd->strReplace($file); ?>
            </li>
            <?php if(count($fct) > 0){ ?>
                <ul class="list-group list-admin">
                    <?php foreach($fct as $user){ ?>
                        <?php if($fct != ''){ ?>
                            <li class="list-group-item">
                                <?php echo $user; ?>
                                <button type="button" class="btn btn-success update-btn pull-right" data-username="<?php echo $user; ?>" data-file="<?php echo $file; ?>">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Update
                                </button>
                                <button type="button" class="btn btn-danger delete-btn pull-right" data-username="<?php echo $user; ?>" data-file="<?php echo $file; ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete
                                </button>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <li class="list-group-item">
                        <a class="list-group-item add-user-btn" data-file="<?php echo $file; ?>">Ajouter un nouvel utilisateur</a>
                    </li>
                </ul>
            <?php } else { ?>
                <li class="list-group-item">
                    <div class="alert alert-danger" role="alert"><p>Vous n'avez pas d'utilisateurs d'enregistrés</p></div>

                    <a class="list-group-item add-user-btn" data-file="<?php echo $file; ?>">Ajouter un nouvel utilisateur</a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert"><p>Vous n'avez pas de clients d'enregistrés</p></div>
    <?php } ?>

    <h3>Ajouter un nouveau client</h3>
    <form action="#" method="post" name="addCustomerForm" id="addCustomerForm">
        <div class="form-group">
            <label class="control-label" for="client">Nom</label>
            <input type="text" name="client" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label" for="username">Nom de l'administrateur</label>
            <input type="text" name="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label" for="username">Password</label>
            <input type="text" name="password" class="form-control"/>
        </div>
        <button type="button" class="btn btn-warning add-customer">
            <span class="glyphicon glyphicon-send"></span>
            Enregistrer
        </button>
    </form>

    <!--<h2>Ajouter un nouvel utilisateur</h2>
    <form action="#" method="post" name="addForm" id="addForm">
        <div class="form-group">
            <label class="control-label" for="username">Username</label>
            <input type="text" name="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label" for="username">Password</label>
            <input type="text" name="password" class="form-control"/>
        </div>
        <button type="button" class="btn btn-warning add-user">
            <span class="glyphicon glyphicon-send"></span>
            Enregistrer
        </button>
    </form>-->
    
</div>



<script id="hidden-template" type="text/x-custom-template">
    <form action="#" method="post" name="updateForm" id="updateForm">
        <div class="form-group">
            <input type="hidden" name="username" id="username" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="hidden" name="file" id="file" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label" for="username">Password</label>
            <input type="text" name="password" class="form-control"/>
        </div>
        <button type="button" class="btn btn-warning update-user">
            <span class="glyphicon glyphicon-send"></span>
            Enregistrer
        </button>
        <button type="button" class="btn btn-warning clear-update-user">
            <span class="glyphicon glyphicon-send"></span>
            Annuler
        </button>
    </form>
</script>
<script id="add-hidden-template" type="text/x-custom-template">
    <form action="#" method="post" name="addForm" id="addForm">
        <div class="form-group">
            <input type="hidden" name="file" id="file" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label" for="username">Username</label>
            <input type="text" name="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label" for="username">Password</label>
            <input type="text" name="password" class="form-control"/>
        </div>
        <button type="button" class="btn btn-warning add-user">
            <span class="glyphicon glyphicon-send"></span>
            Enregistrer
        </button>
        <button type="button" class="btn btn-warning clear-add-user">
            <span class="glyphicon glyphicon-send"></span>
            Annuler
        </button>
    </form>
</script>
</body>
</html>


