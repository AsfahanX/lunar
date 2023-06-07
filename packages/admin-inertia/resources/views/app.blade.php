<!DOCTYPE html>
<html lang="en"
      class="h-full bg-gray-50">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0" />
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito&display=swap"
          rel="stylesheet">

    @routes
    @vite('resources/js/app.js', 'vendor/lunar/admin-hub/build')
    @inertiaHead
</head>

<body>
    @inertia
</body>

</html>
