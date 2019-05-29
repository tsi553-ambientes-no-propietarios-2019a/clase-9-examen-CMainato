<?php 
include('../common/utils.php');
$rol = getValidar($conn);
if($_POST) {
	if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT *
		FROM user
		WHERE Username='$username'
		AND password=MD5('$password')";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../index.php?error_message=Ocurrió un error: ' . $conn->error);
		}



		if($res->num_rows > 0) {
				while ($row = $res->fetch_assoc()) {
					$_SESSION['user'] = [
						'nombre' => $row['NombreUser'],
						'type' => $row['Rol'],
						'username' => $row['Username'],
						'password' => $row['Password'],
						'id' => $row['idUser']

					];
					
					foreach ($rol as $r) {
						$tipoRol =$r['Rol'];
					
				}

				if($tipoRol == 'Administrador'){
					redirect('../admin.php');
		}elseif($tipoRol == 'Cliente'){

			redirect('../cliente.php');
		}

					} 	
		} else {
			redirect('../index.php?error_message=Usuario o clave incorrectos!');
		}


	} else {
		redirect('../index.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../index.php');
}