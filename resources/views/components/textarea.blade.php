<div>

{{-- keeps the value if there is no error --}}
@props(['disabled' => false, 'field'=>'', 'value'=>''])
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}

    >{{$value}}</textarea>
{{-- for each message which where the field is required or doesnt match the requirements add an error message --}} 
@error($field)

    <div class="text-red-600 text-sm">{{$message}}</div>

@enderror
</div>