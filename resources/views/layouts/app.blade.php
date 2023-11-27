<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UdaloMánia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 text-slate-700 ring-slate-700/10 hover:bg-slate-50
        }
        .btn-not {
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 text-slate-700 ring-slate-700/10 hover:bg-slate-50 bg-gray-800 text-white
        }
        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
        .error{
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>
<body class="container mx-auto mt-0 mb-10 max-w-full">

    <div class="top-bar bg-gray-800 text-white py-2 px-4 mb-4 h-16 flex items-center justify-between">
        <span class="text-lg font-semibold">UdaloMánia</span>

        <div class="flex space-x-6 float-right text-lg">
            <a href="{{ route('events.index') }}" class="text-white">Domov</a>
            <a href="{{ route('events.search_categories') }}" class="text-white">Prehľadávať</a>
            @auth
                {{-- Show the profile button if the user is authenticated --}}
                <a href="{{ route('user.show', auth()->user()->id) }}" class="text-white">Profil</a>

                {{-- Show the "Approve" button for moderators and admins --}}
                @if(auth()->user()->id == 1 || auth()->user()->id == 2 || auth()->user()->id == 3 || auth()->user()->id == 4)
                    <a href="{{ route('approve') }}" class="text-white">Správa žiadostí</a>
                    <a href="{{ route('manage_categories') }}" class="text-white">Správa kategórii</a>

                    {{-- Show the "Manage Users" button for admins --}}
                    @if(auth()->user()->id == 1)
                        <a href="{{ route('manage_users') }}" class="text-white">Správa užívateľov</a>
                    @endif

                    <a href="{{ route('manage_places') }}" class="text-white">Správa miest</a>
                @endif

            @else
                {{-- Show the login/register button if the user is not authenticated --}}
                <a href="{{ route('auth.login_form') }}" class="text-white">Prihlásenie</a>
            @endauth
            <a href="{{ route('events.create_request') }}" class="text-white">+ Vytvoriť žiadosť</a>
        </div>
    </div>

    <h1 class="mb-4 text-2xl">@yield('title')</h1>

    <div x-data="{flash: true}">
        @if(session()->has('success'))
        <div x-show="flash"
            class="relative ml-20 mr-20 mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
        role="alert">
            <strong class="font-bold">Úspech!</strong>
            <div>
                {{session('success')}}
            </div>

            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" @click="flash = false"
                stroke="currentColor" class="h-6 w-6 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </span>
        </div>
        @endif

        @if(session()->has('error'))
            <div x-show="flash"
                class="relative mb-10 ml-20 mr-20 rounded border border-red-400 bg-red-100 px-4 py-3 text-lg text-red-700"
                role="alert">
                <strong class="font-bold">Chyba!</strong>
                <div>
                    {{ session('error') }}
                </div>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" @click="flash = false"
                        stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif
        
        @yield('content')
    </div>
</body>
</html>
