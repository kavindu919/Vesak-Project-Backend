<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vesak Project</title>
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>
    <main class=" h-screen w-screen grid grid-cols-[256px,1fr]">
        <div class=" bg-slate-200 flex flex-col">
            <div class=" px-6 py-4 border-b-2 border-slate-300"><span class=" text-xl font-bold text-purple-700">Project
                    Vesak</span></div>
            <div>
                <ul class="space-y-2 p-2">
                    <li
                        class=" hover:bg-white p-4 text-md font-semibold border
                    border-solid rounded-md cursor-pointer flex flex-cols gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu">
                            <line x1="4" x2="20" y1="12" y2="12" />
                            <line x1="4" x2="20" y1="6" y2="6" />
                            <line x1="4" x2="20" y1="18" y2="18" />
                        </svg>
                        <span>Dashboard</span>
                    </li>
                    <li
                        class=" hover:bg-white p-4 text-md font-semibold border
                    border-solid rounded-md cursor-pointer flex flex-cols gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users-round-icon lucide-users-round">
                            <path d="M18 21a8 8 0 0 0-16 0" />
                            <circle cx="10" cy="8" r="5" />
                            <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                        </svg>
                        <form action="{{ route('get-allusers') }}" method="GET">
                            @csrf
                            <button type="submit">Users</button>
                        </form>
                    </li>
                    <li
                        class="flex flex-cols gap-2 hover:bg-white p-4 text-md font-semibold border
                    border-solid rounded-md cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-scroll-icon lucide-scroll">
                            <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                            <path
                                d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
                        </svg>
                        <form action="{{ route('get-allevents') }}" method="GET">
                            @csrf
                            <button type="submit">Events</button>
                        </form>
                    </li>


                </ul>
            </div>
        </div>
        <div class="flex flex-col">
            <div class=" flex flex-row items-center justify-between px-6 py-4">
                <span class="text-xl font-bold">@yield('title')</span>
                <img src="https://picsum.photos/200/300" alt="User Avatar" class="w-10 h-10 rounded-full">
            </div>
            <div class="h-full w-full p-4">
                @yield('content')
            </div>
        </div>
    </main>
</body>

</html>
