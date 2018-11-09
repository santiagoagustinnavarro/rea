<?php
require_once ("vendor/vlucas/phpdotenv/src/Dotenv.php");
require_once ("vendor/vlucas/phpdotenv/src/Loader.php");
$dotenv = new \Dotenv\Dotenv("mailjet");
$dotenv->load();
echo "<script>alert('".getenv("ID_API_SECURITY")."')</script>";

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://in.mailjet.com';
$config['smtp_port'] = '465';
$config['smtp_user'] = getenv("ID_API_SECURITY");
$config['smtp_pass'] = getenv("ID_API");
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['newline'] = "\r\n";
