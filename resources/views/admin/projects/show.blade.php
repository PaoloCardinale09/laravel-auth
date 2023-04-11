@extends('layouts.app')

@section('title', $project->name)
    



@section('content')

<section class="d-flex">
    <div>
        <img src=" {{ $project->image }} " alt="">
    </div>
    <div class="px-5">
        <h2 class="pb-5"> Tecnology:  {{ $project->technology }}  </h2>
        <h2> <a href=" {{ $project->url }} ">{{ $project->url }} </a>  </h2>
    </div>
    
</section>
    
@endsection