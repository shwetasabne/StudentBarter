<!doctype html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	</head>
	<body>
		<h2>Please verify your email address</h2>
		<p>Hey <?php echo $first_name ?>,</p>
		<p>Glad you signed up for StudentBarter.</p>
		<p>Please follow the link below to verify your email address</p>
		<p><?php echo url('auth/verify', [$confirmation_code])?></p>
		<p><?php echo url('auth/verify', $confirmation_code)?></p>
	</body>
</html>
