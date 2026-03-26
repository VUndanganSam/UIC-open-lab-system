@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-end border-b-2 border-pink-200 pb-4">
        <div>
            <h1 class="text-3xl font-black text-pink-800 uppercase tracking-widest">Equipment Borrowing</h1>
            <p class="text-pink-600 font-semibold italic">Replacing Manual Log-book Form</p>
        </div>
        <button onclick="document.getElementById('borrowModal').classList.remove('hidden')" 
                class="bg-pink-600 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-pink-700 transition-all hover:scale-105 uppercase text-sm tracking-widest">
            + Log New Entry
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-pink-100 p-4 rounded-xl border-l-4 border-pink-500">
            <p class="text-xs font-bold text-pink-700 uppercase">Currently Borrowed</p>
            <p class="text-2xl font-black text-pink-900">08 Items</p>
        </div>
        <div class="bg-white p-4 rounded-xl border border-pink-100 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase">Available Projectors</p>
            <p class="text-2xl font-black text-gray-800">03</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-2xl border border-pink-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-pink-600 text-white text-xs uppercase font-black">
                <tr>
                    <th class="px-6 py-4">Borrower Info</th>
                    <th class="px-6 py-4">Item Details</th>
                    <th class="px-6 py-4">Date Borrowed</th>
                    <th class="px-6 py-4">Date Returned</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Control</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-pink-50">
                <tr class="hover:bg-pink-50/50 transition">
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">Solis, Natalio Feliciano M.</div>
                        <div class="text-[10px] text-pink-500 font-bold uppercase tracking-tight">IT Student • Section 3A</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-medium text-gray-700">HDMI Cable (Vention)</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">Mar 26, 2026</td>
                    <td class="px-6 py-4 text-sm text-gray-400">
                        <span class="italic font-medium text-pink-300">Not yet returned</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-[10px] font-black border border-pink-200 uppercase">In Use</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button class="text-xs font-bold bg-white border-2 border-pink-500 text-pink-600 px-4 py-1.5 rounded-lg hover:bg-pink-600 hover:text-white transition shadow-sm">
                            Return Item
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="borrowModal" class="fixed inset-0 bg-pink-900/60 backdrop-blur-sm hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-3xl w-full max-w-lg shadow-2xl overflow-hidden border-t-8 border-pink-600 animate-in fade-in zoom-in duration-300">
        <div class="p-8">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-2xl font-black text-pink-800 uppercase tracking-tighter">New Borrowing Log</h3>
                <button onclick="document.getElementById('borrowModal').classList.add('hidden')" class="text-pink-300 hover:text-pink-600 text-3xl font-light">&times;</button>
            </div>
            
            <form action="#" method="POST" class="grid grid-cols-2 gap-6">
                @csrf
                <div class="col-span-2">
                    <label class="block text-[10px] font-black text-pink-700 uppercase mb-1 tracking-widest">Borrower Name (Last, First, M.I.)</label>
                    <input type="text" name="borrower_name" placeholder="Ex: Solis, Natalio Feliciano M." required
                           class="w-full p-3 border-2 border-pink-50 rounded-xl focus:border-pink-500 outline-none bg-pink-50/50">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-pink-700 uppercase mb-1 tracking-widest">Role</label>
                    <select name="borrower_role" class="w-full p-3 border-2 border-pink-50 rounded-xl focus:border-pink-500 outline-none bg-pink-50/50">
                        <option>IT Student</option>
                        <option>CS Student</option>
                        <option>Professor</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-pink-700 uppercase mb-1 tracking-widest">Course/Section</label>
                    <input type="text" name="course_section" placeholder="Ex: IT-3A" 
                           class="w-full p-3 border-2 border-pink-50 rounded-xl focus:border-pink-500 outline-none bg-pink-50/50">
                </div>

                <div class="col-span-2">
                    <label class="block text-[10px] font-black text-pink-700 uppercase mb-1 tracking-widest">Equipment Item</label>
                    <select name="equipment_id" class="w-full p-3 border-2 border-pink-50 rounded-xl focus:border-pink-500 outline-none bg-pink-50/50">
                        <option>Projector (Epson)</option>
                        <option>Extension Cord (5m)</option>
                        <option>HDMI Cable (Vention)</option>
                    </select>
                </div>

                <div class="col-span-2 pt-4">
                    <button type="submit" class="w-full bg-pink-600 text-white font-black py-4 rounded-2xl shadow-xl hover:bg-pink-700 transition-all hover:shadow-pink-200">
                        SAVE LOG TO SYSTEM
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection