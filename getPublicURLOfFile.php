<?php
// echo phpinfo();
// exit;
error_reporting(E_ALL);
ini_set('display_errors', true);


require "vendor/autoload.php";

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;


define("DROPBOX_PATH", "/");
$appKey      = '61cz10zx1ax6x2e';
$appSecret   = 'f7mvm8pq1psh6w5';
$accessToken = 'sl.BIrRkbik3XklCpMnLLi5GfL4fhz9TDqg73sRKQpb6iarI3MufslInqU8ZLMuL1ZFcYLRJao_Urw_qj5uP0l6PIAx-CwyseBrlH0xQ_Y2FoILW7gKGBNVh4NmXPAEqBU5Qqft4iMK';
$app = new Kunnu\Dropbox\DropboxApp(
  $appKey,
  $appSecret,
  $accessToken
);
$dropbox = new Kunnu\Dropbox\Dropbox($app);



// $file_path = DROPBOX_PATH . "video.mp4";
$file_path = DROPBOX_PATH . "SampleVideo.mp4";

try {
  $response = $dropbox->postToAPI("/sharing/create_shared_link_with_settings", [
    "path" => $file_path,
    "settings" => [
      "access" => "viewer",
      "allow_download" => true,
      "audience" => "public",
      "requested_visibility" => "public"
    ]
  ]);

  $data = $response->getDecodedBody();

  echo "<pre>";
  print_r(str_replace("dl=0", "dl=1", $data['url']));
  echo "</pre>";
} catch (Exception $e) {
  echo "CATCH PART";
  echo "<br/>";
  $response = $dropbox->postToAPI("/sharing/list_shared_links", [
    "path" => $file_path
  ]);

  $data = $response->getDecodedBody();

  echo str_replace("dl=0", "dl=1", $data['links'][0]['url']);
  echo "<Br/>";
  echo $e;
}

exit;



// if (is_file($file_path)) {
//   $file_path = realpath($file_path);
//   $file_name = basename($file_path);


//   try {
//     $dropboxFile = new Kunnu\Dropbox\DropboxFile(
//       $file_path
//     );
//     $file = $dropbox->upload(
//       $dropboxFile,
//       DROPBOX_PATH . $file_name,
//       [
//         'autorename' => false
//       ]
//     );
//     echo "<pre>";
//     print_r($file);
//     echo "</pre>";
//     exit;
//   } catch (Exception $e) {
//     echo $e;
//   }
// }
