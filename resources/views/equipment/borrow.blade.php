@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-black text-pink-800 tracking-tight">Equipment Tracking</h2>
            <p class="text-pink-600 font-medium">Managing UIC Laboratory Resources</p>
        </div>
        <button onclick="document.getElementById('borrowModal').classList.remove('hidden')" 
                class="bg-pink-600 text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:bg-pink-700 transition transform hover:scale-105">
            + New Transaction
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-pink-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-pink-600 text-white uppercase text-xs font-bold">
                    <tr>
                        <th class="px-6 py-4">Borrower Details</th>
                        <th class="px-6 py-4">Equipment</th>
                        <th class="px-6 py-4">Date Borrowed</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    <tr class="hover:bg-pink-50 transition">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900 text-lg">Solis, Natalio Feliciano</div>
                            <div class="text-pink-500 text-xs font-semibold uppercase">IT Student - 3A</div>
                        </td>
                        <td class="px-6 py-4 text-gray-700 font-medium">Arduino Uno Kit #05</td>
                        <td class="px-6 py-4 text-gray-500 italic">March 26, 2026</td>
                        <td class="px-6 py-4">
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-black border border-yellow-200">BORROWED</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="bg-white border-2 border-pink-500 text-pink-600 px-4 py-1 rounded-lg font-bold hover:bg-pink-500 hover:text-white transition">
                                Mark Returned
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-pink-50 transition">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900 text-lg">Tan, Cheska Monic</div>
                            <div class="text-pink-500 text-xs font-semibold uppercase">CS Student - 4B</div>
                        </td>
                        <td class="px-6 py-4 text-gray-700 font-medium">Projector (EPSON)</td>
                        <td class="px-6 py-4 text-gray-500 italic">March 25, 2026</td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-black border border-green-200">RETURNED</span>
                        </td>
                        <td class="px-6 py-4 text-center text-gray-400 italic text-sm">Transaction Closed</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="borrowModal" class="fixed inset-0 bg-pink-900 bg-opacity-50 hidden flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl border-t-8 border-pink-600">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-pink-800">New Borrow Request</h3>
                <button onclick="document.getElementById('borrowModal').classList.add('hidden')" class="text-gray-400 hover:text-pink-600 text-2xl">&times;</button>
            </div>
            
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-pink-700 uppercase mb-1">Full Name</label>
                    <input type="text" name="borrower_name" placeholder="Lastname, Firstname" required
                           class="w-full p-3 border-2 border-pink-50 rounded-xl focus:border-pink-500 outline-none transition bg-pink-50/30">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-pink-700 uppercase mb-1">Role</label>
                        <select name="borrower_role" class="w-full p-3 border-2 border-pink-50 rounded-xl focus:border-pink-500 outline-none bg-pink-50/30">
                            <option>Student</option>
                            <option>Professor</option>
                            <option>Staff</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-pink-700 uppercase mb-1">Section</label>
                        <input type="text" name="course_section" placeholder="e.g. IT-3A" 
                               class="w-full p-3 border-2 border-pink-50 rounded-xl focus:border-pink-500 outline-none bg-pink-50/30">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-pink-700 uppercase mb-1">Select Equipment</label>
                    <select name="equipment_id" class="w-full p-3 border-2 border-pink-50 rounded-xl focus:border-pink-500 outline-none bg-pink-50/30">
                        <option>Arduino Kit</option>
                        <option>HDMI Cable</option>
                        <option>Extension Cord</option>
                        <option>Projector</option>
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-pink-600 text-white font-bold py-4 rounded-xl shadow-lg hover:bg-pink-700 transition">
                        Confirm & Save Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection