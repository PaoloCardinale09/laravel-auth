<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project;
        return view('admin.projects.form', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'technology' => 'required|string|max:50',
            'description' => 'required|string|max:1000',
            'url'=> 'url|max:100',
            'image' => 'string'
        ],
        [
            'name.required' => 'Il nome del progetto è obbligatorio',  
            'name.max' => 'Il nome può avere massimo 50 caratteri',   
            'technology.required' => 'La tecnologia utilizzata è obbligatoria',    
            'technology.max' => 'Le tecnologie utilizzate possono avere massimo 50 caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La descrizione può avere un massimo di 1000 caratteri',
            'url.url'=> 'Deve essere un link valido',
            'url.max'=> 'L\' URL può avere un massimo di 100 caratteri'
        ]);

        $project = new Project;
        $project->fill($request->all());
        $project->save();
        return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->update($data);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}