<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>

	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	
</head>
<body>
	

	<div class="container">
	<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('home')?>">Login App</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo base_url('home')?>">Home</a></li>
              <?php if (!($this->session->userdata('logged_in'))): ?>

              	<li><a href="<?php echo base_url('users/register')?>">Register</a></li>
			  <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php if($this->session->userdata('logged_in')): ?>
              	<li><a href="<?php echo base_url('users/logout')?>">Logout</a></li>
			  <?php else: ?>
              	<li><a href="<?php echo base_url('users/login')?>">Login</a></li>
			  <?php endif; ?>

            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
		<div class="col-xs-3">
			<?php $this->load->view('users/login_view'); ?> 

		</div>
		<div class="col-xs-9">
			<?php $this->load->view($main_view); ?> 

		</div>
	</div>
</body>
</html>