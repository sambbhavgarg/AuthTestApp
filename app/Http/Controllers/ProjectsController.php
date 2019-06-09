<?php

namespace AuthTestApp\Http\Controllers;

use AuthTestApp\Project;
use Illuminate\Http\Request;
use AuthTestApp\Services\Twitter;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //$attributes['owner_id'] = auth()->id();

    public function __construct(){

      $this->middleware('auth');//adds to all.           add ---> ->except(['index'])
//                                                                 ->only(['index,store, etc'])
    }

    public function index()

    {
        // auth()->id() -> returns user id
        // auth()->user() -> returns user Name
        // auth()->check() -> returns boolean
        // auth()->guest() -> returns if user is guest

        $projects = Project::where('owner_id',auth()->id())->get();
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate([
      'title'=>['required'],
      'description'=>['required']
    ]);

      Project::create([
        'title' => request('title'),
        'description' => request('description'),
        'owner_id' => auth()->id()
      ]);

      return redirect('/projects/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \AuthTestApp\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Twitter $twitter)
    {
        // $twitter = app('twitter');
        // dd($twitter);
        abort_if($project->owner_id !== auth()->id(),403);
        return view('project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \AuthTestApp\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \AuthTestApp\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
      $project->update(request(['title','description']));
      // dd(request()->all());
      return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AuthTestApp\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      // $project->delete();
      // return redirect('/projects');
    }
}
