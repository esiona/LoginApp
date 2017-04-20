<p class="bg-danger">
<?php if ($this->session->flashdata('no_access')) : ?>
	<?php echo $this->session->flashdata('no_access'); ?>
<?php endif; ?>

<p class="bg-success">
<?php if ($this->session->flashdata('login_success')) : ?>
	<?php echo $this->session->flashdata('login_success'); ?>
<?php endif; ?>

</p>
<p class="bg-success">
<?php if ($this->session->flashdata('user_registered')) : ?>
	<?php echo $this->session->flashdata('user_registered'); ?>
<?php endif; ?>

</p>

<p class="bg-danger">
<?php if ($this->session->flashdata('login_failed')) : ?>
	<?php echo $this->session->flashdata('login_failed'); ?>
<?php endif; ?>

</p>

<div class="jumbotron">
	<h2 class="text-center">Welcome To my App</h2>
</div>
<?php if (isset($projects)) : ?>

	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Project Name</th>
				<th>Project Body</th>

			</tr>
		</thead>
		<tbody>

				<?php foreach ($projects as $project) : ?>
					<?php echo '<tr><td>'.$project->name.'</td><td>'.$project->body.'</td></tr>'; ?>
				<?php endforeach;?>

		</tbody>
	</table>

<?php endif;?>
