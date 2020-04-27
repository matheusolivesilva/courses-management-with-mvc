<?php require __DIR__ . '/../header.php';?>
    <form method="post" action="/save-course<?= isset($course) ? '?id= ' . $course->getId() : ''; ?>">
	<div class="form-group">
	    <label for="description">Description</label>
	    <input 
	        type="text" 
		id="description" 
		name="description" 
		class="form-control"
			value="<?= isset($course) ? $course->getDescription() : ''; ?>">
	</div>
	<button class="btn btn-primary">Save</button>
    </form>


<?php require __DIR__ . '/../footer.php'?>
