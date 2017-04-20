<p>Login form</p>
<?php $attributes = array('id' => 'login_form', 'class' => 'form_horizontal'); ?>

<?php  if($this->session->flashdata('errors')): ?>
	<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?>


<?php echo form_open('users/login', $attributes); ?>

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
		'value' => 'Login'
	);
	echo form_submit($data);
	 ?>
</div>
<?php echo form_close(); ?>