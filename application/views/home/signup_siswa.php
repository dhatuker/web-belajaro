
          <div class="modal-header">
            <h5 class="modal-title" id="form_SUT">SIGN UP AS STUDENT</h5>
          </div>
          
          <div class="modal-body">
            <form method="POST" action="<?= base_url('Auth/signup_siswa') ?>">
            <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?php echo validation_errors();?>
            </div>
                <?php endif; ?>
              <div class="form-group">
                <label for="name" class="text-black">Username</label>
                <input type="text" class="form-control" id="username" name="s_username">
              </div>
              <div class="form-group">
                <label for="password" class="text-black">Password</label>
                <input type="password" class="form-control" id="password" name="s_password">
              </div>
              <div class="form-group">
                <label for="password" class="text-black">Repeat Password</label>
                <input type="password" class="form-control" id="rpassword" name="s_rpassword">
              </div>
              <div align="center" class="col-md-15">
                <input class="btn btn-primary" type="submit" value="Sign Up" id="signupsiswa" style="padding-bottom:10px;">
              </div>
            </form>
		</div>          
