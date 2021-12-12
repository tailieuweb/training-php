<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gửi mail</title>
</head>
<body>
	<p>Hi {{ $name }}. This is a confirm email.</p>
	<p>Your password has been changed from {{ $old_pass }} to {{ $new_pass }} some minutes ago.</p>
</body>
</html>