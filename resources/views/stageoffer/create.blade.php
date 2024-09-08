@extends('layouts.supervisor')

@section('title', 'Offer')

@section('content')

@if (!$offer)
    
<section class="bg-white dark:bg-gray-900">
    <div class="py-4 px-2 mx-8 lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">post a stage offer</h2>
        <form action="{{route('stageoffer.store')}}" method="POST">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="offer title" required>
                </div>

                <div>
                    <input type="text" hidden name="supervisor_id" value="{{$supervisorId}}">
                </div>


                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="body" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Offer description here"></textarea>
                </div>
            </div>

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-orange-700 rounded-lg focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-900 hover:bg-orange-800">
                post offer
            </button>
        </form>
    </div>
  </section>
    
@else
<section class="bg-white dark:bg-gray-900">
    <div class="py-4 px-2 mx-8 lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">your offer</h2>
        <form action="{{route('stageoffer.destroy', $offer->id)}}" method="POST" >
            @method('DELETE')
            @csrf

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" readonly value="{{$offer->title}}" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="offer title" required>
                </div>

                <div>
                    <input type="text" hidden name="supervisor_id" value="{{$supervisorId}}">
                </div>


                <div class="sm:col-span-2">
                    <label for="description" readonly class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <p class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    {{$offer->body}}
                </p>
                </div>
            </div>

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-orange-700 rounded-lg focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-900 hover:bg-orange-800">
                delete offer
            </button>
        </form>
        @forelse ($reqs as $req)
            <div class="pt-5" >
                <p class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">

                @if($req->student)
                {{ $req->student->user->name }} <br>
                {{ $req->student->user->email }} <br>
                @endif
                <div class="mt-2">
                <a href="{{ route('stagereq.downloadCV', ['studentId' => $req->student_id]) }}" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-orange-700 rounded-lg focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-900 hover:bg-orange-800">
                    Download CV
                </a>

                <form action="{{route('accept.stage')}}" method="POST">
                    @method('PUT')
                    @csrf

                    <input type="text" name="stagereq" value="{{$req->id}}" hidden>
                    <input type="text" name="offerId" value="{{$offer->id}}" hidden>
                    <input type="text" name="studentId" value="{{$req->student_id}}" hidden>
                    <input type="text" name="supervisorId" value="{{$supervisorId}}" hidden>

                    <input type="submit" value="accept request" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-orange-700 rounded-lg focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-900 hover:bg-orange-800">
                </form>
                </div>
            </p>
            </div>
        @empty
        <div class="mt-5">
            <p class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
            no requests applied to this offer
            </p>
        </div>
            
        @endforelse
    </div>
  </section>
@endif
@endsection