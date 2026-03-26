@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="border-b-2 border-pink-100 pb-6">
        <h1 class="text-3xl font-black text-pink-800 uppercase tracking-tighter">Laboratory Reservation</h1>
        <p class="text-pink-500 font-bold italic">Professor Portal • Academic Scheduling</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-sm font-black text-gray-400 uppercase tracking-widest">Select Available Laboratory</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <button onclick="selectLab('Lab 201')" class="group relative bg-white border-2 border-pink-100 p-8 rounded-3xl hover:border-pink-500 hover:shadow-xl transition-all text-center">
                    <span class="block text-3xl font-black text-pink-800 group-hover:scale-110 transition-transform">201</span>
                    <span class="text-[10px] font-bold text-green-500 uppercase">Available</span>
                </button>

                <button disabled class="relative bg-gray-50 border-2 border-gray-200 p-8 rounded-3xl text-center cursor-not-allowed opacity-60">
                    <span class="block text-3xl font-black text-gray-400">202</span>
                    <span class="text-[10px] font-bold text-red-400 uppercase italic">Maintenance</span>
                    <div class="absolute inset-0 bg-gray-200/10 rounded-3xl"></div>
                </button>

                <button onclick="selectLab('Lab 203')" class="group bg-white border-2 border-pink-100 p-8 rounded-3xl hover:border-pink-500 hover:shadow-xl transition-all text-center">
                    <span class="block text-3xl font-black text-pink-800 group-hover:scale-110 transition-transform">203</span>
                    <span class="text-[10px] font-bold text-green-500 uppercase">Available</span>
                </button>
            </div>

            <div class="bg-white rounded-3xl shadow-lg border border-pink-50 overflow-hidden">
                <div class="p-4 bg-pink-50 border-b border-pink-100">
                    <h3 class="text-xs font-black text-pink-800 uppercase">Today's Approved Bookings</h3>
                </div>
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 font-bold uppercase">
                        <tr>
                            <th class="px-6 py-3">Time</th>
                            <th class="px-6 py-3">Lab</th>
                            <th class="px-6 py-3">Professor</th>
                            <th class="px-6 py-3">Subject</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-6 py-4 font-bold">09:00 - 10:30</td>
                            <td class="px-6 py-4 text-pink-600 font-bold">Lab 201</td>
                            <td class="px-6 py-4 italic">Dr. Garcia, Maria L.</td>
                            <td class="px-6 py-4 font-medium text-gray-700">ITE 311 (SAD)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="bookingForm" class="bg-white rounded-3xl shadow-2xl p-8 border-t-8 border-pink-600 h-fit sticky top-6">
            <h2 class="text-xl font-black text-pink-800 mb-6 uppercase tracking-tight">Booking Details</h2>
            
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[10px] font-black text-pink-700 uppercase mb-1">Selected Room</label>
                    <input type="text" id="selected_lab" name="lab_name" readonly 
                           class="w-full p-3 bg-pink-50 border-none rounded-xl font-black text-pink-600 outline-none" placeholder="Select a lab...">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-pink-700 uppercase mb-1">Subject & Section</label>
                    <input type="text" name="subject" placeholder="e.g., CS 412 - 4B" 
                           class="w-full p-4 bg-gray-50 border-2 border-gray-50 rounded-2xl focus:border-pink-500 outline-none transition-all">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-pink-700 uppercase mb-1">Date</label>
                        <input type="date" name="booking_date" class="w-full p-3 bg-gray-50 border-2 border-gray-50 rounded-xl focus:border-pink-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-pink-700 uppercase mb-1">Time Slot</label>
                        <select name="time_slot" class="w-full p-3 bg-gray-50 border-2 border-gray-50 rounded-xl focus:border-pink-500 outline-none">
                            <option>07:30 - 09:00</option>
                            <option>09:00 - 10:30</option>
                            <option>10:30 - 12:00</option>
                        </select>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full bg-pink-600 text-white font-black py-4 rounded-2xl shadow-lg hover:bg-pink-700 transition-all flex flex-col items-center">
                        <span>CONFIRM BOOKING</span>
                        <span class="text-[9px] font-medium opacity-80 italic">ID Tap Required for Verification</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function selectLab(name) {
        document.getElementById('selected_lab').value = name;
    }
</script>
@endsection