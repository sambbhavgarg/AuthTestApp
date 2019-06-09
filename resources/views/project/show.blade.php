<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Show page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
  </head>
  <body>
    <div class="content">
     <h1 class="title">{{ $project->title }}</h1>
     <h1 class="title">{{ $project->description }}</h1>
     <p>
       <a href="/projects/{{ $project->id }}/edit">
         Edit
       </a>
     </p>
   </div>
     @if($project->task->count())
       <div  class="box">
         @foreach($project->task as $task)
           <div>
             <label class="checkbox" for="completed">

             <form method="POST" action="/completed-tasks/{{ $task->id }}">
               @if($task->completed)
                  @method('DELETE')
               @endif
               @csrf

                 <div class="control">
                   <input id="completed" type="checkbox" name="completed"
                              onChange="this.form.submit()"
                              {{ $task->completed ? 'checked' : '' }}>
                      {{ $task->description }}
                </div>
           </form>
         </label>
         </div>
       @endforeach
      </div>
     @endif

    <form class="box" action="/projects/{{ $project->id }}/tasks" method="POST">
      @csrf

      <div class="field">
        <label class="label">New Task</label>

        <div class="control">
          <input class="input  {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" type="text" placeholder="New Task" required>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-link" type="submit">Add Task</button>
        </div>
      </div>
      @include('errors')
    </form>
    <h3><a href="/projects">Go Back</a></h3>

  </body>
</html>
