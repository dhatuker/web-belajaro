<section>
    <div class="container md-3" style="background-image:url(images/coverkelas.jpg);">
          <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Materi</h1>
            </div>
        </div>
    </div>
</section>

<section>
<div class="container">
    <div class="card">
        <div align ="center" class="card-header">
            <h3> Detail Materi </h3>
        </div>
        <div class="card-body">
        <?php foreach ($materi->result_array() as $row) : ?>
                <div class="form-group">
                  <label class="col-lg-9 control-label">Nama :</label>
                  <div class="col-lg-20">
                    <li class="form-control" style="width:200%;"><?= $row['nama'];?></li>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-9 control-label">Deskripsi : </label>
                  <div class="col-md-20">
                    <li class="form-control" style="width:200%;"><?= $row['deskripsi'];?></li>
                  </div>
                </div>
        <?php endforeach; ?>
        <p><a href="#" class="btn btn-primary px-4 py-3 justify-content-center" data-toggle="modal" data-target="#modalEdit">Edit</a></p>
        <p><a href="#" class="btn btn-primary px-4 py-3 justify-content-center " data-toggle="modal" data-target="#modalHapus">Hapus</a></p>   
        </div>
        </div>
    </div>
</div>
</section>

<section>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Edit Materi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <?php foreach ($materi->result_array() as $row) : ?>
            <form method="POST" action="<?= base_url('Kelas/editMateri'); ?>?id=<?= $row['id']?>">
              <div class="form-group">
                <label for="name" class="text-black"> Nama : </label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'];?>">
              </div>
              <div class="form-group">
                <label for="deskripsi" class="text-black">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $row['deskripsi'];?>">
              </div>
                <div align="center" class="col-md-15">
                    <input class="btn btn-primary" type="submit" value="Cuz Edit" id="login" style="padding-bottom:10px;">
                  </div>
            </form>
            <?php endforeach; ?>
			</div>          
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Hapus Materi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <?php foreach ($materi->result_array() as $row) : ?>
            <form method="POST" action="<?= base_url('Kelas/hapusMateri'); ?>?id=<?= $row['id']?>">
              <div class="form-group">
                <label for="name" class="text-black"> Apakah anda yakin untuk menghapus Materi <?= $row['nama']?> ?</label>
              </div>
                <div align="center" class="col-md-15">
                    <input class="btn btn-primary" type="submit" value="Cuz Hapus" id="login" style="padding-bottom:10px;">
                  </div>
            </form>
            <?php endforeach; ?>
			</div>          
        </div>
      </div>
    </div>
</section>