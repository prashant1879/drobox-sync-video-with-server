<?php
require_once 'header.php';


//Fetch the Authorization/Login URL
$authUrl = $authHelper->getAuthUrl($callbackUrl);

echo "<a href='" . $authUrl . "'>Log in with Dropbox</a>";
