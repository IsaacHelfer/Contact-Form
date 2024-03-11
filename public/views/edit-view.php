<?php $title = 'Edit Record'; $style = 'styling/edit-style.css'; ?>

<?php require 'partials/head.php'; ?>
<?php require '../controllers/edit.php'; ?>

<h1>Edit Record</h1>

<form method="POST">
	<label>Name:</label>
    <input type="text" id="name" name="name" value="<?php echo trim($database_data['name']); ?>">

    <label>Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $database_data['email']; ?>">

    <label>Issue:</label>
	<select id="issue" name="issue">
		<?php foreach ($drop_down_items as $issue) :?>
			<option <?php if ($issue === $database_data['issue']) { echo 'selected'; } ?>><?php echo $issue; ?></option>
		<?php endforeach; ?>
	</select>

    <label>Comment:</label>
    <textarea id="comment" name="comment"><?php echo $database_data['comment']; ?></textarea>

    <input type="submit" id="submitButton" value="Submit Changes">
</form>

<a href="database-view.php">&#x2190 Database Record Table</a>
