<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create sponsor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route('admin.sponsors.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- Name input --}}
                    <x-textarea
                        type="text"
                        name="name"
                        field="name"
                        placeholder="name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-textarea>
                        
                        <x-textarea
                        type="text"
                        name="address"
                        rows="5"
                        field="address"
                        placeholder="Start typing here..."
                        class="w-full mt-6"
                        :value="@old('address')"></x-textarea>

                        <x-textarea
                        type="text"
                        name="bio"
                        rows="10"
                        field="bio"
                        placeholder="Start typing here..."
                        class="w-full mt-6"
                        :value="@old('bio')"></x-textarea>
                        
                    
                    <x-primary-button class="mt-6">Save Sponsor</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>