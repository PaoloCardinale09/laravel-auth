@extends('layouts.app')

@section('title', $project->name)
    

@section('actions')
<a href="  {{ route('admin.projects.index') }}">
    <div class="btn btn-primary">Go back</div>
</a>
@endsection



@section('content')

<section class="d-flex">
    <div>
        <img src=" {{ $project->image }} " alt="">
    </div>
    <div class="px-5">
        <h3 class="pb-5"> Tecnology:  {{ $project->technology }}  </h3>
        <p> {{ $project->description }} </p>
        <h4> <a href=" {{ $project->url }} ">{{ $project->url }} </a>  </h4>
    </div>
</section>
    
@endsection