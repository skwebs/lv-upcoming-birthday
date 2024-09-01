


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="p-5 font-sans antialiased dark:bg-black dark:text-white/50">
        <h1>Upcoming Birthdays in the next 7 days.</h1>

        @if ($users->isEmpty())
            <p>No upcoming birthdays in the next 7 days.</p>
        @else
            <ul>
            </ul>
        @endif
        <marquee behavior="alternative" direction="">
            <div class="flex ">
                @foreach ($users as $user)
                    <div class="relative p-5 pt-8 mt-14 rounded-md w-fit text-center bg-cyan-700 text-white m-2 text-nowrap">
                        <div class="absolute border left-1/2 -top-8 -translate-x-1/2 text-2xl bg-cyan-700 mx-auto font-semibold  size-16 flex justify-center items-center rounded-full">{{ $loop->iteration }}</div>
                        <div>{{ $user->name }}</div>
                        <div>{{ date('F j', strtotime($user->birthdate)) }}</div>
                        <div>{{ \Carbon\Carbon::parse(date('F j', strtotime($user->birthdate)))->diffForHumans() }}</div>
                        <div>{{ $user->birthdate }}</div>
                    </div>
                @endforeach
            </div>
        </marquee>
    </body>
</html>
