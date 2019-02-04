@extends('layouts.master')

@section('content')
<div align="center">
    <h1>Recibo de caja</h1>
  <table width="900" border="2">
    <tr border="2">
      <td class="cuatro" align="center" width="300">
        <strong>Vinix Code S.A.S.</strong>
      </td>

      <td class="cuatro" align="center" width="300">
        <strong>Nit: </strong>901116567
      </td>

      <td class="cuatro" align="center" width="300">
        <strong>Recibo de caja N°:</strong>
        {{$cash_receipt->box_number}}
      </td>
    </tr>
  </table>

  <br>
  <table width="900" border="2">
    <tr>
      <td class="ojo" width="500">
        <strong>Recibimos de:</strong>
        {{ $cash_receipt->we_received }}
      </td>

      <td class="ojo" width="400">
        <strong>Direccion:</strong>
        {{ $cash_receipt->address }}
      </td>

      <td class="ojo" width="700">
        <strong>Fecha:</strong>
        {{ $cash_receipt->date }}
      </td> 
    </tr>

    <tr>
      <td class="ojo">
      	<strong>Nit:</strong>{{ $cash_receipt->document_type }}
          {{ $cash_receipt->document_number }}
      </td>

      <td class="ojo">
        <strong>Ciudad:</strong>
        {{ $cash_receipt->city }}
      </td>

      <td class="ojo">
        <strong>Valor en  letras:</strong>
        {{ $cash_receipt->value_in_letters }}
      </td>
    </tr>
  </table>

  <br>
  <table width="900" border="2">

    <tr>
      <td align="center" width="700">
        <strong>Descripcion</strong> 
      </td>

      <td align="center" width="200">
        <strong>Valor</strong>
      </td>
    </tr>

    <tr>
      <td class="uno" height="400" align="center">{{ $cash_receipt->description }}</td>
      <td class="uno" height="400" align="center">$ {{ $cash_receipt->value }}</td>
    </tr>
  </table>
  
  <br>
  <table width="900" border="2">
    <tr>
      <td class="dos" align="center" width="450" height="50">
        <strong>Elaboro</strong>
      </td>

      <td class="dos" align="center" width="450" height="50">
        <strong>Firma Y Sello</strong>
      </td>
    </tr>   
  </table>
  <br>
  <strong>Vinix Code S.A.S<br>
  Calle 87 Sur # 55-695, Apto. 1603<br>
  055460, La Estrella, Antioquia<br>
  Colombia<br>
  www.vinixcode.com</strong>
  </div>
@endsection