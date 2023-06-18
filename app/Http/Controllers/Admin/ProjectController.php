<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

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
    return view('admin.projects.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $form_data = $request->all();

    $new_project = new Project();
    $new_project->name = $form_data['name'];
    $new_project->slug = Project::generateSlug($form_data['name']);
    $new_project->description = $form_data['description'];
    $new_project->category = $form_data['category'];
    $new_project->date_creation = $form_data['date_creation'];

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
  public function edit($id)
  {
      //
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
