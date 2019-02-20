<?php
$usuario = "root";
$contrasena = "root"; 
$servidor = "localhost";
$basededatos_vieja = "facturero_vinix";
$basededatos_nueva = "facturero_v2";

$conexion = mysqli_connect( $servidor, $usuario, $contrasena ) or die ("No se ha podido conectar al servidor de Base de datos");
$db_vieja = mysqli_select_db( $conexion, $basededatos_vieja ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

$consulta = "SELECT * FROM egresos";
$resultado = mysqli_query( $conexion, $consulta );

$egresos_viejos = array();
while ($fila = mysqli_fetch_array( $resultado ))
{
	$egresos_viejos[] = $fila;
}

$db_nueva = mysqli_select_db( $conexion, $basededatos_nueva ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

foreach ($egresos_viejos as $egreso) {
	$exit_number = $egreso['numero_egreso'];
	$turned = $egreso['girado'];
	$document_type = $egreso['tipo_documento'];
	$document_number = $egreso['numero_documento'];
	$date = $egreso['fecha'];
	$value = str_replace(',', '', $egreso['valor']);
	$value_in_letters = $egreso['valor_letras'];
	$description = $egreso['descripcion'];
	$created_at = date('Y-m-d H:i:s');
	$updated_at = date('Y-m-d H:i:s');

	$sql = "
		INSERT INTO egresses (exit_number, turned, document_type, document_number, date, value, value_in_letters, description, created_at, updated_at) 
		VALUES ($exit_number, '$turned', '$document_type', '$document_number', '$date', '$value', '$value_in_letters', '$description', '$created_at', '$updated_at');
	";
	mysqli_query( $conexion, $sql );
	echo "Egreso #" . $exit_number . " migrado exitosamente.<br />";
}

//echo 'Egresos migrados exitosamente.';