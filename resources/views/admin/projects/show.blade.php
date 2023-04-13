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
        <h3 class="pb-3 text-dark"> Used technologies: <br> <i class="text-muted">
            {{ $project->technology }}  </i></h3>
            <hr>
        <p> {{ $project->description }} </p>
        <hr>
        <h4> <a href=" {{ $project->url }} ">{{ $project->url }} </a>  </h4>
    </div>
</section>
    
@endsection