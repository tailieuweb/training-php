<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gửi mail</title>
</head>
<body>
	<p style="font-size:17px;">Hi {{ $person->full_name }}, this is a verify email. Thanks for joining us</p>
	<p style="font-size:17px;">Please press the "Verify" button to let us know it's you.</p>
    <br>
    <a href="{{ route('activeAccount', ['customer_id' => $customer->id, 'token' => $customer->token]) }}" style="display: inline-block;font-size: 14px;font-weight: bold;padding: 10px 20px;border:none;background:#007aff;color:#fff;border-radius: 10px;text-align:center;text-decoration: none;margin-bottom: 10px;">Verify</a>
</body>
</html>