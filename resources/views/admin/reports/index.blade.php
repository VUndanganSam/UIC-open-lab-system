@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b-2 border-pink-100 pb-6">
        <div>
            <h1 class="text-3xl font-black text-pink-800 uppercase tracking-tighter">System Reports</h1>
            <p class="text-pink-500 font-bold italic text-sm">Generate and export laboratory analytics</p>
        </div>
        
        <div class="flex space-x-2">
            <button class="flex items-center bg-green-600 text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow-lg hover:bg-green-700 transition transform hover:scale-105">
                <span class="mr-2">📊</span> EXCEL (.XLSX)
            </button>
            <button class="flex items-center bg-red-600 text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow-lg hover:bg-red-700 transition transform hover:scale-105">
                <span class="mr-2">📄</span> PDF DOCUMENT
            </button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-pink-50 flex flex-wrap gap-4 items-center">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-black text-gray-400 uppercase mb-1">Report Type</label>
            <select class="w-full bg-pink-50 border-none rounded-xl py-2 px-4 font-bold text-pink-800 focus:ring-2 focus:ring-pink-500">
                <option>Open Laboratory Usage</option>
                <option>Equipment Borrowing Logs</option>
                <option>Laboratory Bookings</option>
            </select>
        </div>
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-black text-gray-400 uppercase mb-1">Date Range</label>
            <input type="date" class="w-full bg-pink-50 border-none rounded-xl py-2 px-4 font-bold text-pink-800 focus:ring-2 focus:ring-pink-500">
        </div>
        <button class="bg-pink-100 text-pink-600 px-6 py-2 rounded-xl font-black text-xs hover:bg-pink-600 hover:text-white transition self-end h-[40px]">
            FILTER
        </button>
    </div>

    <div class="bg-white rounded-3xl shadow-2xl border border-pink-100 overflow-hidden">
        <div class="p-6 bg-pink-50/50 border-b border-pink-100 flex justify-between items-center">
            <h2 class="font-black text-pink-800 uppercase text-sm tracking-widest">Preview: Open Lab Usage</h2>
            <span class="text-[10px] font-bold text-gray-400 italic font-mono">Total Records: 124</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-white text-[10px] font-black text-gray-400 uppercase tracking-widest border-b">
                    <tr>
                        <th class="px-8 py-4">Student Name</th>
                        <th class="px-8 py-4">Program/Year</th>
                        <th class="px-8 py-4">PC Unit</th>
                        <th class="px-8 py-4">Time In</th>
                        <th class="px-8 py-4">Time Out</th>
                        <th class="px-8 py-4">Total Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    <tr class="hover:bg-pink-50/30 transition">
                        <td class="px-8 py-5 font-bold text-gray-800 underline decoration-pink-200">Solis, Natalio Feliciano M.</td>
                        <td class="px-8 py-5">
                            <span class="text-[10px] font-bold bg-pink-100 text-pink-600 px-2 py-1 rounded">BSIT-3</span>
                        </td>
                        <td class="px-8 py-5 font-mono font-bold text-gray-500">PC-12</td>
                        <td class="px-8 py-5 text-sm">08:30 AM</td>
                        <td class="px-8 py-5 text-sm">10:30 AM</td>
                        <td class="px-8 py-5 text-sm font-black text-pink-600 uppercase">2.0 hrs</td>
                    </tr>
                    <tr class="hover:bg-pink-50/30 transition">
                        <td class="px-8 py-5 font-bold text-gray-800 underline decoration-pink-200">Tan, Cheska Monic L.</td>
                        <td class="px-8 py-5">
                            <span class="text-[10px] font-bold bg-pink-100 text-pink-600 px-2 py-1 rounded">BSCS-4</span>
                        </td>
                        <td class="px-8 py-5 font-mono font-bold text-gray-500">PC-05</td>
                        <td class="px-8 py-5 text-sm">01:15 PM</td>
                        <td class="px-8 py-5 text-sm">03:15 PM</td>
                        <td class="px-8 py-5 text-sm font-black text-pink-600 uppercase">2.0 hrs</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection