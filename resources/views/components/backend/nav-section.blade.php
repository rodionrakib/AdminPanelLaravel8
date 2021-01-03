@php 
  $loweCaseModel = strtolower($model);
  $createRoute = route('admin.'.$loweCaseModel.'s.create');
  $indexRoute = route('admin.'.$loweCaseModel.'s.index');
@endphp
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$model}}" aria-expanded="true" aria-controls="collapse{{$model}}">
      <i class="fas fa-fw fa-wrench"></i>
      <span>{{$model}}s</span>
    </a>
    <div id="collapse{{$model}}" class="collapse" aria-labelledby="heading{{$model}}" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Manage {{$model}}s:</h6>
        <a class="collapse-item" href="{{$createRoute}}">Create {{$model}}</a>
        <a class="collapse-item" href="{{$indexRoute}}">List {{$model}}</a>
      </div>
    </div>
</li>