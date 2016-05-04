<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/default.css">
</head>
<body>
<?php Session::init();?>

<div id="header">
    <b>Header</b>
    <hr />

    <?php if(Session::get('loggedIn') == false): ?>
        <a href="<?php echo URL; ?>index">Index</a>
        <a href="<?php echo URL; ?>help">Help</a>
        <a href="<?php echo URL; ?>login">Login</a>
    <?php elseif(Session::get('loggedIn') == true): ?>
        <a href="<?php echo URL; ?>dashboard">Dashboard</a>

        <?php if(Session::get('role') == 'OWNER'): ?>
            <a href="<?php echo URL; ?>user">Users</a>
        <?php endif; ?>

        <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
    <?php endif; ?>

</div>
<div id="content">