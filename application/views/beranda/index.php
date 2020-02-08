    <section>
      <div class="container mt-3" style="background-image:url(images/coverkelas.jpg);">
        <div class="row slider-text justify-content-center align-items-center">
            <h1 class="mb-3 mt-5 bread">Selamat Datang!</h1>
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">  
              </div>
            </div>
          </div>
        </div>
    </section>

    <section>
      <div class="container">
        <div class="row no-gutters">

          <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <br><br><br>
              <a class="nav-link px-4 active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><span class="mr-3 flaticon-ideas"></span> Daftar Kelas</a>

              <a class="nav-link px-4" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false"><span class="mr-3 flaticon-flasks"></span>Profile</a>

              <?php if($this->session->userdata('status') == 'guru') { ?>
              <a class="nav-link px-4" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="mr-3 flaticon-web-design"></span> Tambah Kelas</a>
              <?php } else { ?>
                <a class="nav-link px-4" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="mr-3 flaticon-web-design"></span> Gabung Kelas</a>
              <?php } ?>
            </div>
          </div>


          <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">
            
            <div class="tab-content pl-md-9" id="v-pills-tabContent">

                <div class="tab-pane fade show active py-5" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                    <span class="icon mb-3 d-block flaticon-ideas"></span>
                    <h2 class="mb-4">Daftar Kelas</h2>
                    <div class="row">
                      <?php foreach($kelas->result_array() as $row): ?>
                      <div class="col-sm-12 mt-3">
                        <div class="card">
                        <a href="<?= base_url("Kelas");?>?id=<?=$row['id']?> ">
                          <div class="card-body">
                            <h5 class="card-title" align="center"><?= $row['nama']; ?></h5>
                          </div>
                        </a>
                        </div>
                      </div>
                    <?php endforeach;?>
                    </div>
                </div>
                
              <div class="tab-pane fade py-5" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                <span class="icon mb-3 d-block flaticon-flasks"></span>
                <h2 class="mb-4">Profile</h2>
                <?php foreach($profil->result_array() as $row): ?>
                <div class="form-group">
                  <label class="col-lg-9 control-label">Name :</label>
                  <div class="col-lg-20">
                    <li class="form-control" style="width:200%;"><?= $row['nama']?></li>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-9 control-label">Telepon</label>
                  <div class="col-md-20">
                    <li class="form-control" style="width:200%;"><?= $row['telp']?></li>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-9 control-label">Email:</label>
                  <div class="col-lg-20">
                    <li class="form-control" style="width:200%;"><?= $row['email']?></li>
                  </div>
                </div>
                <?php endforeach;?>
                <?php if($this->session->userdata('status') == 'guru') { ?>
                <p><a href="<?= base_url(); ?>beranda/edit_guru" class="btn btn-primary px-4 py-3">Edit Profil</a></p>
                <?php } else { ?>
                  <p><a href="<?= base_url(); ?>beranda/edit_siswa" class="btn btn-primary px-4 py-3">Edit Profil</a></p>
                <?php } ?>
              </div>
              <?php if($this->session->userdata('status') == 'guru') { ?>
              <div class="tab-pane fade py-5" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                <span class="icon mb-3 d-block flaticon-web-design"></span>
                <h2 class="mb-4">Tambah Kelas</h2>
                <p><a href="#" class="btn btn-primary px-4 py-3" data-toggle="modal" data-target="#modalKelas">Tambah (+)</a></p>
              </div>
              <?php } else {?>
              <div class="tab-pane fade py-5" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                <span class="icon mb-3 d-block flaticon-web-design"></span>
                <h2 class="mb-4">Gabung Kelas</h2>
                <p><a href="#" class="btn btn-primary px-4 py-3" data-toggle="modal" data-target="#modalKelasSiswa">Gabung (+)</a></p>
              </div>

              <?php } ?>
            </div>

          </div>
          
        </div>
      </div>
    </section>		
    
    <div class="modal fade" id="modalKelas" tabindex="-1" role="dialog" aria-labelledby="modalKelasLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalKelasLabel">BUAT KELAS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?= base_url('Beranda/tambahKelas') ?>">
              <div class="form-group">
                <label for="namekelas" class="text-black">Nama Kelas</label>
                <input type="text" class="form-control" id="namekelas" name="namaKelas">
              </div>
              <div class="form-group">
                <label for="namekategori" class="text-black">Kode</label>
                <input type="text" class="form-control" id="namekategori" name="kode_k">
              </div>
              <p><input type="submit" class="btn btn-primary px-5 py-1" name="share" value="Buat Kelas"/></p>              
            </form>
          </div>          
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalKelasSiswa" tabindex="-1" role="dialog" aria-labelledby="modalKelasLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >GABUNG KELAS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?= base_url('Beranda/gabungKelas') ?>">
              <div class="form-group">
                <label for="kode_kelas" class="text-black">Kode Kelas</label>
                <input type="text" class="form-control" name="kode_kelas">
              </div>
              <p><input type="submit" class="btn btn-primary px-5 py-1" name="join" value="join"/></p>              
            </form>
          </div>          
        </div>
      </div>
    </div>