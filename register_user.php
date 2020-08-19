
<!DOCTYPE html>
<html>
<head>
	<title>Restaurante - Registro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
</head>
<body>
	<form action="manager.php" method="POST">
		<input type="hidden" name="accion" value="register_user">

		<label for="username">Username *</label><br>
		<input type="text" name="username"><br>

		<label for="email">Email *</label><br>
        <input type="text" name="email"><br>

		<label for="password">Password *</label><br>
		<input type="password" name="password"><br>

		<label for="password">Repetir password</label><br>
		<input type="password" name="password_re"><br><br>

		<input type="submit" class="btn btn-success" value="Registrar">
	</form>
</body>
</html>