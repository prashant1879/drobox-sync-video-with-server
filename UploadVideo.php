<?php
// echo phpinfo();
// exit;
error_reporting(E_ALL);
ini_set('display_errors', true);


require "vendor/autoload.php";

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;



$appKey      = '61cz10zx1ax6x2e';
$appSecret   = 'f7mvm8pq1psh6w5';
$accessToken = 'sl.BIexp1HOXMlhyAh238dIiDd9KWTLU8R7da8EQPsCly1QCCOpUWV7Z0lvz9A7VLSWRgw0Fxt28JDEn9bmG6vqT-BIR2mKGI-T6y-cRBea9_G1HsRdWUYEGez8YZTA1GvL6U4Zfv0W';


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
      '/backups/website/' . $file_name,
      [
        'autorename' => true
      ]
    );
  } catch (Exception $e) {
    echo $e;
  }
}
