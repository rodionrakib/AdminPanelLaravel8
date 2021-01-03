<x-layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Post Index</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Thumb</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Thumb</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td> <img src="{{$post->getThumb()}}" 
                                style="width: 200px; height: 200px"  
                                class="img-thumbnail" >  
                            </td>

                            <td>{{$post->slug}}</td>
                            <td>{{$post->status()}}</td>
                            <td>
                                <x-backend.edit-link link="{{route('admin.posts.edit',['post' => $post->id])}}" > </x-edit-link>
                                <x-backend.delete-form action="{{route('admin.posts.destroy',['post' => $post->id])}}" > </x-backend.delete-form>
                                                                 
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsectoin