<?php

require_once 'header.php';

use Kunnu\Dropbox\DropboxFile;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

$mode = DropboxFile::MODE_READ;
$pathToLocalFile = __DIR__ . "/videoplayback.mp4";
$dropboxFile = new DropboxFile($pathToLocalFile, $mode);

if (isset($_GET['code']) && isset($_GET['state'])) {
  //Bad practice! No input sanitization!
  $code = $_GET['code'];
  $state = $_GET['state'];

  //Fetch the AccessToken
  $accessToken = $authHelper->getAccessToken($code, $state, $callbackUrl);

  echo $accessToken->getToken();
  exit;
}
