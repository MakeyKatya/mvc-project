<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link type="text/css" rel="stylesheet" href="../public/css/default.css">
</head>
<body>
<?php Session::init();?>
<div id="header">
    <b>Header</b>
    <hr />

    <a href="../index">Index</a>
    <a href="../help">Help</a>
    <?php if(Session::get('loggedIn') == true): ?>
        <a href="../dashboard/logout">Logout</a>
    <?php else: ?>
        <a href="../login">Login</a>
    <?php endif; ?>

</div>
<div id="content">