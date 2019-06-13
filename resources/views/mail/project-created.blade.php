@component('mail::message')
# Hi, {{ auth()->user()->name }}
# New Project: {{ $project->title }}

{{ $project->description }}

@component('mail::button', ['url' => url('/projects/'.$project->id)])
View Creation
@endcomponent

Thanks,<br>
# Sambbhav
@endcomponent
