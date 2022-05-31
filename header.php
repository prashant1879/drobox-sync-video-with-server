<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

session_start();

require_once 'vendor/autoload.php';

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;


//Configure Dropbox Application
$app = new DropboxApp("61cz10zx1ax6x2e", "f7mvm8pq1psh6w5");

//Configure Dropbox service
$dropbox = new Dropbox($app);

//DropboxAuthHelper
$authHelper = $dropbox->getAuthHelper();

//Callback URL
$callbackUrl = "http://localhost/dropbox/login-callback.php";
