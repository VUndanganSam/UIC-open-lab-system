@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-pink-800 uppercase tracking-tighter">System Overview</h1>
            <p class="text-pink-500 font-bold italic text-sm">Welcome back, Laboratory Administrator</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-white border-2 border-pink-500 text-pink-600 px-4 py-2 rounded-xl font-bold text-xs hover:bg-pink-50 transition">
                REFRESH DATA
            </button>
            <button class="bg-pink-600 text-white px-4 py-2 rounded-xl font-bold text-xs shadow-lg hover:bg-pink-700 transition">
                GENERATE DAILY REPORT
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-pink-100">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Active Students</p>
            <div class="flex items-end justify-between mt-2">
                <h3 class="text-4xl font-black text-pink-600">12</h3>
                <span class="text-[10px] font-bold text-green-500 mb-1">+2 from last hour</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-pink-100">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Equip. Borrowed</p>
            <div class="flex items-end justify-between mt-2">
                <h3 class="text-4xl font-black text-gray-800">05</h3>
                <span class="text-[10px] font-bold text-pink-400 mb-1">Check logs</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-pink-100">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Pending Bookings</p>
            <div class="flex items-end justify-between mt-2">
                <h3 class="text-4xl font-black text-gray-800">02</h3>
                <span class="text-[10px] font-bold text-gray-400 mb-1">For Today</span>
            </div>
        </div>

        <div class="bg-pink-600 p-6 rounded-3xl shadow-lg text-white">
            <p class="text-[10px] font-black text-pink-200 uppercase tracking-widest text-center">Lab Status</p>
            <h3 class="text-2xl font-black text-center mt-2 uppercase italic">Operational</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white rounded-3xl shadow-xl p-8 border border-pink-50">
            <div class="flex justify-between items-center mb-8">
                <h2 class="font-black text-gray-800 uppercase text-sm tracking-widest">Weekly Laboratory Traffic</h2>
                <select class="text-[10px] font-bold border-none bg-pink-50 text-pink-600 rounded-lg p-2 focus:ring-0">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                </select>
            </div>
            
            <div class="h-64 w-full bg-pink-50/50 rounded-2xl flex items-end justify-between p-6 space-x-4 border-b-2 border-pink-200">
                <div class="w-full bg-pink-200 rounded-t-lg transition-all hover:bg-pink-400" style="height: 40%"></div>
                <div class="w-full bg-pink-300 rounded-t-lg transition-all hover:bg-pink-400" style="height: 65%"></div>
                <div class="w-full bg-pink-400 rounded-t-lg transition-all hover:bg-pink-500" style="height: 90%"></div>
                <div class="w-full bg-pink-200 rounded-t-lg transition-all hover:bg-pink-400" style="height: 30%"></div>
                <div class="w-full bg-pink-500 rounded-t-lg transition-all" style="height: 75%"></div>
                <div class="w-full bg-pink-300 rounded-t-lg transition-all hover:bg-pink-400" style="height: 50%"></div>
                <div class="w-full bg-pink-100 rounded-t-lg transition-all hover:bg-pink-400" style="height: 20%"></div>
            </div>
            <div class="flex justify-between mt-4 text-[10px] font-black text-gray-400 uppercase px-2">
                <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8 border border-pink-50">
            <h2 class="font-black text-gray-800 uppercase text-sm tracking-widest mb-6">Recent Activity</h2>
            <div class="space-y-6">
                <div class="flex items-start space-x-3">
                    <div class="bg-green-100 p-2 rounded-lg text-green-600">✓</div>
                    <div>
                        <p class="text-xs font-bold text-gray-800">Solis, Natalio M.</p>
                        <p class="text-[10px] text-gray-400 font-medium">Timed Out • PC-04</p>
                        <p class="text-[9px] text-pink-400 font-bold mt-1">2 mins ago</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="bg-pink-100 p-2 rounded-lg text-pink-600">→</div>
                    <div>
                        <p class="text-xs font-bold text-gray-800">Tan, Cheska L.</p>
                        <p class="text-[10px] text-gray-400 font-medium">Timed In • PC-12</p>
                        <p class="text-[9px] text-pink-400 font-bold mt-1">15 mins ago</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-10 py-3 text-[10px] font-black text-pink-600 border-2 border-pink-50 rounded-xl hover:bg-pink-50 transition uppercase tracking-widest">
                View All Activity
            </button>
        </div>
    </div>
</div>
@endsection