<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>
{{-- This is a form which allows users to type and search for specific teams --}}

		<form action="/search" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					placeholder="Search teams by name"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			
		</form>

           </div>
		
    <div class="py-12">
 

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($teams as $team)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
               
                   
                    {{-- This gets each team name and put a 200 character limit on it --}}
                <div>
                <h3 class="titles">name<h3>
                    <p class="mt-2">
                     {{-- This button brings you to the teams show page if there are teams --}}
                     <a href="{{route('user.teams.show', $team) }}">{{ Str::limit($team->name, 200) }}
                    </p>
                </div>

                <div>
                <h3 class="titles">category<h3>
                    <p class="mt-2">
                        {{ Str::limit($team->category) }}
                    </p>
                </div>

                <div>
                <h3 class="titles">description<h3>
                    <p class="mt-2">
                        {{ Str::limit($team->description,250) }}
                    </p>
                </div>
                <div>
                <h3 class="titles">Team image<h3>
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