<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Hello</title>
</head>
<body class="d-flex flex-column" style="background-color: rgb(210, 210, 210)">
    <div class="d-flex min-vh-100 justify-content-center align-items-center" style="gap: 1rem">
        <a class="btn btn-primary" href="{{ route('publikasi') }}" role="button">Publikasi</a>
        <a class="btn btn-secondary" href="{{ route('tambah') }}" role="button">Tambah Publikasi</a>
    </div>
</body>
</html>

