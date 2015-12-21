<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset SIM KINERJA LPPM UNESA</h2>

		<div>
			Untuk me-reset password akun Anda, silahkan klik link berikut: <br>
			{{ link_to_route('guest.createnewpassword', null, ['email'=>$email, 'resetCode'=>$resetCode]) }}
		</div>
	</body>
</html>
