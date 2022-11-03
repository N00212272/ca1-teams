
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created: </strong> {{ $team->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated at: </strong> {{ $team->updated_at->diffForHumans() }}
                </p>
                <a href="{{ route('teams.edit', $team) }}" class="btn-link ml-auto">Edit Team</a>
                <form action="{{ route('teams.destroy', $team) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to delete this note?')">Delete Note</button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $team->title }}
                </h2>
                <p class="mt-6 whitespace-">{{$team->text}}</p>
            </div>
            <tr>
            <td rowspan="6">
                <img src="{{('storage/images/' . $team->team_image) }}" width="150" />
            </td>
            <tr>
        </div>
    </div>
</x-app-layout>