<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $metaTitle ?? 'default title' }}</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/438901acfc.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="flex p-7 gap-10 h-full w-full">
        <div class="relative h-full w-[200px]">
            <x-partials.sidebar />
        </div>
        {{ $slot }}
    </main>
</body>
</html>