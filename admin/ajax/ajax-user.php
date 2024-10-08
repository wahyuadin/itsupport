<?php
include '../../function.php';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$id_user 		= htmlspecialchars($_POST['id_user']);
	$check_user 	= query("SELECT * FROM pengguna WHERE idkary = '$id_user' ");
	
	echo json_encode($check_user[0]);
}



?>