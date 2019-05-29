<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['nombre']) && isset($_POST['type']) && isset($_POST['username']) && isset($_POST['password'])&& !empty($_POST['nombre']) && !empty($_POST['type'])   && !empty($_POST['username']) &&  !empty($_POST['password'])&&!empty($_POST['password1']) && ($_POST['password']==$_POST['password1'])    ) {
		$nombre = $_POST['nombre'];
			$type = $_POST['type'];
		$username = $_POST['username'];
	
		$password = $_POST['password'];

		

		$sql_insert = "INSERT INTO user
		(NombreUser, Rol, Username,Password)
		VALUES ('$nombre','$type','$username' ,MD5('$password'))";

		echo $sql_insert;
		$conn->query($sql_insert);

		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('../index.php');
		}
	} else {
		redirect('../registro.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../registro.php');
}