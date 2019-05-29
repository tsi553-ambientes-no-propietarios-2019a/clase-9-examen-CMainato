<?php 
session_start();


$conn = new mysqli('localhost', 'root', '', 'user');

if($conn->connect_error) {
	echo 'Existió un error en la conexión ' . $conn->connect_error;
	exit;
}

function redirect($url) {
	header('Location: ' . $url);
	exit;
}

function getValidar($conn) {
	$user_id =$_SESSION['user']['id'];
	$sql ="SELECT * FROM user
	WHERE idUser = '$user_id'";

	$res = $conn->query($sql);
	if($conn->error){
redirect ('../index.php?error_message=Ocurrio un errpor:'.$conn->error);

	}
	$user =[];
	if($res->num_rows>0){
		while ($row = $res->fetch_assoc()){
			$user[] =$row;
		}
	}
	return $user;
}


function getProducts($conn) {
	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT *
		FROM productos
		";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$products = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$products[] = $row;
			}
		}

		return $products;
}

function getStore($conn) {
	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT *
		FROM user
		WHERE id !='$user_id'";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$user = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$user[] = $row;
			}
		}

		return $user;
}


//Obterner las variable
//$v=($_GET['id']);


// Mostar las variables

//echo "$v";


function getView($conn) {
	$v=($_GET['id']);
	//$user_id = $_SESSION['user']['id'];
	$sql = "SELECT *
		FROM product
		WHERE user ='$v'";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$view = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$view[] = $row;
			}
		}

		return $view;
}

function getInfo($conn) {
	$v=($_GET['id']);
	//$user_id = $_SESSION['user']['id'];
	$sql = "SELECT *
		FROM user
		WHERE id ='$v'";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$view = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$view[] = $row;
			}
		}

		return $view;
}




