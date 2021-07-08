<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">SignUp for an iDiscuss account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="http://localhost/forum/partials/_handlesignup.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" minlength="5" name="signuppassword" id="signuppassword">
          </div>
          <div class="mb-3">
            <label for="cPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" minlength="5" name="signupcpassword" id="signupcPassword1">
          </div>
          <button type="submit" class="btn btn-primary">SignUp</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>