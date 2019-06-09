<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
  </head>
  <body>
    <form action="/projects" method="POST" style="margin-bottom: 1em">
      @csrf

      <div class="field">
        <label class="label" for="title">Title</label>
          <div class="control">
            <input name="title" type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" placeholder="Enter Title" value="{{ old('title') }}">
          </div>
      </div>

      <div class="field">
        <label class="label" for="description">Description</label>
          <div class="control">
            <input name="description" type="textarea" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" placeholder="Enter Description" value="{{ old('description') }}">
          </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Give!</button>
        </div>
      </div>
      @include('errors')
    </form>

    <h3><a href="/projects">Go Back</a></h3>
  </body>
</html>
