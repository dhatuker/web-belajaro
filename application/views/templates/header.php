<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $judul?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('css/open-iconic-bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/animate.css');?>">
    
    <link rel="stylesheet" href="<?php echo base_url('css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/owl.theme.default.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/magnific-popup.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('css/aos.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('css/ionicons.min.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-datepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/jquery.timepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/flaticon.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/icomoon.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?= base_url(); ?>">BelajarO</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              
              <?php if($this->session->userdata('username') != null) { ?>
                <li class="nav-item"><a href="<?= base_url('beranda'); ?>" class="nav-link">
                <?= $this->session->userdata('username') ?>
                </a></li>
              <li class="nav-item"><a href="<?= base_url('Auth/logout') ?>" class="nav-link">Log Out</a></li>
                            <?php } else { ?>
                              <li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link">Home</a></li>
                              <li class="nav-item"><a href="<?= base_url(); ?>about" class="nav-link">About</a></li>
                              <li class="nav-item"><a href="<?= base_url(); ?>contact" class="nav-link">Contact</a></li>
                              <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#modalKlik">Log In</a></li>
                                <li class="text-warning"></li>
                            <?php } ?>
	        </ul>
	      </div>
	    </div>
    </nav>              
	        </ul>
	      </div>
	    </div>
    </nav>
    
        <!-- Modal -->
        <div class="modal fade" id="modalKlik" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="modalAppointmentLabel">LOG IN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
              <div class="col-md-12 col-sm-12 text-center">
              <form action="form_masuk">
                  <p><a href="#" class="btn btn-primary px-4 py-3 justify-content-center" data-toggle="modal" data-target="#modalSiswa">Log In sebagai murid</a></p>
                  <p><a href="#" class="btn btn-primary px-4 py-3 justify-content-center " data-toggle="modal" data-target="#modalGuru">Log In sebagai guru</a></p>
                </form>
            </div>          
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalSiswa" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">LOG IN AS STUDENT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?= base_url('Auth/login_siswa'); ?>">
              <div class="form-group">
                <label for="name" class="text-black">	Username</label>
                <input type="text" class="form-control" id="s_username" name="s_username">
              </div>
              <div class="form-group">
                <label for="password" class="text-black">Password</label>
                <input type="password" class="form-control" id="s_password" name="s_password">
              </div>
                <div align="center" class="col-md-15">
                    <input class="btn btn-primary" type="submit" value="Login" id="login" style="padding-bottom:10px;">
                  </div>
            </form>
					</div>          
        </div>
      </div>
    </div>
	
		<div class="modal fade" id="modalGuru" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">LOG IN AS GURU</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?= base_url('Auth/login_guru'); ?>">
              <div class="form-group">
                <label for="name" class="text-black">	Username</label>
                <input type="text" class="form-control" id="g_username" name="g_username">
              </div>
              <div class="form-group">
                <label for="password" class="text-black">Password</label>
								<input type="password" class="form-control" id="g_password" name="g_password">
							</div>
							<div align="center" class="col-md-15">
                    <input class="btn btn-primary" type="submit" value="Login" id="login" style="padding-bottom:10px;">
                  </div>
            </form>
					</div>          
        </div>
      </div>
    </div>

  

    