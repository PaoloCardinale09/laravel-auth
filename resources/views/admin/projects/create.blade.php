@extends('layouts.app')

@section('title', 'Create new Project')
    
@section('actions')
<a href="  {{ route('admin.projects.index') }}">
    <div class="btn btn-primary">Go back to the list</div>
</a>
@endsection

@section('content')
    <section class="card">
        <div class="card-body">
          <form action=" {{ route('admin.projects.store')}} " method="POST" class="row">
            @csrf
            <div class="col-6 mb-3">
              <label class="form-label" for="name">Name</label>
              <input class="form-control" type="text" name="name" id="name"/>
            </div>

            <div class="col-6 mb-3">
              <label class="form-label" for="technology">Technology</label>
              <input class="form-control" type="text" name="technology" id="technology" />
            </div>

            
            <div class="col-6 mb-3">
              <label class="form-label" for="url">Url</label>
              <input class="form-control" type="text" name="url" id="url" />
            </div>
            
            <div class="col-6 mb-3">
              <label class="form-label" for="image">Image</label>
              <input class="form-control" type="text" name="image" id="image" value="https://picsum.photos/400/300"/>
            </div>
            
            <div class="col-12 mb-3"> 
              <label class="form-label" for="description">Description</label>
              <textarea class="form-control" type="text" name="description" id="description"> </textarea>
            </div>

            <div class="col mb-3 ">
              <input class="btn btn-primary" type="submit" value="Save"/>
            </div>
            
          </form>
            
        </div>

    </section>
    
@endsection