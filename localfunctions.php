<?php

function readFromJson($filepath) {

// Open JSON file for reading
$jsonData = file_get_contents($filepath);

// Decode JSON data into PHP array
$data = json_decode($jsonData, true);

// Return data
return $data;

}

// Write to JSON file
function writeToJson($data, $filepath) {

// Encode data to JSON
$jsonData = json_encode($data);

// Write JSON data to file
file_put_contents($filepath, $jsonData);

}
function getPlayerList($server) {
    $json = file_get_contents("https://api.mcsrvstat.us/2/$server");
    $data = json_decode($json, true);

    if ($data["online"]) {
        return $data["players"]["list"];
    } else {
        return [];
    }
}

// Function to generate head icon URL using cravatars.eu
function getHeadIcon($username) {
    return "https://cravatar.eu/helmhead/$username/64.png";
}
function deleteFromjson($filename, $key) {
    $data = readFromjson($filename);
    unset($data[$key]);
    writeToJson($filename, $data);
}
function updateConfig($data, $dir) {
    $configFilePath = $dir;
    $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents($configFilePath, $jsonData);
  }
  // Function to add a new log entry to the logs.json file
function addLogEntry($type, $msg)
{
    $logsFile = 'Logs.json';

    // Read the current content of the logs file
    $logs = [];
    if (file_exists($logsFile)) {
        $logs = json_decode(file_get_contents($logsFile), true);
    }

    // Add a new log entry
    $newEntry = [
        'type' => $type,
        'msg' => $msg,
        'time' => date('Y-m-d H:i:s')
    ];

    $logs[] = $newEntry;

    // Write the updated content back to the logs file
    file_put_contents($logsFile, json_encode($logs, JSON_PRETTY_PRINT));
}
function countLoginTypes($logsFile)
{
    // Read the content of the logs file
    $logsData = file_get_contents($logsFile);

    // Convert the JSON data to a PHP array
    $logsArray = json_decode($logsData, true);

    // Initialize the counter
    $loginCount = 0;

    // Loop through each log entry and count the "login" types
    foreach ($logsArray['Logs'] as $log) {
        if ($log['type'] === 'login') {
            $loginCount++;
        }
    }

    return $loginCount;
}
function countAccounts()
{
    $profileFile = 'profile.json';

    if (!file_exists($profileFile)) {
        return 0; // Return 0 if the file does not exist
    }

    $profileData = json_decode(file_get_contents($profileFile), true);

    if (isset($profileData['accounts']) && is_array($profileData['accounts'])) {
        return count($profileData['accounts']);
    }

    return 0; // Return 0 if the 'accounts' section is not found or is not an array
}
  ?>