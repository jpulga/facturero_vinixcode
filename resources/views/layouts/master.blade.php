<!DOCTYPE html>
<html>
<head>
    <title>Invoice App - Vinix Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/override.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top nav-principal">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ route('invoices.index')}}"><img src="/svg/Vinix Code-02.png" alt="" width="10%"></a>
            </div>
        </div>
    </nav>

    <br>
    
    <div class="container container-principal">
        @yield('content')
    </div>
    
    <br>
    
    <div class="container">
        <footer class="footer">
            <p>&copy; 2018 Vinix Code S.A.S.</p>
        </footer>
    </div>
    
    <br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
@stack('scripts')
</html>