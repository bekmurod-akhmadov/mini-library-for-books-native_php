<?php
session_start();
$_SESSION['error'] = '';
    require_once __DIR__  . '/../config.php';
    require_once __DIR__  . '/../function.php';
    require_once __DIR__  . '/controller/admin-controller.php';

?>