@props([
	'type' => 'text',
	'name' => '',
	'label' => '',
	'value' => '',
])
<div {{ $attributes->merge(['class' => 'form-group'] ) }}>
	@error($name)
    	<div class="text-danger">{{$message}}</div>
    	@enderror	
		<label for="{{$name}}"> {{$label}} </label>
		<input type="{{$type}}" 
		name="{{$name}}" 
		value=" {{ $value ? $value : old($name) }}" 
		class="form-control" 
		placeholder="Enter {{$name}}" 
		id="{{$name}}">
	
</div>