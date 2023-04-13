@extends('layouts.app')

@section('title', $project->id ? 'Edit Project' : 'Add new Project')
    
@section('actions')
<a href="  {{ route('admin.projects.index') }}">
    <div class="btn btn-primary">Go back to the list</div>
</a>
@endsection

@section('content')

  @include('layouts.partials.errors')

    <section class="card">
        <div class="card-body py-4">

          @if ($project->id)
            <form action=" {{ route('admin.projects.update', $project)}} " method="POST" class="row">
              @method('PUT')
              
          @else
            <form action=" {{ route('admin.projects.store')}} " method="POST" class="row">
          @endif

            @csrf

            <div class="row">
              <div class="col-2 mb-4">
                <label class="form-label" for="name">Name</label>
              </div>
              <div class="col-10">
                <input class="form-control @error('name')is-invalid @enderror" type="text" name="name" id="name" value=" {{ old('name', $project->name) }} "/>
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-2 mb-4">
                <label class="form-label" for="technology">Technology</label>
              </div>
              <div class="col-10">
                  <input class="form-control @error('technology')is-invalid @enderror" type="text" name="technology" id="technology" value=" {{ old('technology', $project->technology) }} " />
                  @error('technology')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
              
            <div class="row">

              <div class="col-2 mb-4">
                <label class="form-label" for="url">Url</label>
              </div>
              <div class="col-10">
                <input class="form-control @error('url')is-invalid @enderror" type="text" name="url" id="url" value=" {{ old('url', $project->url)}} "/>
                @error('url')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            
            <div class="row">
              <div class="col-2 mb-3">
                <label class="form-label" for="image">Image</label>
              </div>
              <div class="col-8 mb-3">
                <input class="form-control @error('image')is-invalid @enderror" type="text" name="image" id="image" value=" {{ old('image', $project->image) }}"/>
                @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-2 mb-3">
                <img src=" {{ old('image', $project->image) }} " alt="" class="img-fluid">
              </div>
            </div>
            
            <div class="row">

              <div class="col-2 mb-3"> 
                <label class="form-label" for="description">Description</label>
              </div>
              <div class="col-10 mb-3">

                <textarea class="form-control @error('description')is-invalid @enderror" type="text" name="description" id="description"> {{ old('description', $project->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              
            </div>

            <div class="col my-3 ">
              <input class="btn btn-primary" type="submit" value="Save"/>
            </div>
            
          </form>
            
        </div>

    </section>
    
@endsection