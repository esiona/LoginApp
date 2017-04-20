<h2>Projects</h2>

<table class="table">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($projects as $project) : ?>
			<?php echo '<tr><td>'.$project->name.'</td><td>'.$project->body.'</td></tr>'; ?>
		<?php endforeach;?>

	</tbody>
</table>