 <div class="form-group">
 	@error($name)
    	<div class="text-danger">{{$message}}</div>
    	@enderror
      <label for="{{$name}}"> {{$label}} </label> </br>
      <textarea name="{{$name}}" id="summernote1" cols="120" rows="20">{{$slot}}</textarea>
  </div>