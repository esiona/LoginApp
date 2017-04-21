<h1>Task Display View</h1>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Task Name</th>
			<th>Task Body</th>
			<th>Task Date</th>

		</tr>
	</thead>
	<tbody>

		<?php echo '<tr><td>'.$task->name.' <a href="'.base_url().'tasks/edit/'.$task->id.'">Edit</a> <a href="'.base_url().'tasks/delete/'.$task->id.'">Delete</a></td><td>'.$task->body.'</td><td>'.$task->date_created.'</td></tr>'; ?>

	</tbody>
</table>