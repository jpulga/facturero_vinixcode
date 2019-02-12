<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Facturero Vinix Code</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/override.css">
        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Facturero Vinix Code S.A.S
                </div>

                <div class="links">
                    <a href="{{ route('invoices.index') }}">Facturas</a>
                    <a href="{{ route('cash_receipts.index') }}">Recibos de Caja</a>
                    <a href="{{ route('expenses.index') }}">Egresos</a>
                </div>
            </div>
        </div>
    </body>
</html>
