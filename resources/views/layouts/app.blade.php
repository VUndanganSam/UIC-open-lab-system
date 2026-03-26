<div class="w-64 bg-pink-600 text-white p-6 shadow-xl">
    <h1 class="text-xl font-bold mb-10 border-b border-pink-400 pb-4 text-center">
        UIC OPEN LAB
    </h1>
    
    <nav class="space-y-4">
        <a href="/monitoring" class="flex items-center p-3 rounded-xl hover:bg-pink-700 transition font-bold">
            <span class="mr-3">🕒</span> Monitoring
        </a>

        @if(auth()->guard('admin')->check())
            <div class="pt-4 mt-4 border-t border-pink-400">
                <p class="text-[10px] uppercase font-black mb-2 opacity-70 tracking-widest text-pink-200">Management</p>
                
                <a href="/borrow" class="flex items-center p-3 rounded-xl hover:bg-pink-700 transition font-bold">
                    <span class="mr-3">📦</span> Equipment Log
                </a>
                
                <a href="/bookings" class="flex items-center p-3 rounded-xl hover:bg-pink-700 transition font-bold">
                    <span class="mr-3">📅</span> Lab Bookings
                </a>

                <a href="/reports" class="flex items-center p-3 rounded-xl hover:bg-pink-700 transition font-bold">
                    <span class="mr-3">📊</span> Usage Reports
                </a>

                <form action="/admin/logout" method="POST" class="mt-8">
                    @csrf
                    <button class="w-full text-left p-3 rounded-xl bg-pink-800 hover:bg-red-600 transition font-bold text-sm">
                        Logout Admin
                    </button>
                </form>
            </div>
        @else
            <div class="pt-4 mt-4 border-t border-pink-400">
                <a href="/admin/login" class="flex items-center p-3 rounded-xl border border-pink-400 hover:bg-pink-500 transition text-xs font-bold italic">
                    Admin Access Only
                </a>
            </div>
        @endif
    </nav>
</div>