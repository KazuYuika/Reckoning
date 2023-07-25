<?php 
include "discord.php";
include "localfunctions.php";
$working_dir = $_SESSION['DIRE']."/";




# Enabling error display
error_reporting(E_ALL);
ini_set('display_errors', 1);

# Including all the required scripts for demo


$config = readFromJson($working_dir. 'config.json');
$discordOAuth = $config['DiscordOauth'];

$title = $config['websiteName'];
$extention = is_animated($_SESSION['user_avatar']);
$avatar_img = 'https://cdn.discordapp.com/avatars/'.$_SESSION['user_id'] . "/" . $_SESSION['user_avatar'] . $extention;
$username = $_SESSION['username'];
$icon = $working_dir."/template/assets/dashboard/2.png";
$playerList = '';



			
?>