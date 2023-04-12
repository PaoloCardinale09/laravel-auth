@extends('layouts.app')


@section('title', 'Projects')

@section('actions')
<a href="  {{ route('admin.projects.create') }}">
    <div class="btn btn-primary">Add new Project</div>
</a>
@endsection
    

@section('content')

<section class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Tecnology</th>
              <th scope="col">Actions</th>
         
            </tr>
          </thead>
          <tbody>
            @forelse ($projects as $project)
                
            <tr>
                <th scope="row"> {{ $project->id }} </th>
                <td>{{ $project->name }}</td>
                <td>{{ $project->technology }}</td>
                <td>
                    <a href=" {{ route('admin.projects.show', $project) }} "><i class="bi bi-eye"></i></a>
                    <a href=" {{ route('admin.projects.edit', $project) }} "><i class="bi bi-pencil"></i></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $project->id }}">
                      <i class="bi bi-trash"></i>             
                    </button>
                </td>
                
            </tr>
            @empty
                
            @endforelse
            
          </tbody>
      </table>

      {{ $projects->links() }}
</section>


@foreach ($projects as $project)
  <!-- Modal -->
  <div class="modal fade" id="delete-modal-{{ $project->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $project->id }}-label"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="delete-modal-{{ $project->id }}-label">Conferma eliminazione</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
          Sei sicuro di voler eliminare la  {{ $project->name }} N° {{ $project->number }} con ID
          {{ $project->id }}? <br>
          L'operazione non è reversibile
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

          <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
    
@endsection