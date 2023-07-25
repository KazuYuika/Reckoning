<!-- Setup 1 -->
<div id="setup1">
  <h1>Setup 1</h1>
  <h3 class="card-title text-left mb-3">Website Name</h3>
  <form action="install_process.php" method="post">
    <div class="form-group">
      <label for="exampleInputUsername1">Website Name</label>
      <input type="text" class="form-control" name="website_name" id="exampleInputUsername1" placeholder="Website name or Title">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Website URL</label>
      <input type="text" class="form-control" name="website_url" id="exampleInputEmail1" placeholder="website url: www.example.com">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Your Server IP </label><span style="color:dimgrey; font-size:small;">(this will be used to query your server)</span>
      <input type="password" class="form-control" name="server_ip" id="exampleInputPassword1" placeholder="Your ip: play.example.com">
    </div>
    <button type="submit" class="btn btn-primary me-2" name="step1_submit">Next</button>
  </form>
</div>
