<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=(isset($this->title)) ? $this->title : 'MVC'; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/default.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<?php Session::init();?>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo URL; ?>index">Makieieva</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo URL; ?>index">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a></li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                </ul>
            </li>
            <?php if(Session::get('loggedIn') == true): ?>
                <li><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>
                <li><a href="<?php echo URL; ?>note">Notes</a></li>
            <?php endif; ?>
            <?php if(Session::get('role') == 'OWNER'): ?>
                <li><a href="<?php echo URL; ?>user">Users</a></li>
            <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo URL; ?>help"><span class="glyphicon glyphicon-help"></span>Help</a></li>
            <?php if(Session::get('loggedIn') == false): ?>
            <li> <a href="<?php echo URL; ?>login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php else: ?>
            <li><a href="<?php echo URL; ?>dashboard/logout"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>