<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIC Open Lab</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fff5f8; }
    </style>
</head>
<body class="flex min-h-screen">
    <nav class="w-72 bg-gradient-to-b from-[#ff71ce] to-[#b967ff] p-8 text-white flex flex-col shadow-xl">
        <div class="mb-12">
            <h1 class="text-3xl font-black italic tracking-tighter">UIC LAB</h1>
        </div>

        <div class="space-y-4 flex-1">
            <a href="/monitoring" class="flex items-center p-4 rounded-2xl hover:bg-white/20 transition font-black text-sm uppercase tracking-widest">
                Monitoring
            </a>
            
            @if(Auth::guard('admin')->check())
                <div class="pt-6 mt-6 border-t border-white/20">
                    <a href="/admin/dashboard" class="flex items-center p-4 rounded-2xl hover:bg-white/20 transition font-black text-sm uppercase tracking-widest">
                        Dashboard
                    </a>
                </div>
            @endif
        </div>

        @if(Auth::guard('admin')->check())
            <form action="/admin/logout" method="POST">
                @csrf
                <button class="w-full bg-white/10 p-4 rounded-2xl font-black text-xs uppercase">Logout</button>
            </form>
        @else
            <a href="/admin/login" class="text-center bg-white/10 p-4 rounded-2xl font-black text-xs uppercase">Admin Login</a>
        @endif
    </nav>

    <main class="flex-1 p-12 overflow-y-auto">
        @yield('content')
    </main>
</body>
</html>