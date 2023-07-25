
<?php 
include("UrlClass.php");
$friendlyURLs = new URL();
$friendlyURLs->addRule('index.php', 'login');

require "discord.php";
require "localfunctions.php";
$config = readFromJson('config.json');
$discordOAuth = $config['DiscordOauth'];
$config['DIR'] = __DIR__;
writeToJson($config, "config.json");

if (isset($_SESSION['user'])) {
  // Redirect the user to the dashboard or any other page
  header("Location: dashboard/index.php");
  exit();
}
			
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="dashboard/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="dashboard/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="dashboard/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="dashboard/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form >
                  
                  <div class="">
                    <?php $auth_url = url($discordOAuth['client_id'], $discordOAuth['redirect_url'], $discordOAuth['scopes']);
                    echo "
                  <a href='$auth_url' class='btn btn-facebook btn-lg>
                    <button  '>
                      <i class='mdi mdi-discord'></i> Login using Discord </button></a>"; ?>
                    
                  </div>
                  
                </form>
              </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="dashboard/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="dashboard/assets/js/off-canvas.js"></script>
    <script src="dashboard/assets/js/hoverable-collapse.js"></script>
    <script src="dashboard/assets/js/misc.js"></script>
    <script src="dashboard/assets/js/settings.js"></script>
    <script src="dashboard/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>