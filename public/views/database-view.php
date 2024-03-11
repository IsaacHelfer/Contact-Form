<?php $title = 'Database Records'; $style = 'styling/database-table.css';
?>

<?php require 'partials/head.php'; ?>
<?php require '../controllers/info.php'; ?>
<?php require '../controllers/database-table.php'; ?>

<h1>Database Records</h1>

<form method="POST">
	<label>Search By:</label>
	<select id="option" name="option" required>
        <option value="name" selected>Name</option>
        <option value="email">Email</option>
        <option value="issue">Issues</option>
    </select>

	<input type="search" id="text" name="text">

	<input type="submit" value="Search">
</form>

<a href=<?php echo $_SERVER['PHP_SELF'] ?> id="reset">Reset</a>

<script src="../reset.js"></script>

<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Issue</th>
		<th>Comment</th>
		<th>Action</th>
	</tr>

	<!-- if seearch bar used -->
	<?php if (! empty($db_data)) : ?>

		<?php foreach ($db_data as $array) : ?>

			<tr>

				<?php foreach ($array as $value) : ?>

					<td><?php echo htmlspecialchars($value); ?></td>

				<?php endforeach; ?>

				<?php 
					$edit_view_id = "edit-view.php?id={$array["id"]}";
					$delete_view_id = "delete-view.php?id={$array["id"]}";
				?>

				<!-- This is the data for the action header-->
				<td>
					<a href="<?php echo $edit_view_id; ?>" id="edit">Edit</a>
					<a href="<?php echo $delete_view_id; ?>" id="delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
				</td>

			</tr>

		<?php endforeach; ?>

		<script> show(reset); </script>

	<!-- default screen showing all data -->
	<?php else : ?>
		
		<!-- If there was text inputed and there is no match -->
		<?php if ($text != "") :?>

			<p>
				<?php echo "Record Not Found."; ?>
			</p>

		<?php endif; ?>

		<!-- Displaying all data in db  -->

		<?php $all_data = $db->query("select * from form")->fetchAll(); ?>

		<?php foreach ($all_data as $array) : ?>

			<tr>

				<?php foreach ($array as $value) : ?>

					<td>
						<?php echo htmlspecialchars($value); ?>	
					</td>

				<?php endforeach; ?>

				<?php 
					$edit_view_id = "edit-view.php?id={$array["id"]}";
					$delete_view_id = "delete-view.php?id={$array["id"]}";
				?>

			<!-- This is the data for the action header-->
				<td>
					<a href="<?php echo $edit_view_id; ?>" id="edit">Edit</a>
					<a href="<?php echo $delete_view_id; ?>" id="delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
				</td>

			</tr>

		<?php endforeach; ?>

	<?php endif; ?>
</table>

<a href="form-view.php" id="backForm">&#x2190 Form</a>

<?php require 'partials/footer.php'; ?>