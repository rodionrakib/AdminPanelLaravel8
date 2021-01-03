<x-layout>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Post</h1>
    <x-form method="POST" action="{{route('admin.posts.store')}}" >
		<x-row>
			<x-backend.input-field label="Title" name="title" class="col-md-6" > </x-input>
        		<x-backend.input-field type=file label="Cover" name="cover" class="col-md-6" > </x-input>
		</x-row>	
        	<x-backend.input-textarea label="Post Content" name="body" > </x-input-textarea>
        	<button type="submit" class="btn btn-primary" name="action" value="save">Save</button>
        	<button type="submit" class="btn btn-primary" name="action" value="publish">Publish</button> 
    </x-form>
     
</x-layout>
