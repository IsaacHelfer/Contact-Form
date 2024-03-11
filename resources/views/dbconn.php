<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel & MYSQL DB Connection</title>
</head>
<body>
	<div>
		<?php
			if (DB::connection()->getPdo()) {
				echo "Successfully Connected to DB";
			}
		?>
	</div>

</body>
</html>