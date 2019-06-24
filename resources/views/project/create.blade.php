<!-- DOCTYPE html>
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
            <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" placeholder="Enter Description">{{ old('description') }}</textarea>
          </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Give!</button>
        </div>
      </div>
      @include('errors')
    </form>

    @if(session('message'))
    <div class="notification is-success">
      <h1>{{ session('message') }}</h1>
    </div>
    @endif

    <h3><a href="/projects">Go Back</a></h3>
  </body>
</html>
-->

@extends('layouts.app')

@section('content')
  <body>
    <form action="/projects" method="POST" style="margin-bottom: 1em; padding-left: 2em; padding-right: 2em;">
      @csrf

      <div class="field" >
        <label class="label" for="title">Title</label>
          <div class="control">
            <input name="title" type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" placeholder="Enter Title" value="{{ old('title') }}">
          </div>
      </div>

      <div class="field">
        <label class="label" for="description">Description</label>
          <div class="control">
            <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" placeholder="Enter Description">{{ old('description') }}</textarea>
          </div>
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Give!</button>
        </div>
      </div>
      <h3><a href="/projects">Go Back</a></h3>

      @include('errors')
    </form>

    @if(session('message'))
    <div class="notification is-success">
      <h1>{{ session('message') }}</h1>
    </div>
    @endif

  </body>
@endsection
