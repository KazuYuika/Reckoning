<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Install</title>
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
            <?php
            // Function to update the config.json file
             // Load the config data from the JSON file
             $configData = json_decode(file_get_contents('config.json'), true);

            $step = isset($_GET['step']) ? $_GET['step'] : 'setup1';

            

            // Display the appropriate setup step based on the current step
            if ($step === 'setup1') {
            ?>
              <h1>Setup 1</h1>
              <h3 class="card-title text-left mb-3">Website Name</h3>
              <form action="install_process.php?step=setup1" method="post">
                <div class="form-group">
                  <label for="exampleInputUsername1">Website Name</label>
                  <input type="text" class="form-control" name="website_name" id="exampleInputUsername1" placeholder="Website name or Title" value="<?= $configData['websiteName'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Website URL</label>
                  <input type="text" class="form-control" name="website_url" id="exampleInputEmail1" placeholder="website url: www.example.com" value="<?= $configData['websiteURL'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Your Server IP </label><span style="color:dimgrey; font-size:small;">(this will be used to query your server)</span>
                  <input type="text" class="form-control" name="server_ip" id="exampleInputPassword1" placeholder="Your ip: play.example.com" value="<?= $configData['serverIP'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary me-2" name="step1_submit">Next</button>
              </form>
            <?php
            } elseif ($step === 'setup2') {
            ?>
              <h1>Setup 2</h1>
              <h3 class="card-title text-left mb-3">Database Credentials</h3>
              <form action="install_process.php?step=setup2" method="post">
                <div class="form-group">
                  <label for="dbHost">Database Host</label>
                  <input type="text" class="form-control" name="db_host" id="dbHost" placeholder="Database Host" value="<?= $configData['database']['host'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="dbPort">Database Port</label>
                  <input type="text" class="form-control" name="db_port" id="dbPort" placeholder="Database Port" value="<?= $configData['database']['port'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="dbUsername">Database Username</label>
                  <input type="text" class="form-control" name="db_username" id="dbUsername" placeholder="Database Username" value="<?= $configData['database']['username'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="dbPassword">Database Password</label>
                  <input type="password" class="form-control" name="db_password" id="dbPassword" placeholder="Database Password" value="<?= $configData['database']['password'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="dbName">Database Name</label>
                  <input type="text" class="form-control" name="db_name" id="dbName" placeholder="Database Name" value="<?= $configData['database']['databaseName'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary me-2" name="step2_submit">Next</button>
                <a href="install.php?step=setup1" class="btn btn-primary me-2" name="step2_back">Back</a>
              </form>
            <?php
            } elseif ($step === 'setup3') {
            ?>
              <h1>Setup 3</h1>
              <h3 class="card-title text-left mb-3">Social Media URLs</h3>
              <form action="install_process.php?step=setup3" method="post">
                <div class="form-group">
                  <label for="facebookUrl">Facebook URL</label>
                  <input type="text" class="form-control" name="facebook_url" id="facebookUrl" placeholder="Facebook URL" value="<?= $configData['socialMedia']['facebook'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="twitterUrl">Twitter URL</label>
                  <input type="text" class="form-control" name="twitter_url" id="twitterUrl" placeholder="Twitter URL" value="<?= $configData['socialMedia']['twitter'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="instagramUrl">Instagram URL</label>
                  <input type="text" class="form-control" name="instagram_url" id="instagramUrl" placeholder="Instagram URL" value="<?= $configData['socialMedia']['instagram'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="youtubeUrl">Youtube URL</label>
                  <input type="text" class="form-control" name="youtube_url" id="youtubeUrl" placeholder="Youtube URL" value="<?= $configData['socialMedia']['youtube'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary me-2" name="step3_submit">Next</button>
                <a href="install.php?step-setup2" class="btn btn-primary me-2" name="step3_back">Back</a>
              </form>
              <?php
            } elseif ($step === 'setup4') {
            ?>
              <h1>Setup 4</h1>
              <h3 class="card-title text-left mb-3">Discord OAUTH Configs</h3>
              <form action="install_process.php?step=setup4" method="post">
                <div class="form-group">
                  <label for="facebookUrl">Client ID</label>
                  <input type="text" class="form-control" name="client_id" id="facebookUrl" placeholder="Your Bot client_id" value="<?= $configData['DiscordOauth']['client_id'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="twitterUrl">Secret ID</label>
                  <input type="text" class="form-control" name="secret_id" id="twitterUrl" placeholder="Your Bot secret_id" value="<?= $configData['DiscordOauth']['secret_id'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="instagramUrl">Scopes</label>
                  <input type="text" class="form-control" name="scopes" id="instagramUrl" placeholder="Ex: identify+email" value="<?= $configData['DiscordOauth']['scopes'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="youtubeUrl">Redirect Url</label>
                  <input type="text" class="form-control" name="redirect_url" id="youtubeUrl" placeholder="example http://www.yoursite.com/login.php" value="<?= $configData['DiscordOauth']['redirect_url'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary me-2" name="step4_submit">Finish</button>
                <a href="install.php?step-setup3" class="btn btn-primary me-2" name="step3_back">Back</a>
              </form>
              <?php
            } elseif ($step === 'setup5') {
            ?>
              <h1>Setup 5</h1>
              <h3 class="card-title text-left mb-3">Put Your Server ips</h3>
              <h5 class="card-title text-left mb-3">If you using a bungeecord you can add the servername and their ips, if not just add one </h5>
              <form action="install_process.php?step=setup5" method="post">
                <div class="form-group">
                  <label for="facebookUrl">Name of Server</label>
                  <input type="text" class="form-control" name="servername" id="facebookUrl" placeholder="Any name or the name inside your bungeecords" >
                </div>
                <div class="form-group">
                  <label for="twitterUrl">Server Ip</label>
                  <input type="text" class="form-control " name="serverip" id="twitterUrl" placeholder="the server ip" >
                </div>
                <div class="form-group">
                <div class="btn-group-vertical" role="group" aria-label="Basic example">
                  <?php foreach ($configData['Bungeeservers'] as $sname => $server){
                    echo '<a type="a" class="btn btn-outline-secondary">
                    <i class="mdi mdi-server d-block mb-1">'.$sname.'</i> '.$server.' 
                    <a href="install_process.php?step=setup5&remove='.$sname.'" class="btn btn-danger"> remove </a>
                    </a>';
                  }

                            
                          ?>
                </div>
                
                
                <button type="submit" class="btn btn-primary me-2" name="step3_add">add server</button>
                <button type="submit" class="btn btn-primary me-2" name="step4_submit">Submit</button>

                <a href="install.php?step-setup4" class="btn btn-primary me-2" name="step3_back">Back</a>
              </form>
            <?php
            }
            ?>
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
