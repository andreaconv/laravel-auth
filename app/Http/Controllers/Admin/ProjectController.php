<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $projects = Project::paginate(10);
    return view('admin.projects.index', compact('projects'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $title = 'Creazione di un nuovo Progetto';
    $method = 'POST';
    $route = route('admin.project.store');
    return view('admin.projects.create-edit', compact('title', 'method', 'route'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProjectRequest $request)
  {
    $form_data = $request->all();
    $form_data['slug'] = Project::generateSlug($form_data['name']);

    if(array_key_exists('image', $form_data)){

      // prima di salvare l'immagine salvo il nome
      $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
      // salvo l'immagine nella cartella uploads e in $form_data['image_path'] salvo il percorso
      $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
    }

    $new_project = new Project();
    $new_project->fill($form_data);
    $new_project->save();

    return redirect()->route('admin.project.show', $new_project);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Project $project)
  {
    $date = date_create($project->date_creation);
    $data_formatted = date_format($date, 'd/m/Y');
    return view('admin.projects.show', compact('project', 'data_formatted'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Project $project)
  {
    $title = 'Modifica del progetto: ' . $project->name;
    $method = 'PUT';
    $route = route('admin.project.update', $project);
    return view('admin.projects.create-edit', compact('title', 'method', 'route'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
