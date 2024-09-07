<!DOCTYPE html>
<html lang="en">
<head>
    @props(['title'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'jawaaf News portal'}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=66d97cebe5d1da00197140af&product=inline-share-buttons&source=platform" async="async"></script>
</head>
<body>
    <header>
       <x-frontend-topbar/>
    </header>
    <main>
        <x-frontend-navbar/>
        {{ $slot }}
    </main>
    <footer></footer>
</body>
</html>