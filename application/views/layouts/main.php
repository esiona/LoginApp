<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url();?>assets/css/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/css/jquery-3.2.1.min.js"></script>
	
</head>
<body>
	

	<div class="container">
		<div class="col-xs-3">
			
		</div>
		<div class="col-xs-9">
			<?php //$this->load->view($main_view); ?> 
			<?php $this->load->view('users/login_view'); ?> 

		</div>
	</div>
</body>
</html>