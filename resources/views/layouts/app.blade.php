<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIC Open Lab System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50">
    <div class="flex h-screen">
        <div class="w-64 bg-pink-600 text-white p-6 shadow-xl">
            <h1 class="text-xl font-bold mb-10 border-b border-pink-400 pb-4">UIC Open Lab</h1>
            <nav class="space-y-4">
                <a href="/monitoring" class="block p-3 rounded hover:bg-pink-700 transition">Lab Monitoring</a>
                <a href="/borrow" class="block p-3 rounded hover:bg-pink-700 transition">Equipment</a>
            </nav>
        </div>
        <main class="flex-1 p-10">
            @yield('content')
        </main>
    </div>
</body>
</html>