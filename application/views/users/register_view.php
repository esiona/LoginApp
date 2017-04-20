<h2>Register</h2>

<?php $attributes = array('id' => 'register_form', 'class' => 'form_horizontal'); ?>
<?php  if($this->session->flashdata('errors')): ?>
	<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?>


<?php echo form_open('users/register', $attributes); ?>
<div class="form-group">
	<!--firstname-->
	<?php echo form_label('Firstname'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'firstname',
		'placeholder' => 'enter name'
	);
	echo form_input($data);
	 ?>
</div>

<div class="form-group">
	<!--Surname-->
	<?php echo form_label('LastName'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'lastname',
		'placeholder' => 'enter name'
	);
	echo form_input($data);
	 ?>
</div>
<div class="form-group">
	<!--Email-->
	<?php echo form_label('Email'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'email',
		'placeholder' => 'enter email'
	);
	echo form_input($data);
	 ?>
</div>
<div class="form-group">
	<!--create username -->
	<?php echo form_label('Username'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'username',
		'placeholder' => 'enter name'
	);
	echo form_input($data);
	 ?>

	 <!--create password -->
	<?php echo form_label('Password'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'password',
		'placeholder' => 'enter name'
	);
	echo form_password($data);
	 ?>

	 <!--confirm password -->
	<?php echo form_label('Confirm Password'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'confirm_password',
		'placeholder' => 'Confirm pass'
	);
	echo form_password($data);
	 ?>
	 <!--submit -->
	<?php

	$data = array(
		'class' => 'btn btn-primary',
		'name' => 'submit',
		'value' => 'Register'
	);
	echo form_submit($data);
	 ?>
</div>
<?php echo form_close(); ?>


