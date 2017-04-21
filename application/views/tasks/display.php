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

		<?php echo '<tr><td>'.$task->name.' <a href="'.base_url().'tasks/edit/'.$task->id.'">Edit</a> <a href="'.base_url().'tasks/delete/'.$task->id.'">Delete</a></td><td>'.$task->body.'</td><td>'.$task->date_created.'</td>'; ?>
		<?php if($task->status == 0) : ?>
			<?php echo '<td><a href="'.base_url().'tasks/mark_incomplete/'.$task->id.'">Mark as incompleted</a></td>'; ?>
		<?php else: ?>
			<?php echo '<td><a href="'.base_url().'tasks/mark_complete/'.$task->id.'">Mark as completed</a></td>'; ?> 

		<?php endif; ?>
		<?php echo '</tr>'; ?>

	

	</tbody>
</table>