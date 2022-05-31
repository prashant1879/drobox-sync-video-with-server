<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

session_start();
define("DROPBOX_PATH", "/");

$appKey      = '61cz10zx1ax6x2e';
$appSecret   = 'f7mvm8pq1psh6w5';
$accessToken = 'sl.BIrRkbik3XklCpMnLLi5GfL4fhz9TDqg73sRKQpb6iarI3MufslInqU8ZLMuL1ZFcYLRJao_Urw_qj5uP0l6PIAx-CwyseBrlH0xQ_Y2FoILW7gKGBNVh4NmXPAEqBU5Qqft4iMK';

require_once 'vendor/autoload.php';

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;


//Configure Dropbox Application
$app = new DropboxApp($appKey, $appSecret);

//Configure Dropbox service
$dropbox = new Dropbox($app);

//DropboxAuthHelper
$authHelper = $dropbox->getAuthHelper();

//Callback URL
$callbackUrl = "http://localhost/dropbox/login-callback.php";
