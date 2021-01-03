<x-layout>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Post</h1>
    	<x-form method="PATCH" action="{{route('admin.posts.update',['post' => $post->id])}}" >
	  <x-backend.input-field label="Title" name="title"  value="{{$post->title}}"> </x-input>
	  <x-row>
	  	<x-backend.input-field type=file label="Cover" name="cover" class='col-md-6' > </x-input>
	  	<x-thumb src="{{$post->getThumb()}}"></x-thumb>
	  </x-row>	
	  
	  
	  <x-backend.input-textarea label="Post Content" name="body"> {{$post->body}}</x-input-textarea>
	  <button type="submit" class="btn btn-primary" name="action" >Update</button> 
    	</x-form>
     
</x-layout>
