@extends('layouts.prof')

@section('title', 'Dashboard')

@section('content')


<!-- admin.dashboard.blade.php -->

<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Analytics for {{$group}}</h2>

<div class="user-count">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-orange-700 text-white p-4 rounded-lg">
            <p>Students</p>
            <p class="text-lg">0</p>
        </div>
        <div class="bg-orange-700 text-white p-4 rounded-lg">
            <p>planned soutnances</p>
            <p class="text-lg">0</p>
        </div>
        <div class="bg-orange-700 text-white p-4 rounded-lg">
            <p>Future soutnances</p>
            <p class="text-lg">0</p>
        </div>
        <div class="bg-orange-700 text-white p-4 rounded-lg">
            <p>done soutnances</p>
            <p class="text-lg">0</p>
        </div>
    </div>
</div>







@endsection