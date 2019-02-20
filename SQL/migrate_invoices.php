<?php
$usuario = "root";
$contrasena = "root";  
$servidor = "localhost";
$basededatos_vieja = "facturero_vinixcode_old";
$basededatos_nueva = "facturero_vinixcode";

$conexion = mysqli_connect( $servidor, $usuario, $contrasena ) or die ("No se ha podido conectar al servidor de Base de datos");
$db_vieja = mysqli_select_db( $conexion, $basededatos_vieja ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

$consulta = "SELECT * FROM facturas";
$resultado = mysqli_query( $conexion, $consulta );

$facturas = array();
while ($fila = mysqli_fetch_array( $resultado ))
{
	$facturas[] = $fila;
}

$db_nueva = mysqli_select_db( $conexion, $basededatos_nueva ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

foreach ($facturas as $factura) {
    $invoice_number = $factura['numero_factura'];
	$company_origin = $factura['origen'];
	$client = $factura['destinatario'];
	$date = $factura['fecha'];
	$expiration_date = $factura['fecha_vencimiento'];
	$document_type = $factura['$tipo_documento'];
	$document_number = $factura['numero_documento'];
    $cellphone = $factura['telefono	'];
    $address = $factura['direccion'];
    $currency = $factura['moneda'];
    $state = $recibo['estado'];
    $notes = $recibo['notas'];
    $sub_total = str_replace(',', '', $factura['total']);
    $discount = $recibo['descuento'];
    $grand_total = str_replace(',', '', $factura['total_pagar']);
	$created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    
    $sql = "
        INSERT INTO invoices (invoice_number, company_origin, client, date, expiration_date, document_type, document_number, cellphone, address, currency, state, notes, sub_total, discount, grand_total, created_at, updated_at)
        VALUES ($invoice_number, '$company_origin', '$client', '$date', '$expiration_date', '$document_type', '$document_number', '$cellphone', '$address', '$currency', '$state', '$notes', '$sub_total', '$discount', '$grand_total', '$created_at', '$updated_at');   
    ";
    mysqli_query( $conexion, $sql );
    echo "La factura #" . $invoice_number . " migrado exitosamente.<br />";
}

foreach ($facturas[productos] as $producto) {
    # code...
}
