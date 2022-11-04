<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route('teams.update', $team) }}" method="post" enctype="multipart/form-data">
                @method('put')
                    @csrf
                    {{-- Name input --}}
                    <x-text-input
                        type="text"
                        name="name"
                        {{-- FIELD connects to the error messages --}}
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        {{-- Value keeps the old value if an error occurs or if the keeps the old value from the database--}}
                        :value="@old('name', $team->name)"></x-text-input>
                     
                    {{-- category input --}}
                    <x-textarea
                        type="text"
                        name="category"
                        field="category"
                        placeholder="category"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('category', $team->category)"></x-text-input>
                      <x-textarea
                        type="text"
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Start typing here..."
                        class="w-full mt-6"
                        :value="@old('description', $team->description)"></x-textarea>

                        <input
                        type="file"
                        name="team_image"
                        placeholder="Team Cover"
                        class="w-full mt-6"
                        field="team_image"
                         :value="@old('team_image', $team->team_image)"
                        >

                    <x-primary-button class="mt-6">Save Team</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>