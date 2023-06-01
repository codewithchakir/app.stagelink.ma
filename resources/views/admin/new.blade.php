@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<section class="bg-white dark:bg-gray-900">
    <div class="grid lg:h-screen lg:grid-cols-2">
      <div class="flex justify-center items-center py-6 px-4 bg-primary-600 lg:py-0 sm:px-0">
      </div> 


        <div class="flex justify-center items-center py-6 px-4 lg:py-0 sm:px-0">


            <form class="space-y-4 max-w-md md:space-y-6 xl:max-w-xl" method="POST" action="{{ route('register') }}">
                @csrf


                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Add a new admin</h2>
                

                <div class="flex items-center">
                    {{-- <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div>
                    <div class="px-5 text-center text-gray-500 dark:text-gray-400">or</div>
                    <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div> --}}
                </div>

                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="John Doe" required autofocus autocomplete="name">
                  </div>


                <!-- Email -->
                <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin email</label>
                  <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="example@example.com" required autofocus autocomplete="email">
                </div>

                <div>
                  <input type="text" name="type" value="admin" hidden >
                </div>
                
                <!-- password -->
                <div>
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin password</label>
                  <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                </div>

                <!-- Confirm password -->
                <div>
                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm password</label>
                    <input type="password" name="password_confirmation" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                  </div>




                <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-700">Create admin</button>
                
            </form>


        </div> 
        
                    
    </div>
  </section>

  @endsection