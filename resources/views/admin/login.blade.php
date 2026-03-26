@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[70vh]">
    <div class="w-full max-w-md bg-white rounded-[2.5rem] shadow-2xl p-10 border border-pink-50">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter italic">Admin Portal</h2>
            <p class="text-[#ff0080] font-bold text-xs uppercase tracking-widest mt-2">Authorized Personnel Only</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border-2 border-red-100 text-red-500 p-4 mb-6 rounded-2xl font-bold text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 mb-2 ml-4">Username</label>
                <input type="text" name="username" required class="w-full p-4 bg-[#fff9fb] border-2 border-[#ff71ce] rounded-2xl outline-none focus:shadow-md transition">
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 mb-2 ml-4">Password</label>
                <input type="password" name="password" required class="w-full p-4 bg-[#fff9fb] border-2 border-[#ff71ce] rounded-2xl outline-none focus:shadow-md transition">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-[#ff71ce] to-[#ff0080] text-white font-black py-4 rounded-2xl shadow-lg uppercase tracking-widest hover:opacity-90 transition transform active:scale-95">
                Unlock Dashboard
            </button>
        </form>
    </div>
</div>
@endsection