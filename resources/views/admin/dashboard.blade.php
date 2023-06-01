@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')


<!-- admin.dashboard.blade.php -->

<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Analytics </h2>

<div class="user-count">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-primary-700 text-white p-4 rounded-lg">
            <p>Companies</p>
            <p class="text-lg">{{ $companyCount }}</p>
        </div>
        <div class="bg-primary-700 text-white p-4 rounded-lg">
            <p>Students</p>
            <p class="text-lg">{{ $studentCount }}</p>
        </div>
        <div class="bg-primary-700 text-white p-4 rounded-lg">
            <p>Supervisors</p>
            <p class="text-lg">{{ $supervisorCount }}</p>
        </div>
        <div class="bg-primary-700 text-white p-4 rounded-lg">
            <p>Professors</p>
            <p class="text-lg">{{ $professorCount }}</p>
        </div>
    </div>
</div>







@endsection