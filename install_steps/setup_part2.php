<!-- Setup 2 -->
<div id="setup2" style="display: none;">
  <h1>Setup 2</h1>
  <h3 class="card-title text-left mb-3">Database Credentials</h3>
  <form action="install_process.php" method="post">
    <div class="form-group">
      <label for="dbUsername">Database Username</label>
      <input type="text" class="form-control" name="db_username" id="dbUsername" placeholder="Database Username">
    </div>
    <div class="form-group">
      <label for="dbPassword">Database Password</label>
      <input type="password" class="form-control" name="db_password" id="dbPassword" placeholder="Database Password">
    </div>
    <div class="form-group">
      <label for="dbHost">Database Host</label>
      <input type="text" class="form-control" name="db_host" id="dbHost" placeholder="Database Host">
    </div>
    <div class="form-group">
      <label for="dbPort">Database Port</label>
      <input type="text" class="form-control" name="db_port" id="dbPort" placeholder="Database port" value="3306">
    </div>
    <div class="form-group">
      <label for="dbName">Database Name</label>
      <input type="text" class="form-control" name="db_Name" id="dbName" placeholder="Database Name" >
    </div>
    <button type="button" class="btn btn-primary me-2" onclick="prevStep('setup2', 'setup1')">Back</button>
    <button type="submit" class="btn btn-primary me-2" name="step2_submit">Next</button>
  </form>
</div>
