<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('sponsor Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        

            <div class="flex">

                <a href="{{ route('admin.sponsors.edit', $sponsor) }}" class="btn-link ml-auto">Edit</a>

                <form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <table class="table table-hover">
                    <tbody>

                        <tr>
                            <td class="font-bold ">ID:  </td>
                            <td>{{ $sponsor->id }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Name:  </td>
                            <td>{{ $sponsor->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Address:  </td>
                            <td>{{ $sponsor->address }}</td>
                        </tr>
                        
                         <tr>
                            <td class="font-bold ">bio:  </td>
                            <td>{{ $sponsor->bio }}</td>
                        </tr>
       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>