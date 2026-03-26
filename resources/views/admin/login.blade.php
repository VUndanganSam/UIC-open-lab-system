@extends('layouts.app')

@section('content')
<div class="h-full flex items-center justify-center">
    <div class="bg-white p-10 rounded-3xl shadow-2xl border border-pink-100 w-full max-w-md">
        <div class="text-center mb-8">
            <div class="inline-block p-4 bg-pink-100 rounded-2xl text-pink-600 mb-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <h2 class="text-2xl font-black text-gray-800">Administrator Login</h2>
            <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mt-1">Open Laboratory System</p>
        </div>

        <form action="/admin/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-pink-700 uppercase mb-1">Username</label>
                <input type="text" name="username" required class="w-full p-4 bg-pink-50/50 border-2 border-pink-50 rounded-2xl focus:border-pink-500 outline-none">
            </div>

            <div>
                <label class="block text-[10px] font-black text-pink-700 uppercase mb-1">Password</label>
                <input type="password" name="password" required class="w-full p-4 bg-pink-50/50 border-2 border-pink-50 rounded-2xl focus:border-pink-500 outline-none">
            </div>

            <button type="submit" class="w-full bg-pink-600 text-white font-black py-4 rounded-2xl shadow-lg hover:bg-pink-700 transition-all">
                ENTER DASHBOARD
            </button>
        </form>
    </div>
</div>
@endsection