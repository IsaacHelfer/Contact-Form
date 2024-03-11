<?php $title = 'Delete Record'; $style = 'styling/delete-style.css'; ?>

<?php require 'partials/head.php'; ?>
<?php require '../controllers/delete.php'; ?>

<h1>Deleted Record</h1>

<table>
	<tr>
		<?php foreach (array_keys($record) as $key) : ?>
			<th><?php echo $key; ?></th>
		<?php endforeach; ?>
	</tr>

	<tr>
		<?php foreach ($record as $value) : ?>
			<td><?php echo $value; ?></td>
		<?php endforeach; ?>
	</tr>
</table>

<a href="database-view.php">&#x2190 Database Record Table</a>