<h2>Edit Project</h2>

<?php $attributes = array('id' => 'editForm', 'class' => 'form_horizontal'); ?>

<?php echo validation_errors('<p class="bg-danger">'); ?>

<?php echo form_open('projects/edit/'.$project_data->id, $attributes); ?>
<div class="form-group">
	<!--firstname-->
	<?php echo form_label('Name'); ?>
	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'name',
		'value' => $project_data->name
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
		'value' => $project_data->body
	);
	echo form_textarea($data);
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


