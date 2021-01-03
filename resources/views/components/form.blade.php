@props([
	'method' => 'POST',
	'action' => '',
])
<form method="{{$method === 'GET' ? 'GET' : 'POST' }}" 
	action="{{$action}}" 
	enctype="multipart/form-data"
>

	{{$attributes}}
	@if(!in_array($method, ['GET','POST']))
		@method($method)
	@endif
     	@csrf
     	{{$slot}}
</form>        