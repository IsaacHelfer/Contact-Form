<?php 

require('../Database.php');
require('../functions.php');

// making sure only displaying if the current page is this page only
// had a bug of dispalying empty ul on database page

$php_self = '/public/views/info-view.php';

if ($_SERVER['PHP_SELF'] === $php_self) {
	$_POST['issue'] = ucfirst($_POST['issue']);
	
	list_out_database_data($_POST);
}

// putting data in database

$config = require('../config.php');
$db = new Database($config['database']);

$posts = $db->query("select * from form")->fetchAll(PDO::FETCH_ASSOC);

// checking if form was submitted and putting data in database
// making sure the post doesn't throw an error on a different page

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['PHP_SELF'] === $php_self) {
	$data = convert_special([
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'issue' => $_POST['issue'],
		'comment' => $_POST['comment']
	]);

	$query = "INSERT INTO form(name, email, issue, comment) VALUES(?, ?, ?, ?)";

    $db->query($query, [$data['name'], $data['email'], $data['issue'], $data['comment']]);
}