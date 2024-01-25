<?php
  
    
require __DIR__.'/vendor/autoload.php';

$fileName = $_FILES['file']['name'];
$mimeType = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
$inputFileName = $_FILES['file']['tmp_name'];

$fileName = basename($fileName);

// list($name, $extension) = explode(".", $fileName);

// $fileName = sprintf("%s_%s.%s",$name, time(), $extension);

move_uploaded_file($inputFileName, "./files/$fileName");