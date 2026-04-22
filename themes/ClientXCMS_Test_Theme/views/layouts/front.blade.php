<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ setting('app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ theme_asset('css/app.css') }}">
</head>
<body>
    <main>@yield('content')</main>
    <script src="{{ theme_asset('js/app.js') }}"></script>
</body>
</html>
