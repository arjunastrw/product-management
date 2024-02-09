<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', 'Product Management')</title>
</head>

<body>
    <!-- Main content -->
    <main>
        @yield('content-login')
        @yield('content-register')
        @yield('dashboard')
    </main>
</body>

</html>