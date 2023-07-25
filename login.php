<?php

/* Discord Oauth v.4.1
 * Demo Login Script
 * @author : MarkisDev
 * @copyright : https://markis.dev
 */

# IMPORTANT READ THIS:
# - This requires 'guilds.join' scope to be active in url() function in index.php
# - The below function requries the client to be a BOT application with CREATE_INSTANT_INVITE permissions to be a member in the server.
# - Set the `$bot_token` to your bot token if you want to use guilds.join scope in the init() function
# - The below function HAS to be called after get_user() as it adds the user who has logged in
# - The bot DOES NOT have to be online, just a member in the server.
# - Uncomment line 35 to enable the function

# FEEL FREE TO JOIN MY SERVER FOR ANY QUERIES - https://join.markis.dev





# Enabling error display
error_reporting(E_ALL);
ini_set('display_errors', 1);

# Including all the required scripts for demo
require_once __DIR__ . "/discord.php";
require_once __DIR__."/conn.php";
require_once __DIR__."/localfunctions.php";


# Read Discord OAuth settings from config.json
$config = readFromJson('config.json');
$profile = readFromJson('profile.json');
$discordOAuth = $config['DiscordOauth'];
date_default_timezone_set('Asia/Manila');


# Initializing all the required values for the script to work
init($discordOAuth['redirect_url'], $discordOAuth['client_id'], $discordOAuth['secret_id'], $bot_token);

# Fetching user details | (identify scope) (optionally email scope too if you want user's email) [Add identify AND email scope for the email!]
get_user();

# Uncomment this for using it WITH email scope and comment line 32.
#get_user($email=True);

# Adding user to guild | (guilds.join scope)
# join_guild('SERVER_ID_HERE');

$dcid = $_SESSION['user_id'];
$sql1 = "SELECT * FROM Accounts WHERE discord_id = '$dcid'";
$result1 = mysqli_query($conn, $sql1);


// Check if the query returned any rows
if (mysqli_num_rows($result1) > 0) {
    // Loop through the query result rows
    while ($row = mysqli_fetch_assoc($result1)) {
        // Get the column values from the row
        
        $username = $row["username"];
        $ID = $row["ID"];
        $role = $row["role"];
        $player_name = $row["player_name"];
        $player_uuid = $row["player_uuid"];
        $data11 = getplayerdata($conn, $player_uuid);
        $new_money = $data11['money'];
        $total_money = $row['total_money'];
        $prem_uuid = $row["prem_uuid"];
        $time = getbungeetime($conn, $player_uuid);
        $email = $_SESSION['email'];
        $PIN = getPIN($conn, $player_name);
            $password = $_SESSION['state'];
        
        if ($data11['money'] != $total_money){
            $sql4 = "UPDATE Accounts SET total_money = '$new_money' WHERE discord_id = '$dcid'";
            mysqli_query($conn, $sql4);
        }
       
        $account = array(
            "ID" => $ID,
            "role" => $role,
            "player_name" => $player_name,
            "player_uuid" => $player_uuid,
            "total_money" => $total_money,          
            "prem_uuid" => $prem_uuid,
            "bungeetime" => $time,
            "email" => $email,
            "PIN" => $PIN['pin']
        );

        // Add the account data to the profile array under the username key
        $profile["accounts"][$username] = $account;
    }
    $msg = "User ".$row['username']." Has Login Today";
    // Write the profile array to the JSON file
    writeToJson($profile, 'profile.json');
} else {
    // No rows found, insert a new data by using POST request
    // Get the POST data
    $username = $_SESSION['username'];
    $role = "default";
    $uuidplayer = getplayeruuid($conn, $dcid);
    $player_uuid = $uuidplayer['uuid'];
    $data1 = getplayerdata($conn, $player_uuid);
    $player_name = $data1['player_name'];
    
    $total_money = $data1['money'];
    $prem_uuid = getUuidByUsername($player_name);
    $time = getbungeetime($conn, $player_uuid);
    
    $email1 = $_SESSION['email'];
    $PIN = getPIN($conn, $player_name);
    $password = $_SESSION['state'];
    // Create an SQL statement to insert the data into the database
    $sql2 = "INSERT INTO Accounts (discord_id, username, role, player_name, player_uuid, total_money, prem_uuid, email, pass) VALUES ('$dcid', '$username', '$role', '$player_name', '$player_uuid', '$total_money', '$prem_uuid', '$email1', '$password')";

    // Execute the SQL statement and check for errors1
    if (mysqli_query($conn, $sql2)) {
        // Insertion successful, echo a message
        // echo "New data inserted successfully";

        // Create an associative array for the new account data
        $new_account = array(
            "ID" => mysqli_insert_id($conn), // Get the last inserted ID from the database
            "role" => $role,
            "player_name" => $player_name,
            "player_uuid" => $player_uuid,
            "total_money" => $total_money,
            "prem_uuid" => $prem_uuid,
            "bungeetime" => $time,
            "email" => $email1,
            "PIN" => $PIN['pin']


        );

        // Read the profile.json file into an associative array
        $profile = readFromJson('profile.json');

        // Add the new account data to the profile array under the username key
        $profile["accounts"][$username] = $new_account;

        // Write the profile array to the JSON file
        writeToJson($profile, 'profile.json');
    } else {
        // Insertion failed, echo an error message
        echo "Error: " . mysqli_error($conn);
    }
}
# Fetching user guild details | (guilds scope)
$_SESSION['guilds'] = get_guilds();

# Fetching user connections | (connections scope)
$_SESSION['connections'] = get_connections();
$_SESSION['DIRE'] = __DIR__;
// Example usage:
$type = "login";
$msg = "User ".$_SESSION['username']." has logged in";
addLogEntry($type, $msg);
# Redirecting to home page once all data has been fetched
redirect("dashboard/");

