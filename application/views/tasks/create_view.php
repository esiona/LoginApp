<h2>Create Task</h2>

<?php $attributes = array('id' => 'taskForm', 'class' => 'form_horizontal'); ?>

<?php echo validation_errors('<p class="bg-danger">'); ?>

<?php echo form_open('tasks/create/'.$this->uri->segment(3), $attributes); ?>
<div class="form-group">
	<!--firstname-->
	<?php echo form_label('Name'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'name',
		'placeholder' => 'enter name'
	);
	echo form_input($data);
	 ?>
</div>

<div class="form-group">
	<!--Surname-->
	<?php echo form_label('Body'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'body',
		'placeholder' => 'enter text'
	);
	echo form_textarea($data);
	 ?>
</div>

<div class="form-group">
	<!--Date-->
	<?php echo form_label('Date'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'due_date',
		'type' =>'date'
	);
	echo form_input($data);
	 ?>
</div>

	 <!--submit -->
	<?php

	$data = array(
		'class' => 'btn btn-primary',
		'name' => 'submit',
		'value' => 'Submit'
	);
	echo form_submit($data);
	 ?>
</div>
<?php echo form_close(); ?>


