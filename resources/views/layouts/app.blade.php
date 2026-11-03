<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Website Jeneponto' }}</title>
	@yield('meta_tags')
    <script>
        // Check initial theme before rendering to avoid FOUC
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme-dark-light.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive-animations.css') }}">
    <script src="{{ asset('js/interactive-animations.js') }}" defer></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
        @keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeUp {
    animation: fadeUp 0.9s ease forwards;
}

.delay-200 {
    animation-delay: .2s;
}
    </style>
    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
    <style>
/* ========================= */
/* SMOOTH SCROLL REVEAL     */
/* ========================= */

.reveal {
    opacity: 0;
    transform: translateY(60px);
    transition: opacity 1s cubic-bezier(0.16,1,0.3,1),
                transform 1s cubic-bezier(0.16,1,0.3,1);
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}
</style>
<style>
/* =============================== */
/* PER-CARD SMOOTH REVEAL SYSTEM  */
/* =============================== */

.reveal-card {
    opacity: 0;
    transform: translateY(60px) scale(0.96);
    transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1),
                transform 0.9s cubic-bezier(0.16,1,0.3,1);
}

.reveal-card.active {
    opacity: 1;
    transform: translateY(0) scale(1);
}
</style>
</head>
<body class="bg-gray-100">

    {{-- NAVBAR USER --}}
    @include('layouts.navbar')

    {{-- CONTENT --}}
    @yield('content')

    {{-- FOOTER USER --}}
    @include('layouts.footer')

    @stack('scripts')
    

</body>
</html>