<form action='{{ url('/superhero/'.$superhero->id) }}' method='post' enctype='multipart/form-data'>
  @csrf
  {{ method_field('PATCH') }}
  @include('superhero.form',['mode'=>'Editar'])
</form>