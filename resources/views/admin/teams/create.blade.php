<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- Name input --}}
                    <x-textarea
                        type="text"
                        name="name"
                        {{-- FIELD connects to the error messages --}}
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        {{-- Value keeps the old value if an error occurs if was correct --}}
                        :value="@old('name')"></x-textarea>
                     
                    {{-- category input --}}
                    <x-textarea
                        type="text"
                        name="category"
                        field="category"
                        placeholder="category"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('category')"></x-textarea>
                      <x-textarea
                        type="text"
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Start typing here..."
                        class="w-full mt-6"
                        :value="@old('description')"></x-textarea>
                        <input
                        type="file"
                        name="team_image"
                        placeholder="Team Cover"
                        class="w-full mt-6"
                        field="team_image"
                        >
                    <div class="form-group">
                        <label for="owner">owner</label>
                        <select name="owner_id">
                        @foreach ($owners as $owner)
                        <option value="{{$owner->id}}" {{(old('owner_id') == $owner->id) ? "selected" : ""}}>
                        {{$owner->name}}
                        </option>
                        @endforeach
                        </select>
                    </div>
                    <x-primary-button class="mt-6">Save Team</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>