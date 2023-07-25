<!-- Setup 3 -->
<div id="setup3" style="display: none;">
  <h1>Setup 3</h1>
  <h3 class="card-title text-left mb-3">Social Media URLs</h3>
  <form action="install_process.php" method="post">
    <div class="form-group">
      <label for="facebookUrl">Facebook URL</label>
      <input type="text" class="form-control" name="facebook_url" id="facebookUrl" placeholder="Facebook URL">
    </div>
    <div class="form-group">
      <label for="twitterUrl">Twitter URL</label>
      <input type="text" class="form-control" name="twitter_url" id="twitterUrl" placeholder="Twitter URL">
    </div>
    <button type="button" class="btn btn-primary me-2" onclick="prevStep('setup3', 'setup2')">Back</button>
    <button type="submit" class="btn btn-primary me-2" name="step3_submit">Finish</button>
  </form>
</div>
