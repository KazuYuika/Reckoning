<?php
function updateConfig($data) {
    $configFilePath = 'config.json';
    $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents($configFilePath, $jsonData);
  }
// Check the current step
$step = $_GET['step'];
 // Load the config data from the JSON file
 $configData = json_decode(file_get_contents('config.json'), true);
if ($step === 'setup1') {
  // Step 1: Website Name
  if (isset($_POST['step1_submit'])) {
    // Update the config data with the form values
    $configData['websiteName'] = $_POST['website_name'];
    $configData['websiteURL'] = $_POST['website_url'];
    $configData['serverIP'] = $_POST['server_ip'];

    // Update the config.json file
    updateConfig($configData);

    // Proceed to Step 2
    
  }
} elseif ($step === 'setup2') {
  // Step 2: Database Credentials
  if (isset($_POST['step2_submit'])) {
    // Update the config data with the form values
    $configData['database']['host'] = $_POST['db_host'];
    $configData['database']['port'] = $_POST['db_port'];
    $configData['database']['username'] = $_POST['db_username'];
    $configData['database']['password'] = $_POST['db_password'];
    $configData['database']['databaseName'] = $_POST['db_name'];

    // Update the config.json file
    updateConfig($configData);

    // Proceed to Step 3
    $step = 'setup3';
    header("Location: install.php?step=setup3");
    exit();
  } 
} elseif ($step === 'setup3') {
  // Step 3: Social Media URLs
  if (isset($_POST['step3_submit'])) {
    // Update the config data with the form values
    $configData['socialMedia']['facebook'] = $_POST['facebook_url'];
    $configData['socialMedia']['twitter'] = $_POST['twitter_url'];
    $configData['socialMedia']['instagram'] = $_POST['instagram_url'];
    $configData['socialMedia']['youtube'] = $_POST['youtube_url'];

    // Update the config.json file
    updateConfig($configData);
    $step = 'setup4';
    // Redirect to the confirmation page or dashboard
    header("Location: install.php?step=$step");
    exit();
  } 
}elseif ($step === 'setup4') {
  // Step 3: Social Media URLs
  if (isset($_POST['step3_submit'])) {
    // Update the config data with the form values
    $configData['DiscordOauth']['client_id'] = $_POST['client_id'];
    $configData['DiscordOauth']['secret_id'] = $_POST['secret_id'];
    $configData['DiscordOauth']['scopes'] = $_POST['scopes'];
    $configData['DiscordOauth']['redirect_url'] = $_POST['redirect_url'];

    // Update the config.json file
    updateConfig($configData);
    $step = 'setup5';
    // Redirect to the confirmation page or dashboard
    header("Location: install.php?step=$step");
    exit();
  } 
}elseif ($step === 'setup5') {
  // Step 3: Social Media URLs
  if (isset($_POST['step3_add'])) {
    // Update the config data with the form values
    $name = $_POST['servername'];
    $configData['Bungeeservers'][$name] = $_POST['serverip'];


    // Update the config.json file
    updateConfig($configData);
    $step = 'setup5';
    // Redirect to the confirmation page or dashboard
    header("Location: install.php?step=$step");
    exit();
  } 
  if (isset($_GET['remove'])){
    $name = $_GET['remove'];
    unset($configData['Bungeeservers'][$name]);
    updateConfig($configData);
    $step = 'setup5';
    // Redirect to the confirmation page or dashboard
    header("Location: install.php?step=$step");
    exit();
  }
  if (isset($_POST['step4_submit'])){
    
    // Redirect to the confirmation page or dashboard
    header("Location: index.php");
    exit();

  }
}
?>
