<?php 
	
	require '../model/color.php';

	$colNombre = $_POST['colNombre'];

	$objColor = new Color();
	$json['success'] = false;
	$json['success'] = $objColor->insertColor($colNombre);

    echo json_encode($json);
 
?>