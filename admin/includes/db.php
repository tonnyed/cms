<?php
$db['db_hostname'] = '127.0.0.1';
$db['db_username'] = 'root';
$db["db_password"] = '';
$db['db_name'] = 'cms';
foreach ($db as $key => $value) {
  define(strtoupper($key),$value);
}

$conn = mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);
if(!$conn){
  die('connection erro:'.mysqli_connection_error($conn));
}

 ?>
