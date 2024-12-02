<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/terminosCondiciones.js'])
</head>
<body>
    <div>
        @yield('titulo')
    </div>
        @yield('content')
</body>
</html>