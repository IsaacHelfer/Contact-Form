<?php

require('../Database.php');
require ('../functions.php');

$config = require('../config.php');
$db = new Database($config['database']);

$id = $_GET['id'];

$record = $db->query("select * from form where id = ?", [$id])->fetch();

$db->query("delete from form where id = ?", [$id]);



