<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Owner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route('admin.owners.update', $owner) }}" method="post" enctype="multipart/form-data">
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
                        :value="@old('name', $owner->name)"></x-textarea>
                     
                       <x-textarea
                        type="text"
                        name="address"
                        rows="10"
                        field="address"
                        placeholder="Start typing here..."
                        class="w-full mt-6"
                        :value="@old('address', $owner->address)"></x-textarea>

                    
                    <x-primary-button class="mt-6">Save Owner</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>