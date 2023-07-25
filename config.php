<?php
//error_reporting(-1);
#db configuration
const HOST = 'localhost';
const USER = 'root';
const  PASSWORD = 'root';
const DATABASE = 'dinora';

#connection to DataBase
$db = @mysqli_connect(HOST,USER,PASSWORD,DATABASE)or die(mysqli_connect_error());

#WEB SITE CONFIGURATION
const SEEN_COUNT = 1;

const ASSETS = "/assets";
const VIEW = "view";
const  UPLOADS = '/uploads';
const ADMIN_VIEW = __DIR__ . '/admin/view';
const ADMIN_ASSETS ='/admin/assets/';
const MENU_POSITIONS = [
    1=> 'HEADER MENU',
    2=> 'FOOTER MENU'
];
