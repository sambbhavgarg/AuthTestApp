<?php

namespace AuthTestApp;

use AuthTestApp\Task;

use AuthTestApp\Events\ProjectCreated;
// use AuthTestApp\Mail\ProjectCreated;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents =[
      'created' => ProjectCreated::class
    ];
    //
    // public static function boot(){
    //   parent::boot();
    //
    //   static::created(function($project){
    //     \Mail::to($project->owner->email)->send(
    //       new ProjectCreated($project)
    //     );
    //   });
      //lifecycle-
      // retrieved,
      // creating
      // created
      // updating
      // updated
      // saving
      // saved
      // deleting
      // deleted
      // restoring
      // restored
    // }

    public function owner(){
      return $this->belongsTo(User::class);
    }

    public function task(){

      return $this->hasMany(Task::class);

    }

    public function addTask($task){

      $this->task()->create($task);

      // if $description comes as array-
      // $this->task()->create(compact('description'));

      // --------------------------------------------

      // return Task::create([
      //   'project_id' => $this->id,
      //   'description' => $description
      // ]);
    }
}

//The database is only queried when you access $this->tasks -- that is, without the parenthesis.
//If you call $this->tasks(), it returns a HasMany object with the details of the relationship, that you can then call methods from.
