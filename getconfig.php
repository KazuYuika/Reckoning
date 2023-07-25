<?php

header('Content-Type: application/json');

// Load config file
$config = json_decode(file_get_contents('config.json'), true); 

// Encode and output
echo json_encode($config);
?>