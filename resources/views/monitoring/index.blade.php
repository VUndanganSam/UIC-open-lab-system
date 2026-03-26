@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border-t-8 border-pink-500">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Student Entry Scan</h2>
    <form action="#" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Student ID (Scan/Tap)</label>
            <input type="text" name="student_id" autofocus class="mt-1 block w-full p-4 border-2 border-pink-100 rounded-lg focus:border-pink-500 outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Assigned Computer Unit</label>
            <input type="text" name="computer_unit" placeholder="e.g., PC-01" class="mt-1 block w-full p-4 border-2 border-pink-100 rounded-lg">
        </div>
        <button type="submit" class="w-full bg-pink-500 text-white font-bold py-4 rounded-lg hover:bg-pink-600 shadow-md">Record Time-In</button>
    </form>
</div>
@endsection