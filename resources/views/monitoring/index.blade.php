@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6 antialiased">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 bg-gradient-to-br from-[#ff71ce] to-[#ff0080] rounded-[2rem] p-8 text-white shadow-lg flex justify-between items-center border-b-4 border-[#b967ff]">
            <div>
                <h1 class="text-3xl font-black uppercase tracking-tighter">Open Lab Entry</h1>
                <p class="opacity-90 italic">Please tap your School ID to begin session.</p>
            </div>
            <div class="text-right">
                <p class="text-[10px] font-black uppercase opacity-80">Live Occupancy</p>
                <p class="text-4xl font-black">12 / 40</p>
            </div>
        </div>

        <div class="bg-[#fff0f6] rounded-[2rem] p-8 border-2 border-[#ff71ce] flex flex-col justify-center items-center text-center">
            <p class="text-[#ff0080] font-black text-3xl">{{ date('h:i A') }}</p>
            <p class="text-[#b967ff] text-xs font-black uppercase tracking-widest mt-1">{{ date('F d, Y') }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-[2.5rem] shadow-xl border border-pink-50 p-10">
            <h2 class="text-lg font-black text-gray-800 mb-8 uppercase">ID Verification</h2>

            @if(session('success'))
                <div class="bg-green-50 border-2 border-green-200 text-green-600 p-4 mb-6 rounded-2xl font-bold">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border-2 border-red-200 text-red-500 p-4 mb-6 rounded-2xl font-bold">{{ session('error') }}</div>
            @endif

            <form action="{{ route('scan.id') }}" method="POST" class="space-y-8">
                @csrf
                <input type="text" name="student_id" autofocus placeholder="Scan School ID..." class="w-full p-6 bg-[#fff9fb] border-2 border-[#ff71ce] rounded-[1.5rem] text-2xl font-black outline-none">
                <button type="submit" class="w-full bg-[#ff0080] text-white font-black py-5 rounded-[1.5rem] shadow-lg uppercase tracking-widest">Verify & Assign Station</button>
            </form>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-pink-50 p-10 flex flex-col justify-center">
            @if(session('student'))
                <div class="space-y-8">
                    <div class="flex items-center space-x-6">
                        <div class="h-28 w-28 bg-gradient-to-br from-[#ff71ce] to-[#b967ff] rounded-3xl p-1 shadow-lg">
                            <div class="bg-white h-full w-full rounded-[1.4rem] flex items-center justify-center text-[#ff0080] font-black text-4xl">
                                {{ substr(session('student')->first_name, 0, 1) }}{{ substr(session('student')->last_name, 0, 1) }}
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-black text-gray-900">{{ session('student')->last_name }}, {{ session('student')->first_name }}</h3>
                            <p class="text-[#ff0080] font-black text-sm uppercase tracking-widest">{{ session('student')->program }} STUDENT</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-6 bg-[#fff9fb] border-2 border-pink-50 rounded-[2rem]">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Assigned Station</p>
                            <p class="text-3xl font-black text-[#ff0080]">{{ session('pc') }}</p>
                        </div>
                        <div class="p-6 bg-[#f5f0ff] border-2 border-purple-50 rounded-[2rem]">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</p>
                            <p class="text-2xl font-black text-[#b967ff] uppercase italic">Active</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-20 opacity-30">
                    <p class="font-black text-gray-400 uppercase tracking-widest">Awaiting ID Scan...</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection