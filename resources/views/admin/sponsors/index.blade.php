<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All sponsors') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.sponsors.create') }}" class="btn-link btn-lg mb-2">Add a Sponsor</a>
            @forelse ($sponsors as $sponsor)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.sponsors.show', $sponsor) }}"> <strong> Sponsor ID </strong> {{ $sponsor->id }}</a>
                    </h2>
                    <p class="mt-2">

                        <h3> <strong> sponsor Name </strong>
                        {{$sponsor->name}} </h3>

                    </p>

                </div>
            @empty
            <p>No sponsor found</p>
            @endforelse
        </div>
    </div>
</x-app-layout>