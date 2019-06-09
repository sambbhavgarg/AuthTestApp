@if ($errors->any())
<div class="notification is-danger">
  <ul>
    @foreach($errors->all() as $err)
    <li>{{ $err }}</li>
    @endforeach
  </ul>
</div>
@endif
