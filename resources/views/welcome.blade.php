<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/app.css">
        <title>Facturero - Vinix Code</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="/svg/logo.png" class="logo-navbar" /></a>        
        </div>
    </nav>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Facturero Vinix Code S.A.S</h1>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                <h4 class="my-0 font-weight-normal">Facturas</h4>
            </div>

            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Es un documento de carácter mercantil que indica una compraventa de un bien o servicio y, además, incluye toda la información de la operación.</li>
                </ul>
                <a href="{{ route('invoices.index') }}" class="btn btn-lg btn-block btn-outline-primary">Mis Facturas</a>
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Recibos de Caja</h4>
            </div>

            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Es un soporte de contabilidad en el cual constan los ingresos en efectivo o en cheque recaudados por la empresa.</li>
                </ul>
                <a href="{{ route('cash_receipts.index') }}" class="btn btn-lg btn-block btn-primary">Mis Recibos de Caja</a>
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Egresos</h4>
            </div>

            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Un gasto es un egreso o salida de dinero que una persona o empresa debe pagar para acreditar su derecho sobre un artículo o a recibir un servicio.</li>
                </ul>
                <a href="{{ route('egresses.index') }}" class="btn btn-lg btn-block btn-outline-primary">Mis Egresos</a>
            </div>
        </div>
    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <p>&copy; <?php echo date('Y'); ?> Vinix Code S.A.S. </p>
            </div>
        </div>
    </footer>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>