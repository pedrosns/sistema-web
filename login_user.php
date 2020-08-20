
<!DOCTYPE html>
<html>
<head>
	<title>Restaurante - Registro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
</head>
<body>
	<form action="manager.php" method="POST">
		<input type="hidden" name="accion" value="login_user">

		<label for="username">Username or Email*</label><br>
		<input type="text" name="username"><br>

		<label for="password">Password *</label><br>
		<input type="password" name="password"><br><br>

		<input type="submit" class="btn btn-success" value="Login">
	</form>
</body>
</html>