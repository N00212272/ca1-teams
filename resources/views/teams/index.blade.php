<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- This button brings you to the teams create page where a team is created --}}
            <a href="{{ route('teams.create') }}" class="btn-link btn-lg mb-2">+ New Team</a>
            @forelse ($teams as $team)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                {{-- This button brings you to the teams show page if there are teams --}}
                    {{-- <h2 class="font-bold text-2xl">
                        <a href="{{ route('teams.show', $team->uuid) }}">{{ $team->title }}</a>
                    </h2> --}}
                    {{-- This gets each team name and put a 200 character limit on it --}}
                <div>
                    <p class="mt-2">
                     <a href="{{route('teams.show', $team->id) }}">{{ Str::limit($team->name, 200) }}
                    </p>
                </div>

                <div>
                    <p class="mt-2">
                        {{ Str::limit($team->category) }}
                    </p>
                </div>
                <div>
                    <p class="mt-2">
                        {{ Str::limit($team->description,250) }}
                    </p>
                </div>
                <div>
                    <img src="{{ asset('storage/images/' . $team->team_image) }}" width="150">  
                </div>

                    <span class="block mt-4 text-sm opacity-70">{{ $team->updated_at->diffForHumans() }}</span>
                </div>
                {{-- If there are no teams and its 'empty' it will show this message --}}
            @empty
            <p>You have no teams are in this league yet.</p>
            @endforelse
            {{-- Different links to the different teams (if there is any) --}}
            {{$teams->links()}}
        </div>
    </div>
</x-app-layout>