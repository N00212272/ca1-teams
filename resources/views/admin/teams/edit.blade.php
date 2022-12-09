<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route('admin.teams.update', $team) }}" method="post" enctype="multipart/form-data">
                @method('put')
                    @csrf
                    {{-- Name input --}}
                      {{-- FIELD connects to the error messages --}}
                     <x-textarea
                        type="text"
                        field="name"
                        name="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name', $team->name)"></x-textarea>
                     
                    {{-- category input --}}
                     <x-textarea
                        type="text"
                        name="category"
                        field="category"
                        placeholder="category"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('category', $team->category)"></x-textarea>
                      <x-textarea
                        type="text"
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Start typing here..."
                        class="w-full mt-6"
                        :value="@old('description', $team->description)"></x-textarea>

                            {{-- Doesnt work --}}
                        <input
                        type="file"
                        name="team_image"
                        placeholder="Team Cover"
                        class="w-full mt-6"
                        field="team_image"
                         :value="@old('team_image', $team->team_image)"
                        >

                        <div class="form-group">
                        <label for="owner">owner</label>
                        <select name="owner_id">
                        @foreach ($owners as $owner)
                        {{-- if statement shows the previous owner chosen --}}
                        @if($owner->id == $team->owner->id)
                        <option value="{{$owner->id}}" selected >
                        {{$owner->name}}
                        </option>
                        @else
                        <option value="{{$owner->id}}">
                        {{$owner->name}}
                        </option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                    
                      <div class="form-group">
                        <label for="sponsors"> <strong> Sponsors</strong> <br> </label>
                        {{--Gets all the sponsers into an array with checkbox  --}}
                        @foreach ($sponsors as $sponsor)
                         <input type="checkbox" name="sponsors[]" value="{{$sponsor->id}}" 
                         {{-- In this array the sponsor id of this team = to the sponsor id in the pivot table is checked with the name with the sponser printed --}}
                          {{ in_array($sponsor->id,$sponsorIds) ? 'checked' : '' }}>
                           {{$sponsor->name}}                       
                        @endforeach
                    </div>

                    <x-primary-button class="mt-6">Save Team</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>