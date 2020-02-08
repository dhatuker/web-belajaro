
    <section>
      <div class="container md-3" style="background-image:url(images/coverkelas.jpg);">
          <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Kelas <?= $kelas['nama'] ?></h1>
            </div>
        </div>
      </div>
    </section>
		
    <section>
        <div class="container">
          <div class="row no-gutters">
            <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <br><br>
                <a class="nav-link px-4 active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><span class="mr-3 flaticon-ideas"></span>Timeline</a>
  
                <a class="nav-link px-4" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false"><span class="mr-3 flaticon-flasks"></span>Materi</a>
  
                <a class="nav-link px-4" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="mr-3 flaticon-analysis"></span>Tugas</a>
  
                <a class="nav-link px-4" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false"><span class="mr-3 flaticon-web-design"></span>Anggota Kelas</a>
  
  
              </div>
            </div>
            <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">
              
              <div class="tab-content pl-md-9" id="v-pills-tabContent">
  
                <div class="tab-pane fade show active py-5" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                  <span class="icon mb-3 d-block flaticon-ideas">
                  <h2 class="mb-4" >Timeline Kelas</h2>
                  <div class="container mt-5 mb-5">
                      <div class="row">
                        <div class="col-md-10">
                          <ul class="timeline">
                            <li>
                              <a target="_blank" href="#"></a>
                              <a href="#" class="float-right"></a>
                              <p></p>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </span>
  
                <div class="tab-pane fade py-5" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                  <span class="icon mb-3 d-block flaticon-flasks"></span>
                  <h2 class="mb-4">Daftar Materi</h2>
                  <div class="container mt-5 mb-5">
                  <div class="row">
                    <?php foreach($materi->result_array() as $row): ?>
                    <a href="<?php base_url('materi'); ?>">    
                        <div class="col-sm-12 mt-3">
                          <div class="card">
                          <a href="<?= base_url("Kelas/materi");?>?id=<?=$row['id']?> ">
                            <div class="card-body">
                                <h5 class="card-title" align="center"><?= $row['nama']; ?></h5>                            
                            </div>
                            </a>
                          </div>
                        </div>
                        </a>
                    <?php endforeach;?>
                    </div>
                  </div>
                  <br>
                  <?php if($this->session->userdata('status') == 'guru') { ?>
                  <p><a href="#" class="btn btn-primary px-4 py-3" data-toggle="modal" data-target="#modalMateri" style="padding-bottom:10px;">Tambahkan</a></p>
                  <?php } ?>
                </div>
  
                <div class="tab-pane fade py-5" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                  <span class="icon mb-3 d-block flaticon-flasks"></span>
                  <h2 class="mb-4">Daftar Tugas</h2>
                  <div class="container mt-5 mb-5">
                    <div class="row">
                    <?php foreach($tugas->result_array() as $row): ?> 
                    <a href="<?php base_url('materi'); ?>">    
                        <div class="col-sm-12 mt-3">
                          <div class="card">
                          <a href="<?= base_url("Kelas/tugas");?>?id=<?=$row['id']?> ">
                            <div class="card-body">
                                <h5 class="card-title" align="center"><?= $row['nama']; ?></h5>                            
                            </div>
                            </a>
                          </div>
                        </div>
                        </a>
                    <?php endforeach;?>
                    </div>
                  </div>
                  <br>
                  <?php if($this->session->userdata('status') == 'guru') { ?>
                  <p><a class="btn btn-primary px-4 py-3" data-toggle="modal" data-target="#modalTugas">Tambahkan</a></p>
                  <?php } ?>
                </div>
                  
                <div class="tab-pane fade py-5" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                  <span class="icon mb-3 d-block flaticon-web-design"></span>
                  <h2 class="mb-4">Daftar Anggota</h2>
                  <br>
                  <?php foreach($anggota->result_array() as $row): ?>
                  <div class="col-sm-12 mt-3">
                          <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" align="center"><?= $row['nama']; ?></h5>                            
                            </div>
                          </div>
                        </div>
                  <?php endforeach; ?>
                  <?php if($this->session->userdata('status') == 'guru') { ?>
                  <br>
                  <p><a href="#" class="btn btn-primary px-4 py-3" >Kode Kelas : <?= $kelas['kode']?> </a></p>
                  <?php } ?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
    </section>
    
    <!-- Modal -->

    <div class="modal fade" id="modalTugas" tabindex="-1" role="dialog" aria-labelledby="modalTugasLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTugasLabel">INPUT TUGAS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method ="POST" action="<?= base_url("Kelas/tambahTugas");?>?id=<?=$kelas['id']?>">
              <div class="form-group">
                <label for="namatugas" class="text-black">Judul Tugas</label>
                <input type="text" class="form-control" id="namaTugas" name="namaTugas">
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="t_deskripsi" name="t_deskripsi" rows="3">
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tgl_deadline" class="text-black">Deadline</label>
                    <input type="date" class="form-control" id="tgl_deadline" name ="tgl_deadline">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jam_deadline" class="text-black">Jam</label>
                    <input type="time" class="form-control" id="jam_deadline" name ="jam_deadline">
                  </div>
                </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lokasi" class="text-black">File Tugas</label>
                    <input type="file" class="form-control" id="lokasi" name="lokasi">
                  </div>
                </div>
              
							<input type="submit" name="tugaskan" class="btn btn-primary px-4 py-3" value="TUGAS KAN"/>
            </form>
					</div>          
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalMateri" tabindex="-1" role="dialog" aria-labelledby="modalMaterLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalMateriLabel">INPUT Materi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?= base_url("Kelas/tambahMateri");?>?id=<?=$kelas['id']?>">
            <div class="form-group">
            <label for="namemateri" class="text-black">Judul Materi</label>
            <input type="text" class="form-control" id="namaMateri" name="namaMateri">
          </div>
          <div class="form-group">
            <label for="exampleTextarea">Deskripsi</label>
            <textarea class="form-control" id="m_deskripsi" name="m_deskripsi" rows="3"></textarea>
          </div>
            <input type="submit" name="share" class="btn btn-primary px-4 py-3" value="BAGIKAN"/>
            </form>
        </div>          
      </div>
    </div>

    <div class="modal fade" id="modalLihatTugas" tabindex="-1" role="dialog" aria-labelledby="modalTugasLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLihatTugasLabel">Tugas <?= $row['nama'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?= base_url("Kelas/tambahMateri");?>?id=<?=$kelas['id']?>">
            <div class="form-group">
            <label for="namemateri" class="text-black">Judul Materi</label>
            <input type="text" class="form-control" id="namaMateri" name="namaMateri">
          </div>
          <div class="form-group">
            <label for="exampleTextarea">Deskripsi</label>
            <textarea class="form-control" id="m_deskripsi" name="m_deskripsi" rows="3"></textarea>
          </div>
            <input type="submit" name="share" class="btn btn-primary px-4 py-3" value="BAGIKAN"/>
            </form>
        </div>          
      </div>
    </div>

    <div class="modal fade" id="modalLihatMateri" tabindex="-1" role="dialog" aria-labelledby="modalMaterLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLihatMateriLabel">Materi <?= $row['nama'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?= base_url("Kelas/tambahMateri");?>?id=<?=$kelas['id']?>">
            <div class="form-group">
            <label for="namemateri" class="text-black">Judul Materi</label>
            <input type="text" class="form-control" id="namaMateri" name="namaMateri">
          </div>
          <div class="form-group">
            <label for="exampleTextarea">Deskripsi</label>
            <textarea class="form-control" id="m_deskripsi" name="m_deskripsi" rows="3"></textarea>
          </div>
            <input type="submit" name="share" class="btn btn-primary px-4 py-3" value="BAGIKAN"/>
            </form>
        </div>          
      </div>
    </div>
