<h2>Projects</h2>
<p class="bg-success">
	<?php if ($this->session->flashdata('project_created')) : ?>
	<?php echo $this->session->flashdata('project_created'); ?>
	<?php endif; ?>

	<?php if ($this->session->flashdata('project_updated')) : ?>
	<?php echo $this->session->flashdata('project_updated'); ?>
	<?php endif; ?>

	<?php if ($this->session->flashdata('project_deleted')) : ?>
	<?php echo $this->session->flashdata('project_deleted'); ?>
	<?php endif; ?>

	<?php if ($this->session->flashdata('login_success')) : ?>
		<?php echo $this->session->flashdata('login_success'); ?>
	<?php endif; ?>

	<?php if ($this->session->flashdata('task_created')) : ?>
		<?php echo $this->session->flashdata('task_created'); ?>
	<?php endif; ?>

	<?php if ($this->session->flashdata('task_updated')) : ?>
		<?php echo $this->session->flashdata('task_updated'); ?>
	<?php endif; ?>


	<?php if ($this->session->flashdata('task_deleted')) : ?>
		<?php echo $this->session->flashdata('task_deleted'); ?>
	<?php endif; ?>

</p>
<a href="<?php echo base_url();?>projects/create" class="btn btn-primary pull-right">Create a Project</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Project Name</th>
			<th>Project Body</th>

		</tr>
	</thead>
	<tbody>
		<?php foreach ($projects as $project) : ?>
			<?php echo '<tr><td><a href="'.base_url().'projects/display/'.$project->id.'">'.$project->name.'</a></td><td>'.$project->body.'</td><td><a class="btn btn-danger" href="'.base_url().'projects/delete/'.$project->id.'"><span class="glyphicon glyphicon-remove"></span></a></td></tr>'; ?>
		<?php endforeach;?>

	</tbody>
</table>