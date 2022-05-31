<?php
// echo phpinfo();
// exit;
error_reporting(E_ALL);
ini_set('display_errors', true);


require "vendor/autoload.php";
require "header.php";

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;




$file_path    = "video.mp4";

if (is_file($file_path)) {
  $file_path = realpath($file_path);
  $file_name = basename($file_path);
  $app = new Kunnu\Dropbox\DropboxApp(
    $appKey,
    $appSecret,
    $accessToken
  );
  $dropbox = new Kunnu\Dropbox\Dropbox($app);

  try {
    $dropboxFile = new Kunnu\Dropbox\DropboxFile(
      $file_path
    );
    $file = $dropbox->upload(
      $dropboxFile,
      DROPBOX_PATH . $file_name,
      [
        'autorename' => false
      ]
    );
    echo "<pre>";
    print_r($file);
    echo "</pre>";
    exit;
  } catch (Exception $e) {
    echo $e;
  }
}
