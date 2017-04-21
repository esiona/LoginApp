<h1>Project Name : <?php echo $project->name; ?></h1>
<h4>Date created : <?php echo $project->date_created; ?></h4>
<div class="col-xs-9">
	<p><?php echo $project->body; ?></p>

	<h3>Completed Tasks</h3>
	<?php if($completed_tasks): ?>	
		<ol >

		<?php foreach ($completed_tasks as $task) :?>
			<?php echo '<li><a href="tasks/display/'.$task->task_id.'">'.$task->task_name.'</a></li>'?>
		<?php endforeach; ?>	
		</ol>

	<?php else : ?>
		<?php echo 'There are no completed tasks' ?>
	<?php endif; ?>
	<h3>Incompleted Tasks</h3>
	<?php if($uncompleted_tasks): ?>	
		<ol >

		<?php foreach ($uncompleted_tasks as $task) :?>
			<?php echo '<li><a href="tasks/display/'.$task->task_id.'">'.$task->task_name.'</a></li>'?>
		<?php endforeach; ?>	
		</ol>

	<?php else : ?>
		<?php echo 'There are no incompleted tasks' ?>
	<?php endif; ?>
	

</div>
<div class="col-xs-3 pull-right">
	<ul class="list-group">
		<h5>Project Actions</h5>
		<li class="list-group-item"><a href="<?php echo base_url();?>tasks/create/<?php echo $project->id ?> ">Create Task</a></li>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project->id ?>">Edit Project</a></li>
		<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id ?>">Delete Project</a></li>
	</ul>
</div>

