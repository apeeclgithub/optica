<?php 
	
	require '../model/marca.php'; 

	$marNombre = $_POST['marNombre'];

	$objMarca = new Marca();
	$json['success'] = false;
	$json['success'] = $objMarca->insertMarca($marNombre);
    echo json_encode($json);

?>