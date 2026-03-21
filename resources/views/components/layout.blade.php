<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel position</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-black text-white font-sans pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="/">            
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="">Jobs</a>
                <a href="">Career</a>
                <a href="">Salaries</a>
                <a href="">Companies</a>
            </div>

            @auth
                <div class="flex space-x-6 font-bold">
                <a href="/job/create">
                    Post a Jobs
                </a> 
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit">Logout</button>
                </form>
            </div>
            @endauth

            @guest()
            <div class="space-x-6 font-bold">
                <a href="/register">Sign Up</a>
                <a href="/login">Login</a>
            </div>
            @endguest
            
        </nav>
        <main class="mt-10 max-[986px]mx-auto">
            {{ $slot }}
        </main>
    </div>
        {{-- Footer --}}
    <footer class="mt-20 border-t border-white/10 px-10 py-10 text-white/40">
        <div class="max-w-[986px] mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            
            <div class="flex flex-col items-center md:items-start gap-1">
                <a href="/">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" width="120">
                </a>
                <p class="text-sm">© {{ date('Y') }} Pixel Positions. All rights reserved.</p>
            </div>

            <div class="flex gap-10 text-sm font-semibold">
                <div class="flex flex-col gap-2">
                    <span class="text-white/60 uppercase text-xs tracking-widest">Browse</span>
                    <a href="" class="hover:text-white transition">Jobs</a>
                    <a href="" class="hover:text-white transition">Companies</a>
                    <a href="" class="hover:text-white transition">Salaries</a>
                </div>
                <div class="flex flex-col gap-2">
                    <span class="text-white/60 uppercase text-xs tracking-widest">Account</span>
                    @auth
                        <a href="/job/create" class="hover:text-white transition">Post a Job</a>
                        <form action="/logout" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:text-white transition">Logout</button>
                        </form>
                    @else
                        <a href="/register" class="hover:text-white transition">Sign Up</a>
                        <a href="/login" class="hover:text-white transition">Login</a>
                    @endauth
                </div>
            </div>

        </div>
    </footer>
</body>
</html>