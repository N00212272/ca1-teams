<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owner Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
 
        
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <table class="table table-hover">
                    <tbody>
{{-- 
                        <tr>
                            <td class="font-bold ">ID  </td>
                            <td>{{ $owner->id }}</td>
                        </tr> --}}
                        <tr>
                            <td class="font-bold ">Name:  </td>
                            <td>{{ $owner->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Address:  </td>
                            <td class="px-3 font-bold text-amber-600">unauthorised information</td>
                            {{-- <td>{{ $owner->address }}</td> --}}
                        </tr>


                    </tbody>
                </table>
            </div>
    </div>
</x-app-layout>