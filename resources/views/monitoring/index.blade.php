@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6 antialiased">
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 bg-gradient-to-br from-[#ff71ce] to-[#ff0080] rounded-[2rem] p-8 text-white shadow-[0_0_20px_rgba(255,113,206,0.4)] flex justify-between items-center border-b-4 border-[#b967ff]">
            <div>
                <h1 class="text-3xl font-black uppercase tracking-tighter drop-shadow-md">Open Lab Entry</h1>
                <p class="text-pink-100 font-medium italic opacity-90">Please tap your School ID to begin session.</p>
            </div>
            <div class="text-right">
                <p class="text-[10px] font-black uppercase tracking-widest opacity-80">Live Occupancy</p>
                <p class="text-4xl font-black">12 <span class="text-lg opacity-60">/ 40</span></p>
            </div>
        </div>

        <div class="bg-[#fff0f6] rounded-[2rem] p-8 border-2 border-[#ff71ce] shadow-inner flex flex-col justify-center items-center text-center">
            <p class="text-[#ff0080] font-black text-3xl drop-shadow-sm">{{ date('h:i A') }}</p>
            <p class="text-[#b967ff] text-xs font-black uppercase tracking-[0.2em] mt-1">{{ date('F d, Y') }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-[2.5rem] shadow-xl border border-pink-50 p-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-[#fff0f6] rounded-full -mr-16 -mt-16 opacity-50"></div>
            
            <h2 class="text-lg font-black text-gray-800 mb-8 flex items-center uppercase tracking-tight">
                <span class="bg-[#ff71ce] text-white p-2.5 rounded-xl mr-4 shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                </span>
                ID Verification
            </h2>

            @if(session('success'))
                <div class="bg-green-50 border-2 border-green-200 text-green-600 p-4 mb-6 rounded-2xl font-bold animate-bounce">
                    ✨ {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border-2 border-red-200 text-red-500 p-4 mb-6 rounded-2xl font-bold">
                    ❌ {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('scan.id') }}" method="POST" class="space-y-8">
                @csrf
                <div class="relative group">
                    <input type="text" name="student_id" autofocus placeholder="Scan School ID..."
                           class="w-full p-6 bg-[#fff9fb] border-2 border-[#ff71ce] rounded-[1.5rem] focus:border-[#ff0080] focus:ring-4 focus:ring-pink-100 outline-none text-2xl font-black text-pink-900 placeholder-pink-200 transition-all shadow-inner">
                    <div class="absolute right-6 top-1/2 -translate-y-1/2">
                        <span class="bg-[#b967ff] text-white px-3 py-1 rounded-lg text-[10px] font-black tracking-tighter shadow-md uppercase">Waiting for Tap</span>
                    </div>
                </div>

                <div class="p-5 bg-[#fff0f6] border-l-8 border-[#ff71ce] rounded-2xl">
                    <p class="text-[11px] text-pink-700 leading-relaxed font-bold uppercase tracking-wide">
                        <strong>Policy Notice:</strong> Max 3 sessions/week. Please logout to clear your PC unit.
                    </p>
                </div>
                
                <button type="submit" class="w-full bg-[#ff0080] text-white font-black py-5 rounded-[1.5rem] shadow-[0_10px_20px_rgba(255,0,128,0.3)] hover:bg-[#ff71ce] hover:-translate-y-1 transition-all active:scale-95 uppercase tracking-widest">
                    Verify & Assign Station
                </button>
            </form>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-pink-50 p-10 flex flex-col justify-center">
            <h2 class="text-lg font-black text-gray-800 mb-8 uppercase tracking-tight">Active Student Profile</h2>
            
            @if(session('student'))
                <div class="space-y-8 animate-in fade-in zoom-in duration-300">
                    <div class="flex items-center space-x-6">
                        <div class="h-28 w-28 bg-gradient-to-br from-[#ff71ce] to-[#b967ff] rounded-3xl p-1 shadow-lg">
                            <div class="bg-white h-full w-full rounded-[1.4rem] flex items-center justify-center text-[#ff0080] font-black text-4xl">
                                {{ substr(session('student')->first_name, 0, 1) }}{{ substr(session('student')->last_name, 0, 1) }}
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-black text-gray-900 leading-tight">{{ session('student')->last_name }}, {{ session('student')->first_name }} {{ session('student')->middle_initial }}</h3>
                            <p class="text-[#ff0080] font-black text-sm tracking-widest mt-1 uppercase">{{ session('student')->program }} STUDENT • YEAR {{ session('student')->year_level }}</p>
                            <p class="text-gray-400 text-xs font-mono mt-1">SN: {{ session('student')->student_id }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-6 bg-[#fff9fb] border-2 border-pink-50 rounded-[2rem] shadow-sm">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Assigned Station</p>
                            <p class="text-3xl font-black text-[#ff0080]">{{ session('pc') }}</p>
                        </div>
                        <div class="p-6 bg-[#f5f0ff] border-2 border-purple-50 rounded-[2rem] shadow-sm">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Status</p>
                            <p class="text-2xl font-black text-[#b967ff] uppercase italic">Active</p>
                        </div>
                    </div>

                    <div class="pt-6 border-t-2 border-dotted border-pink-100">
                        <div class="flex justify-between items-end mb-3">
                            <p class="text-xs font-black text-gray-500 uppercase tracking-widest">Weekly Limit Tracker</p>
                            <p class="text-sm font-black text-[#ff0080]">{{ session('student')->total_sessions }} / 3</p>
                        </div>
                        <div class="w-full bg-gray-100 h-4 rounded-full p-1 shadow-inner">
                            @php $percent = (session('student')->total_sessions / 3) * 100; @endphp
                            <div class="bg-gradient-to-r from-[#ff71ce] to-[#ff0080] h-full rounded-full shadow-[0_0_10px_#ff71ce]" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-20 opacity-30">
                    <div class="text-6xl mb-4">💳</div>
                    <p class="font-black text-gray-400 uppercase tracking-widest">Awaiting ID Scan...</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection