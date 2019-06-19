<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
// use App\Services\Twitter;
use App\Events\ProjectCreated;//needed

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
        //---------------------------------------------

        // auth()->id() -> returns user id
        // auth()->user() -> returns user Name
        // auth()->check() -> returns boolean
        // auth()->guest() -> returns if user is guest

        //Auth'd LoCs below
        //-----------------------------------------------
        //$projects = auth()->user()->projects;

        //---the above is more readable than the below---

        //$projects = Project::where('owner_id',auth()->id())->get();

        return view('project.index',[
          'projects' => auth()->user()->projects
        ]);//most readable out of all the auth'd LoCs

        //----------------------------------------------

        // cache()->rememberForever('stats',function(){
        //   return ['projects'=>50,'names'=> 'many'];
        // });

        /**
        *tinker loc-
        *  cache()->get('stats')['projects' or 'names']
        */


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
    public function store()
    {
      $this->validateRequest();

      $project = Project::create([
        'title' => request('title'),
        'description' => request('description'),
        'owner_id' => auth()->id(),
        //'owner_name' =>auth()->user()
      ]);

      //dont need the line below anymore since dispatchEvents is now here
      // event(new ProjectCreated($project));

      flash('Project Created');

      return redirect('/projects/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)//, Twitter $twitter)
    {
        // $twitter = app('twitter');
        // dd($twitter);

        // abort_if($project->owner_id !== auth()->id(),403);
        //abort_unless();
        //$this->authorize('view',$project);

        return view('project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
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
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

      $attributes = $this->validateRequest();

      $project->update(request(['title','description']));
      // dd(request()->all());
      return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      // $project->delete();
      // return redirect('/projects');
    }

    public function validateRequest(){
      return request()->validate([
        'title' => ['required', 'min:3'],
        'description' => ['required', 'min:3']
      ]);
    }
}
