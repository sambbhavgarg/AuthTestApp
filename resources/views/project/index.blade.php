<!--DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> TEST </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <body>
    <h1> TEST </h1>
    <div class="content">
      <h4><a href="/projects/create">Create</a></h4>
      <h4><a href="/home">Go to Portal</a></h4>
      <ul>
        <h3>List from DB</h3>
        @foreach ($projects as $project)
        <li style='margin-left: 2em'>
          <a href="/projects/{{ $project->id }}">
            {{ $project->title }}
            {{ $project->description }}
          </a>
        </li>
        @endforeach
      </ul>
    </div>
  </body>
</html>

-->

@extends('layouts.app')

@section('content')
  <div class="content">
    <h4><a href="/projects/create">Create</a></h4>
    <ul>
      <h3>Your Projects</h3>
      @foreach ($projects as $project)
      <li style='margin-left: 2em'>
        <a href="/projects/{{ $project->id }}">
          {{ $project->title }}
          {{ $project->description }}
        </a>
      </li>
      @endforeach
    </ul>
  </div>
@endsection
