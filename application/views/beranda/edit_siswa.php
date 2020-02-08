<section mt-5>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">
      <h1 align= "center" class="mb-3 mt-5 bread">Edit Profile</h1>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="card">
      <div align ="center" class="card-header">
        <h3> Edit Profil Siswa </h3>
      </div>
      <div class="card-body">
        <form method="POST" action="<?= base_url('Beranda/edit_siswa') ?>">
        <?php foreach($profil->result_array() as $row): ?>
            <div class="form-group">       
              <label for="name" class="text-black">Name</label>
              <input type="text" class="form-control" id="s_name" name="s_nama" value="<?= $row['nama']?>">
            </div>
          <div class="form-group">
            <label for="telepon" class="text-black">Telepon</label>
            <input type="text" class="form-control" id="s_telp" name="s_telp" value="<?= $row['telp']?>">
          </div>   
          <div class="form-group">
            <label for="email" class="text-black">Email</label>
            <input type="email" class="form-control" id="s_email" name="s_email" value="<?= $row['email']?>">
          </div>                             
          <div align="center" class="col-md-15">
            <input class="btn btn-primary" type="submit" value="Submit Profile" id="editprofil" style="padding-bottom:10px;">
          </div>
          <?php endforeach; ?>
        </form>
			</div>   
    </div>
  </div>
</section>
<br>                      