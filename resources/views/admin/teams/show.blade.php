<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
                <div class="flex">
                    {{-- brings in the updated and created at from db --}}
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $team->created_at->diffForHumans() }}
                </p>
              
                  <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $team->updated_at->diffForHumans() }}
                </p>
               {{-- button to bring you to edit page --}}
                  <a href="{{route ('admin.teams.edit', $team )}}" class="btn-link ml-auto">Edit Note</a>
               
                 {{-- deletes the team --}}
                 <form action="{{ route('admin.teams.destroy',$team) }}" method="post">
                  {{-- laravel function to delete form --}}
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete')">Delete</button>
                     </form>
               </div>
                    <p class="mt-2">
                   {{ Str::limit($team->name, 200) }}
                    </p>
             
                     <p class="mt-2 whitespace-pre-wrap">{{($team->category) }}</p>
                
                {{-- this class wraps the text to make it look nicer --}}
                    <p class="mt-2 whitespace-pre-wrap">{{ $team->description }} </p>

                <div class="px-12">
                 <img src="{{ asset('storage/images/' . $team->team_image) }}" width="150" >  
                </div>
                      <p class="mt-2 whitespace-pre-wrap">{{ $team->owner->name }} </p>
                       

                    <p class="mt-2 whitespace-pre-wrap">{{ $team->owner->address  }} </p>

              
            
         
        </div>
    </div>
</x-app-layout>