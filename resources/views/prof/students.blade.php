@extends('layouts.prof')

@section('title', 'students')

@section('content')

<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">All students from group : {{$group}}</h2>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    
                </div>
            </div>
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Full name</th>
                            <th scope="col" class="px-4 py-3">Email</th>

                            <th scope="col" class="px-4 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$user->name}}</th>
                            <td class="px-4 py-3">{{$user->email}}</td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <a href="{{route('companies.edit', $user->id)}}">edit</a>
                                    <form action="{{route('companies.destroy', $user->id)}}" method="post">
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
