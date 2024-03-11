<?php

$option = "";
$text = "";

if (empty($_POST)) {
	return;
}

$option = $_POST['option'];
$text = $_POST['text'];

$config = require('../config.php');
$db = new Database($config['database']);

switch ($option) {
	case 'name':
		$text = trim($text);

		if (empty($text)) {
			break;
		}
		// getting the first name of what user types if theres a last name

		if (str_contains($text, ' ')) {
			$text = get($text, strpos($text, ' '));
		}

		// looking and displaying for names that have a similar first name

		$query = "SELECT * from form WHERE name like '{$text}%'";

		$db_data = $db->query($query)->fetchAll();

		break;
	case 'email':
		// if no @
		if (! strpos($text, '@')) {
			$text = $text . '@';
		}

		$text = get($text, strpos($text, '@'));

		$query = "SELECT * from form WHERE email like '{$text}%'";

		$db_data = $db->query($query)->fetchAll();

		break;
	default:
		$query = "select * from form where {$option} = ?";

		$db_data = $db->query($query, [$text])->fetchAll();

		break;
}