<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>query</title>

         {{-- Styles --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
           
          
           

              	@if(isset($details))
                <div class=" container ml-10 query">
			<h2 class="searchQ"> The Search results for your query <b> {{ $query }} </b> are :</h2>
			<table class="table table-striped container query">
				<thead>
					<tr>
						<th>Team Name</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($details as $team)
					<tr>
						<td class ="btn-link mb-2">
                         <a href="{{route('teams.show', $team) }}">{{$team->name}}
                         </td>
					</tr>
                
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<a href="{{route('teams.index')}}"><p class="red ">{{ $message }}</p>
			@endif
            </div>

        </div>
    </body>
</html>
