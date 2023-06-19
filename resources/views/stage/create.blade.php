@extends('layouts.supervisor')

@section('title', 'Offer')

@section('content')


<div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
    <h1 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">stage</h1>
    <form action="{{route('store.stage')}}" method="POST">
        @csrf
    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

            <input type="text" value="{{$studentId}}"" name="student_id" hidden>
            <input type="text" value="{{$supervisorId}}"" name="supervisor_id" hidden>

            <input type="datetime" name="start" placeholder="start date : 2023-05-28 19:52:00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
            <input type="datetime" name="end" placeholder="end date : 2023-05-28 19:52:00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">

            <input type="submit" value="add stage" class="flex items-center justify-center text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">

            
        </div>
    </form>
</div>
@endsection