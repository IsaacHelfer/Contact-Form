<?php

require('../Database.php');
require ('../functions.php');

$config = require('../config.php');
$db = new Database($config['database']);

$database_id = $_GET['id'];

$database_data = get_database_data($db, "select * from form where id = ?", [$database_id]);

$drop_down_items = ['Query', 'Feedback', 'Complaint', 'Other'];

// if there is no database data

if (! $database_data) {
	echo "<p style='color: red;'>Record of id <strong>{$database_id} </strong> not found...</p>";
	echo "<a href='/views/database-view.php'>&#x2190 Database Table</a>";
	
	die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	foreach (array_keys($_POST) as $value) {
		$db->query("UPDATE form SET {$value} = ? WHERE id = ?", [$_POST[$value], $database_id]);
	}

	// update the data after the changes
	$database_data = get_database_data($db, "select * from form where id = ?", [$database_id]);

	echo "<script>confirm('Save Changes?')</script>";
}