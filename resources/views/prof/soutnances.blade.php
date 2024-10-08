@extends('layouts.prof')

@section('title', 'soutnances')

@section('content')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            {{-- <div class="w-full md:w-1/2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">All registerd soutnances</h2>
            </div> --}}
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <form action="{{route('soutnances.store')}}" method="POST">
                    @csrf
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                        <input type="number" hidden value="{{$profId}}" name="prof_id" placeholder="prof id">
                        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" name="student_id" placeholder="student id">
                        <input type="datetime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" name="date_soutnance" placeholder="2023-05-28 19:52:00">

                        <button type="button" class="flex items-center justify-center text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add soutnance
                        </button>
                    </div>
                </form>
            </div>
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Student ID</th>
                            <th scope="col" class="px-4 py-3">Date</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($soutnances as $soutnance)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">{{$soutnance->student_id}}</td>
                            <td class="px-4 py-3">{{$soutnance->date_soutnance}}</td>
                            <td class="px-4 py-3">
                                @if ($soutnance->grades)
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Passed</span>
                                @else
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <a href="{{route('soutnances.edit', $soutnance->id)}}">edit</a>
                                    <form action="{{route('soutnances.destroy', $soutnance->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>


            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                
                
            </nav>
        </div>
    </div>
    </section>
@endsection