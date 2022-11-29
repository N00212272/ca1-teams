<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All owners') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.owners.create') }}" class="btn-link btn-lg mb-2">Add a Owner</a>
            @forelse ($owners as $owner)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.owners.show', $owner) }}"> <strong> Owner ID </strong> {{ $owner->id }}</a>
                    </h2>
                    <p class="mt-2">

                        <h3> <strong> Owner Name </strong>
                        {{$owner->name}} </h3>

                    </p>

                </div>
            @empty
            <p>No owners found</p>
            @endforelse
        </div>
    </div>
</x-app-layout>