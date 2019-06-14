<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{

    public function store(Project $project){


      // Task::create([
      //   'project_id' => $project->id,
      //   'description' => request('description')
      // ]);

      $project->addTask(
        request()->validate(  ['description' =>['required'] ])
      );
      // $project->addTask(request('description'));
      return back();
    }
// No need for update method since the tasks are now updated using CompletedTasksController
    // public function update(Task $task){
    //
    //   // if (request()->has('completed')){
    //   //   $task->complete();
    //   // } else{
    //   //   $task->incomplete();
    //   // }
    //   //-----------------------------------
    //   //request()->has('completed') ? $task->complete : $task->incomplete;
    //   //-----------------------------------
    //   $method = request()->has('completed') ? 'complete' : 'incomplete';
    //
    //   $task->$method();
    //   //----------------------------------------------
    //   //$task -> complete(request()->has('completed'));
    //   //------------------------------------------------
    //   // $task->update([
    //   //   'completed' => request()->has('completed')
    //   // ]);
    //   // return back();
    // }
}
