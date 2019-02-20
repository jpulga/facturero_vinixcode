<?php
$usuario = "root";
$contrasena = "root";  
$servidor = "localhost";
$basededatos_vieja = "facturero_vinixcode_old";
$basededatos_nueva = "facturero_vinixcode";

$conexion = mysqli_connect( $servidor, $usuario, $contrasena ) or die ("No se ha podido conectar al servidor de Base de datos");
$db_vieja = mysqli_select_db( $conexion, $basededatos_vieja ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

$consulta = "SELECT * FROM r_caja";
$resultado = mysqli_query( $conexion, $consulta );

$rcaja_viejos = array();
while ($fila = mysqli_fetch_array( $resultado ))
{
	$rcaja_viejos[] = $fila;
}

$db_nueva = mysqli_select_db( $conexion, $basededatos_nueva ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

foreach ($rcaja_viejos as $recibo) {
    $box_number = $recibo['numero_caja'];
	$we_received = $recibo['recibimos'];
	$address = $recibo['direccion'];
	$city = $recibo['ciudad'];
	$document_type = $recibo['tipo_documento'];
	$document_number = $recibo['$numero_documento'];
	$date = $recibo['fecha'];
    $value = str_replace(',', '', $recibo['valor']);
    $value_in_letters = $recibo['valor_letras'];
    $description = $recibo['descripcion'];
	$created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    
    $sql = "
        INSERT INTO cash_receipts (box_number, we_received, address, city, document_type, document_number, date, value, value_in_letters, description, created_at, updated_at)
        VALUES ($box_number, '$we_received', '$address', '$city', '$document_type', '$document_number', '$date', '$value', '$value_in_letters', '$description', '$created_at', '$updated_at');   
    ";
    mysqli_query( $conexion, $sql );
    echo "Recibo #" . $box_number . " migrado exitosamente.<br />";
}