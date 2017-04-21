<h2>Edit Project</h2>

<?php $attributes = array('id' => 'editForm', 'class' => 'form_horizontal'); ?>

<?php echo validation_errors('<p class="bg-danger">'); ?>

<?php echo form_open('tasks/edit/'.$this->uri->segment(3), $attributes); ?>
<div class="form-group">
	<!--firstname-->
	<?php echo form_label('Name'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'name',
		'value' => $task_data->name
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
		'value' => $task_data->body
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
		'value' => $task_data->date_created
	);
	echo form_input($data);
	 ?>
</div>

	 <!--submit -->
	<?php

	$data = array(
		'class' => 'btn btn-primary',
		'name' => 'submit',
		'value' => 'Update'
	);
	echo form_submit($data);
	 ?>
</div>
<?php echo form_close(); ?>


