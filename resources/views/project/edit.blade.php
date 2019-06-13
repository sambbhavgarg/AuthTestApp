<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
  </head>
  <body>
    <h1 class="title">Edit Input</h1>

    <form action="/projects/{{ $project->id }}" method="POST" style="margin-bottom: 1em">

      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" type="text" name="title"
                    placeholder="Title" value="{{ old('title') }}">
        </div>
      </div>

      <div class="field">
        <label class="label">Description</label>
        <div class="control">
          <input class="input" type="textarea" name="description"
                    placeholder="Description" value="{{ old('description') }}">
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-link" type="submit">Edit</button>
        </div>
      </div>
    </form>

    <form class="" action="/projects/{{ $project->id }}" method="POST">
      @method('DELETE')
      @csrf

      <div class="field">
        <div class="control">
          <button class="button is-link " type="submit">Delete</button>
        </div>
      </div>
      @include('errors')
  </form>
  </body>
</html>
